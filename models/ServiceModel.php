<?php

class ServiceModel{
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    
    public function getServiceAll() {
        // Retrieve user information from the database based on the username
        // For simplicity, assume you have a 'users' table with columns 'username' and 'password'

        $query = "SELECT * FROM `services`";
        $stmt = $this->db->prepare($query);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function registerService($info) {
        $date = date("Y/m/d");
        
        // INSERT INTO `registrations` (`RegistrationID`, `UserID`, `ServiceID`, `RegistrationDate`) VALUES (NULL, '9', '1', '2023-12-21 13:12:41');
      
        // Assuming you have a 'users' table with 'username' and 'password' columns
        $query = "INSERT INTO registrations (UserID,ServiceID,RegistrationDate) VALUES (?,?,?)";

        // Execute the query using your database connection
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $info["UserID"]);
        $stmt->bindParam(2, $info["ServiceID"]);
        $stmt->bindParam(3, $date);
        $success =  $stmt->execute();
        $stmt->closeCursor();

        // Return success or failure
        return $success;
    }
    public function getServiceById($id) {
        $query = "SELECT * FROM `services` WHERE ServiceID = ?";

        // Execute the query using your database connection
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
          return $stmt->fetch(PDO::FETCH_ASSOC);
      } else {
          return null;
      }
    }
}

?>
