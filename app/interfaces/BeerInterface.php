<?php
namespace app\interfaces;
use \PDO;

interface BeerInterface{
    public function __construct(\PDO $conn);
    public function insertBeer();
    public function deleteBeer($id);
    public function listBeer();
    public function updateBeer($id);
}
?>
