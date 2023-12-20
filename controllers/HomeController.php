<?php
class HomeController {
    private $serviceModel;
    public function __construct($serviceModel) {
        $this->serviceModel = $serviceModel;
    }
    public function index() {
        session_start();
        if(isset($_SESSION['user_id'])){
            // echo "login success";
            $services =  $this->serviceModel->getServiceAll();
            include_once('views/home.php');
            
        }else{
            // echo "not login";
            include_once('views/home.php');
        }
    }
}
?>