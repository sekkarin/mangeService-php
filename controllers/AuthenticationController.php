<?php
class AuthController {
    private $userModel;
    public function __construct($userModel){
        $this->userModel = $userModel;
    }

    
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];

            // Validate user credentials
            $user = $this->userModel->getUserByEmail($email);
            // print_r ($user);
            if ($user && password_verify($password, $user['Password'])) {
                // Start the session and set user information
                session_start();
                $_SESSION['user_id'] = $user['UserID'];
                $_SESSION['role'] = $user['username'];

                // Redirect to a secure page or display a success message
                header("Location: ./index.php");
                exit;
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