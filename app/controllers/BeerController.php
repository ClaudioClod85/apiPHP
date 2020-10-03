<?php
namespace app\controllers;
use \PDO;
use app\models\Beer;

class BeerController {
    protected $conn;
    protected $Beer;
    private $data;

    public function __construct(PDO $conn){
        $this->conn = $conn;
        $this->Beer = new Beer($conn);
    }

    public function insertBeer(){
        $this->data = file_get_contents('php://input');
        $beerId = ["beerId" =>  $this->Beer->beerInsert($this->data)];
        echo json_encode($beerId);
    }

    public function deleteBeer($id){
        $countBeer = ["countBeer" => $this->Beer->beerDelete($id)];
        echo json_encode($countBeer);
    }

    public function listBeer(){
        $beer = ["beer" => $this->Beer->beerList()];
        echo json_encode($beer);
    }

    public function updateBeer($id){
        $this->data = file_get_contents('php://input');
        $countBeer = ["countBeer" =>  $this->Beer->beerUpdate($id,$this->data)];
        echo json_encode($countBeer);

    }


}
