<?php
namespace Controllers;
use Vendor\Controller;
use Models\supply as supplyModel;


class supply extends Controller{
    private $em;
    public function __construct(){
        $this->em = new supplyModel();
    }
    public function getsupplys(){
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            return $this->em->getsupply($id);
        } else {
            return $this->em->getsupplys();
        }
    }
    public function newsupplys(){
        $name = $_POST['name'];
        $pn = $_POST['pn'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        return $this->em->newsupplys($name,$pn,$phone,$address);
    }
    public function removesupplys(){
        $id = $_POST['id'];
        return $this->em->removesupply($id);
    }
    public function updatesupplys(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $pn = $_POST['pn'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        return $this->em->updatesupplys($id,$name,$pn,$phone,$address);
    }
}
?>