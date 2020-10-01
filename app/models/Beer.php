<?php

namespace app\models;
use \PDO;

class Beer {
    protected $conn;

    public function __construct(\PDO $conn) {
        $this->conn = $conn;
    }

    public function Example(){



        return true;
    }




}
