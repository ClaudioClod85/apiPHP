<?php

return [
  'routes' =>
    [
        'GET' => [

        ],
        'POST' => [
            __DIR__.'/main.php/test' => 'app\controllers\TestController@start',
            ]
    ]
];
