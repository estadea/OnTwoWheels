<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/onTheWheel/constant.php');
include_once(ROOTDIR . '/config/database.php');
class Product
{
    private $db;
    public function __construct(){
        $this->db = new DB();
    }

    public function getList(){
        $query = "SELECT * FROM Product";
        $stmt = $this->db->con->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function searchProduct($name){
        $query = "SELECT * from Product WHERE name LIKE :name";
        $stmt = $this->db->con->prepare($query);
        $stmt->execute(["name" =>"%".$name. "%"]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
