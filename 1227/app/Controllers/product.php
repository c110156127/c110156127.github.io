<?php
namespace Controllers;
use Vendor\Controller;
use Models\product as productModel;


class product extends Controller{
    private $em;
    public function __construct(){
        $this->em = new productModel();
    }
    public function getproducts(){
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            return $this->em->getproduct($id);
        } else {
            return $this->em->getproducts();
        }
    }
    public function newproducts(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $res=$this->em->getproduct($id);
        if($res['result']==NULL){
            return $this->em->newproduct($id,$name,$cost,$price,$quantity);    
        }
        else{
            
            return $this->response(409,'已存在');
        }
    }
    public function removeproducts(){
        $id = $_POST['id'];
        return $this->em->removeproduct($id);
    }
    public function updateproducts(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        return $this->em->updateproduct($id,$name,$cost,$price,$quantity);

    }
}
?>