<?php
namespace Models;
use Vendor\DB;

class supply{
    public function getsupplys(){
        $sql = "SELECT  *  FROM  `supply`";
        $arg = NULL;
        return DB::select($sql, $arg);
    }
    public function getsupply($id){
        $sql = "SELECT  *  FROM  `supply` WHERE `id`=?";
        $arg = array($id);
        return DB::select($sql, $arg);
    }
    public function newsupplys($name,$pn,$phone,$address){
        $sql = "INSERT INTO `supply` (`name`, `pn`, `phone`, `address`) VALUES (?, ?, ?, ?)";
        return DB::insert($sql, array($name,$pn,$phone,$address));
    }
    public function removesupply($id){
        $sql = "DELETE FROM `supply` WHERE id=?";
        return DB::delete($sql, array($id));
    }
    public function updatesupplys($id, $name, $pn, $phone, $address){
        $sql = "UPDATE `supply` SET `name`=?, `pn`=?, `phone`=?, `address`=? WHERE id=?";
        return DB::update($sql, array($name, $pn, $phone, $address, $id));
    }
}
?>