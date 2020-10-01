<?php
namespace app\controllers;
use \PDO;
use app\models\Beer;

class BeerController {
    protected $conn;
    protected $Beer;

    public function __construct(PDO $conn){
        $this->conn = $conn;
        $this->Beer = new Beer($conn);

    }

    public function insertBeer(){
        $id = 1;
        echo(json_encode($id));
    }

    public function deleteBeer(){

    }

    public function listBeer(){
        $id=['1','2','3'];
        echo(json_encode($id));
    }

    public function updateBeer(){


    }


}
