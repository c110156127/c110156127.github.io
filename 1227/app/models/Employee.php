<?php
namespace Models;
use Vendor\DB;

class Employee{
    public function getUsers(){
        $sql = "SELECT  *  FROM  `employee`";
        $arg = NULL;
        return DB::select($sql, $arg);
    }
    public function getUser($id){
        $sql = "SELECT  *  FROM  `employee` WHERE `id`=?";
        $arg = array($id);
        return DB::select($sql, $arg);
    }
    public function getRoles($id){
        $sql ="SELECT role_id FROM `user_role` WHERE `user_id`=?";
        $arg = array($id);
        $response = DB::select($sql,$arg);
        $result = $response['result'];
        for($i=0;$i < count($result);$i++){
            $result[$i] = $result[$i]['role_id'];
        }
        $response['result'] = $result;
        return $response;
    }
    public function checkIdPw($id,$pw){
        $sql = "SELECT * FROM `user` WHERE `id`=? and `password`=?";
        $arg = array($id,$pw);
        $response = DB::select($sql,$arg);
        $rows = $response['result'];
        if(count($rows)==0){
            $response['status']=404;
            $response['message']= 'Not found';
        }
        return $response;
    }
    public function newUser($id, $name, $phone, $home){
        $sql = "INSERT INTO `employee` (`id`, `name`, `phone`, `home`) VALUES (?, ?, ?, ?)";
        return DB::insert($sql, array($id, $name, $phone, $home));
    }
    public function removeUser($id){
        $sql = "DELETE FROM `employee` WHERE id=?";
        return DB::delete($sql, array($id));
    }
    public function updateUser($id, $name, $phone, $home){
        $sql = "UPDATE `employee` SET `name`=?, `phone`=?, `home`=? WHERE id=?";
        return DB::update($sql, array($name, $phone, $home, $id));
    }
}
?>