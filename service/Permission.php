
<?php
require_once(__DIR__."/../database/database.php");
  class Permission{
    public function getUserRole($userId) {
      $databaseConnect = new DatabaseConnection();
      $database = $databaseConnect->getConnection();
      
      $query = "SELECT * FROM userpermissions WHERE UserID = ?";
      $stmt = $database->prepare($query);
      $stmt->bindParam(1, $userId, PDO::PARAM_INT);
      $stmt->execute();
  
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  } 
?>