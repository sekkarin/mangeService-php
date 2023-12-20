<?php
require_once("./config/database.php");

class DatabaseConnection {
  private $conn;
  function __construct(){
    try {
      $config = new DatabaseConfig();
      $dsn = "mysql:host={$config->host};dbname={$config->database}";
      $options = array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false,
      );
    $this->conn = new PDO($dsn, $config->username, $config->password, $options);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
  }
  public function getConnection() {
    return $this->conn;
}


}
?>