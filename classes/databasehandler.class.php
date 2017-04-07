<?php

class DbHandler {

  private $host;
  private $username;
  private $password;
  private $database;

  var $conn;


  public function ___construct($host, $database, $username, $password) {
    $this->host = $host;
    $this->username = $username;
    $this->passworde = $password;
    $this->database = $database;

    try {
      $this->conn = new PDO("mysql:host=$this->host; dbname=$this->database", $this->username, $this->password);

      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return true;
    }
    catch(PDOException $e) {
      echo "Connection failed:". $e->getMessage();
    }
  }

  function CreateData($sql) {
    try {
      $this->conn->exec($sql);
      return $this->conn->lastInsertId();
    }
    catch(PDOException $e) {
      return "Error: " . $sql . "<br>" . $e->getMessage();
    }

  }

  function ReadData($sql) {
  try {
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //return result array
    return $result;
  }
    catch(PDOException $e) {
    return "Error: " . $sql . "<br>" . $e->getMessage();
  }
}

  function UpdateData($sql) {
    try {
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->rowCount() . " Records Updated succesfully";
    }
    catch(PDOException $e) {
      return "Error: " . $sql . "<br>" . $e->getMessage();
    }
  }

  function DeleteData($sql) {
    try {
      $this->conn->exec($sql);
      echo "Record deleted succesfully";
    }
    catch(PDOException $e) {
      return "Error: " . $sql . "<br>" . $e->getMessage();
    }
  }

}






 ?>
