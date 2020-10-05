<?php

namespace db;

class DbPDO {
    protected $conn;
    protected static $instance;
    public static function getInstance($options)
    {
        if(!self::$instance){
            self::$instance = new static ($options);
        }
        return static::$instance;
    }

    protected function __construct($options) {
        try{
            $this->conn = new \PDO($options['dsn'], $options['user'], $options['password'],$options['options']);

        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
    }

    public function getConn(){
        return $this->conn;
    }

}

?>
