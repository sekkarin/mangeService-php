<?php
class ServiceController {
    private $serviceMode;
    // private $service;
    public function __construct($service){
        $this->serviceMode = $service;
    }

    public function regservice() {
      echo "Register";
      if (isset($_GET['serviceID'])) {
        $serviceID = $_GET['serviceID'];
        session_start();
        // Perform registration logic
        $service = $this->serviceMode->getServiceById($serviceID);
        if (isset($service["ServiceID"])) {
          $info = array();
          $info["ServiceID"]  = $service["ServiceID"];
          $info["UserID"]  = $_SESSION['user_id'];
          $this->serviceMode->registerService($info);
          echo "register successfully";
        }
        print_r($service);
        header("Location: ./index.php");
      } else {
          include_once('views/register.php');
      }
    }
}
?>  