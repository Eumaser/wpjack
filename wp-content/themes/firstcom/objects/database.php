<?php


class Database{

  private $servername = "localhost";
  private $dbname = "jackfocu_crm";
  private $username  = "root";
  private $password = "";
  public $conn;

  public function getConnection(){


    $this->conn= new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    //$conn->connect_error
  //  print_r($conn);die();
    if ($this->conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

  //  return $conn->connect_error;
    return $this->conn;

  }

}


 ?>
