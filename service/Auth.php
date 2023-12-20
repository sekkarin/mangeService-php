<?php

class Auth {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function registerUser($username, $password) {
        // You would typically hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $username, $hashedPassword);
        
        return $stmt->execute();
    }

    public function loginUser($username, $password) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Password is correct, set session or perform other login actions
                return true;
            }
        }

        return false;
    }

    public function isLoggedIn() {
        // Check if the user is logged in (you may use session, cookies, or other methods)
        // Return true if logged in, false otherwise
    }

    public function logout() {
        // Implement logout logic (destroy session, clear cookies, etc.)
    }
}

?>
