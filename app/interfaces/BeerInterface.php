<?php
namespace app\interfaces;
use \PDO;

interface BeerInterface{
    public function __construct(PDO $conn);
    public function showLogin();

}
?>
