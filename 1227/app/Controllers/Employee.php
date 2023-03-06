<?php
namespace Controllers;
use Vendor\Controller;
use Models\Employee as EmployeeModel;


class Employee extends Controller{
    private $em;
    public function __construct(){
        $this->em = new EmployeeModel();
    }
    public function getUsers(){
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            return $this->em->getUser($id);
        } else {
            return $this->em->getUsers();
        }
    }
    public function newUsers(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $home = $_POST['home'];
        return $this->em->newUser($id,$name,$phone,$home);
    }
    public function removeUsers(){
        $id = $_POST['id'];
        return $this->em->removeUser($id);
    }
    public function updateUsers(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $home = $_POST['home'];
        return $this->em->updateUser($id,$name,$phone,$home);
    }
}
?>