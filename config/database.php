<?php
  class DatabaseConfig
  {
    public  $host;
    public  $username;
    public  $database;
    public  $password;

    
    // public host="";
    function __construct() {
      $this->host = "localhost";
      $this->username  = "root";
      $this->password = "";
      $this->database = "iot";
    }
  }
?>