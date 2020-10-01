<?php

return [
  'routes' =>
    [
        'GET' => [
            __PATH_FOLDER__.'/main.php/list' => 'app\controllers\BeerController@listBeer',
        ],
        'POST' => [
            __PATH_FOLDER__.'/main.php/insert' => 'app\controllers\BeerController@insertBeer',
        ],
        'PUT' => [
            __PATH_FOLDER__.'/main.php/update/:id' => 'app\controllers\BeerController@updateBeer',
        ],
        'DELETE' => [
            __PATH_FOLDER__.'/main.php/delete/:id' => 'app\controllers\BeerController@deleteBeer',
        ]
    ]
];
