<?php

  class user {
    public var $email;
    private var $password;

    require_once 'view.class.php';
    require_once 'databasehandler.class.php';

    $db = new DbHandler();
    $view = new view();

    public function login($email, $password) {
      // Function that enable the login
      $this->email = $this->checkInput($input);
      $this->password = $this->$password;
      $login = $this->verifyLogin();
      if ($login) {
        // Everything is correct
        $_SESSION['email'] = $this->email;
        $_SESSION['loginToken'] = "g159hun3ifHTW$#2424rfhsd";
        // Login token
      }
      else {
        // Something isn't correct
        $view->displayMessage("Not correct");
      }
    }
    private function verifyLogin() {
      // Verify the login
      $sql = "SELECT wachtwoord FROM gebruiker WHERE email=" . $this->password . ""
      $hashedPassword = $db->readData($sql);

      $passwordVerify = password_verify($password, $hashedPassword);

      if ($passwordVerify) {
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
