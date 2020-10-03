<?php

namespace app\models;
use \PDO;

class Beer {
    protected $conn;

    public function __construct(\PDO $conn) {
        $this->conn = $conn;
    }

    public function beerInsert($data){
        $input = json_decode($data,true);

        $sql = "INSERT INTO beer
                (beer_name, beer_description, beer_style)
            VALUES
                (:beerName, :beerDescription, :beerStyle);
        ";

        try {
            $statement = $this->conn->prepare($sql);
            $statement->execute(array(
                'beerName' => $input['beerName'],
                'beerDescription'  => $input['beerDescription'],
                'beerStyle' => $input['beerStyle'],
            ));
            return $this->conn->lastInsertId();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function beerList(){
        $sql = "SELECT beer_id,beer_name, beer_description, beer_style FROM beer ORDER BY beer_name ASC";

        try {
            $statement = $this->conn->query($sql);
            $result = $statement->fetchAll();
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function beerDelete($id){
        $sql = "DELETE FROM beer
                WHERE beer_id = :beerId;
            ";

        try {
            $statement = $this->conn->prepare($sql);
            $statement->execute(array('beerId' => $id));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function beerUpdate($id,$data){
        $input = json_decode($data,true);
        $sql = "UPDATE beer
                SET
                    beer_name = :beerName,
                    beer_style  = :beerStyle,
                    beer_description = :beerDescription
                WHERE beer_id = :beerId;
            ";

        try {
            $statement = $this->conn->prepare($sql);
            $statement->execute(array(
                'beerId' => $id,
                'beerName' => $input['beerName'],
                'beerStyle'  => $input['beerStyle'],
                'beerDescription' => $input['beerDescription']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }

    }


}
