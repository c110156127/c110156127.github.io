<?php
namespace Models;
use Vendor\DB;

class role{
    public function getroles(){
        $sql = "SELECT  *  FROM  `role`";
        $arg = NULL;
        return DB::select($sql, $arg);
    }
    public function getrole($id){
        $sql = "SELECT  *  FROM  `role` WHERE `id`=?";
        $arg = array($id);
        return DB::select($sql, $arg);
    }
    public function newrole($name){
        $sql = "INSERT INTO `role` (`name`) VALUES (?)";
        return DB::insert($sql, array($name));
    }
    public function removerole($id){
        $sql = "DELETE FROM `role` WHERE id=?";
        return DB::delete($sql, array($id));
    }
    public function updaterole($id, $name){
        $sql = "UPDATE `role` SET `name`=? WHERE id=?";
        return DB::update($sql, array($name, $id));
    }
}
?>