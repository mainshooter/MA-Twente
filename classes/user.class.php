<?php
  require_once 'databasehandler.class.php';
  require_once 'view.class.php';
  require_once 'security.class.php';

  class user {
    public $email = "";
    private $password = "";

    // require_once 'view.class.php';
    public function login($email, $password) {
      // Function that enable the login

      $security = new security();

      $this->email = $this->checkInput($email);
      $this->password = $this->checkInput($password);
      $login = $this->verifyLogin();
      if ($login) {
        // Everything is correct
        $_SESSION['email'] = $this->email;
        $_SESSION['loginToken'] = $security->getLoginToken();
        // Login token

        return(true);
      }
      else {
        // Something isn't correct
        return(false);
      }
    }
    public function createNewUser($email, $password) {
      $db = new DbHandler('localhost' , 'ma-twente' ,'root');

      $this->email = $this->checkInput($email);
      $this->password = $this->checkInput($password);

      $hashPassword = $this->createHashPassword();

      // $sql = "INSERT INTO gebruiker (mail, wachtwoord) VALUES (" . $this->email . ", " . $hashPassword . ")";
      $db->CreateData($sql);
    }
    private function createHashPassword() {
      // Hash a password
      $hash = password_hash($this->password, PASSWORD_DEFAULT);
      return($hash);
    }

    private function verifyLogin() {
      // Verify the login
      $db = new DbHandler('localhost' , 'ma-twente' ,'root');

      $sql = "SELECT wachtwoord FROM gebruiker WHERE mail='" . $this->email . "' LIMIT 1";
      $hashedPassword = $db->readData($sql);

      foreach ($hashedPassword as $row) {
        $passwordVerify = password_verify($this->password, $row['wachtwoord']);
      }

      if ($passwordVerify == true) {
        // Password is correct and the user exists!
        return(true);
      }
      else {
        // User doesn't exists or thw wrong password is used
        return(false);
      }
    }
    public function checkInput($data) {
      // Function to disable any harmfull inputs
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      $data = htmlentities($data);
      return ($data);
    }

  }

?>
