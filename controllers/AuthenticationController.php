<?php

// require_once(__DIR__."/../service/Permission.php");

class AuthController {
    private $userModel;
    
    public function __construct($userModel){
        $this->userModel = $userModel;
    }

    
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
            $email = $_POST["email"];
            $password = $_POST["password"];
            if ($password == "admin" & $email == "admin@admin.com") {
                $_SESSION['user_id'] = "admin";
                $_SESSION['role'] = "admin";
                // header("Location: ./index.php");
                include(__DIR__."/../views/admin.php");
                return;
            }

            // Validate user credentials
            $user = $this->userModel->getUserByEmail($email);
            // print_r ($user);
            if ($user && password_verify($password, $user['Password'])) {
                $_SESSION['user_id'] = $user['UserID'];
                // $_SESSION['role'] = $permission->getUserRole($user['UserID']);
                // print_r( $permission->getUserRole($user['UserID']));
                // Redirect to a secure page or display a success message
                header("Location: ./index.php");
                // exit;
            } else {
                echo "Invalid username or password";
            }
        } else {
            include_once('views/login.php');
        }
    }

    public function register() {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $info = array();
        $info['FirstName'] = $_POST["FirstName"];
        $info['LastName'] = $_POST["LastName"];
        $info['Password'] = $_POST["Password"];
        $info['Email'] = $_POST["Email"];
        $info['PhoneNumber'] = $_POST["PhoneNumber"];

        // Perform registration logic
        $success = $this->userModel->registerUser($info);

        if ($success) {
            echo "Registration successful!";
            header('Location: ./index.php?page=home',0);
        } else {
            echo "Registration failed.";
        }
      } else {
          include_once('views/register.php');
      }
    }
    public function logout() {
        session_start();
         unset($_SESSION['user_id']);
         header('Location: ./index.php?page=home',0);
    }

    

}
?>  