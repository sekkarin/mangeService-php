<?php
  require_once("./database/database.php");

  // controller
  require_once("./controllers/AuthenticationController.php");
  require_once("./controllers/HomeController.php");
  require_once("./controllers/ServiceController.php");

  // models
  require_once("./models/UserModel.php");
  require_once("./models/ServiceModel.php");

  $page = isset($_GET['page']) ? $_GET['page'] : 'home';

  $databaseConnect = new DatabaseConnection();
  $database = $databaseConnect->getConnection();
  // create instance 
  $userModel = new UserModel($database);
  $serviceModel = new ServiceModel($database);
  
  // Routing logic
  switch ($page) {
    case 'login':
    case 'register':
        $authController = new AuthController($userModel);
        $authController->{$page}();
        break;
    case 'logout':
        $authController = new AuthController($userModel);
        $authController->{$page}();
        break;
    case 'regservice':
        $serviceController = new ServiceController($serviceModel);
        $serviceController->{$page}();
        break;

    default:
        $homeController = new HomeController($serviceModel);
        $homeController->index();
}


?>