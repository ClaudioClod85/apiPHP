<?php

ini_set("display_errors","1");
date_default_timezone_set("Europe/Rome");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once __DIR__.'/core/bootstrap.php';

$appDatabase = require 'config/app.database.php';

$Database = new db\Database($appDatabase);
$conn = $Database->getConn();


?>
