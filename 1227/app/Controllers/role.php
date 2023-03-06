<?php
namespace Controllers;
use Vendor\Controller;
use Models\role as roleModel;


class role extends Controller{
    private $em;
    public function __construct(){
        $this->em = new roleModel();
    }
    public function getroles(){
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            return $this->em->getrole($id);
        } else {
            return $this->em->getroles();
        }
    }
    public function newroles(){
        $name = $_POST['name'];
        $sql = "INSERT INTO `role` (`name`) VALUES (?)";
        return $this->em->newrole($name);

    }
    public function removeroles(){
        $id = $_POST['id'];
        return $this->em->removerole($id);
        

    }
    public function updateroles(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        return $this->em->updaterole($id,$name);
    }
}
?>