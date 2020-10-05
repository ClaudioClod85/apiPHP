<?php
require_once 'config/app.config.php';
require_once __DIR__.'/core/bootstrap.php';

$appDatabase = require 'config/app.database.php';
$appRoutes = require 'config/app.routes.php';


$Database = new db\Database($appDatabase);
$conn = $Database->getConn();
$router = new core\Router($conn);
$router->loadRoutes($appRoutes['routes']);
$controller = $router->dispatch();

//http_response_code(200);



?>
