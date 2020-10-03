<?php
namespace core;
use controllers;

class Router {

    protected $conn;
    protected $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'DELETE' => []
    ];
    public $route;

    public function __construct(\PDO $conn) {
        $this->conn = $conn;
    }
    public function loadRoutes($routes){
        $this->routes = $routes;
    }

    public function getRoutes(){
        return $this->routes;
    }

    public function getRoute(){
        return $this->route;
    }

    public function dispatch() {

        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = trim($url, '/');
        $method = $_SERVER['REQUEST_METHOD'];

        if(array_key_exists($method, $this->routes) && array_key_exists($url, $this->routes[$method])){
            return $this->route($this->routes[$method][$url]);
        } else {
            return $this->processQueue($url, $method);
        }
    }

    protected function processQueue($uri, $method = 'GET'){

        $routes = $this->routes[$method];

        try{
            foreach($routes as $route => $callback){
                // converte url '/post/:id' in regular expression
                $regMatch = preg_quote($route);

                $subPattern = preg_replace('/\\\:[a-zA-Z0-9\_\-\,]+/','([a-zA-Z0-9\-\_\,]+)', $regMatch);
                $pattern = "@^" .$subPattern. "$@D";

                $matches = Array();

                // check if the current request matches the expression
                //echo "$pattern||$uri|||$matches|||";
                if(preg_match($pattern, $uri, $matches)){
                    // remove the first match
                    array_shift($matches);
                    return $this->route($callback, $matches);
                }
            }
            http_response_code(404);
            echo "rotta non trovata";

        }catch(Exception $e) {
            echo "The exception code is: " . $e->getCode();
        }


    }

    protected function route($callback, array $matches=[]){

        try{
            if(is_callable($callback)){
               return call_user_func_array($callback, $matches);
            }
            $tokens = explode('@', $callback);
            $controller = $tokens[0];
            $method = $tokens[1];
            $this->route = str_replace('app\controllers\\','',$controller);

            $class = new $controller($this->conn);

            if(method_exists($class, $method)){
                call_user_func_array([$class, $method], $matches);
                return $class;
            }else{
                http_response_code(404);
                throw new Exception('Metodo '.$method.' non trovato nella class '.$controller);
            }

        } catch(Exception $e){
            die($e->getMessage());
        }
    }
}
