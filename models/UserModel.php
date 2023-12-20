<?php

class UserModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getUserByUsername($username) {
        // Retrieve user information from the database based on the username
        // For simplicity, assume you have a 'users' table with columns 'username' and 'password'

        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        // $result = $stmt->get_result();

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
    public function getUserByEmail($email) {
        // Retrieve user information from the database based on the username
        // For simplicity, assume you have a 'users' table with columns 'username' and 'password'

        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $email);
        // $stmt->execute();
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function registerUser($info) {
        $FirstName = $info['FirstName'];
        $LastName = $info['LastName'];
        $Password = $info['Password'];
        $Email = $info['Email'];
        $PhoneNumber =$info['PhoneNumber'];
        $Role = "1";
        $AccountStatus = "true";
        
        
        // INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `Email`, `Password`, `PhoneNumber`, `Role`, `AccountStatus`) VALUES (NULL, 'test1', 'test1', 'qwe2@gad.com', '1234', '1231', '1', 'true');
        // For simplicity, this example assumes you have a database connection
        // and uses simple queries. In a real-world scenario, use prepared statements.

        // Hash the password before storing it in the database
        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

        // Assuming you have a 'users' table with 'username' and 'password' columns
        $query = "INSERT INTO users (FirstName, LastName,Email,Password,PhoneNumber,Role,AccountStatus) VALUES (?,?,?,?,?,?,?)";

        // Execute the query using your database connection
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $FirstName);
        $stmt->bindParam(2, $LastName);
        $stmt->bindParam(3,$Email);
        $stmt->bindParam(4,$hashedPassword);
        $stmt->bindParam(5,$PhoneNumber );
        $stmt->bindParam(6, $Role);
        $stmt->bindParam(7,  $AccountStatus);
        $success =  $stmt->execute();
        $stmt->closeCursor();

        // Return success or failure
        return $success;
    }
}

?>
