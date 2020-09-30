<?php

namespace db;

class Database{
    protected $conn;
    protected $options;

    public function __construct($options){
        $this->options = $options;
    }

    public function getConn(){
            $this->conn = null;

            try{

                $this->conn = new \PDO("mysql:host=" .$this->options['host'], $this->options['user'], $this->options['password'],$this->options['options']);

            }catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }

            return $this->conn;
        }

}
?>
