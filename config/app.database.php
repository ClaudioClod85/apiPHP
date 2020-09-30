<?php
return[
    'driver' => 'PDO',
    'host' => 'localhost',
    'user' =>  'root',
    'password' =>  'Centos7,29',
    'database' => '',
    'port' => '3306',
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
];
