<?php
namespace Models;
use Vendor\DB;

class product{
    public function getproducts(){
        $sql = "SELECT  *  FROM  `product`";
        $arg = NULL;
        return DB::select($sql, $arg);
    }
    public function getproduct($id){
        $sql = "SELECT  *  FROM  `product` WHERE `id`=?";
        $arg = array($id);
        return DB::select($sql, $arg);
    }
    public function newproduct($id, $name, $cost, $price,$quantity){
        $sql = "INSERT INTO `product` (`id`, `name`, `cost`, `price`,`quantity`) VALUES (?, ?, ?, ?, ?)";
        return DB::insert($sql, array($id, $name, $cost, $price, $quantity));
    }
    public function removeproduct($id){
        $sql = "DELETE FROM `product` WHERE id=?";
        return DB::delete($sql, array($id));
    }
    public function updateproduct($id,$name,$cost,$price,$quantity){
        $sql = "UPDATE `product` SET `name`=?, `cost`=?, `price`=?, `quantity`=? WHERE id=?";
        return DB::update($sql, array($name, $cost, $price, $quantity, $id));
    }
}
?>