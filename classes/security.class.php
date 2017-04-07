<?php

  class security {

    private $loginToken = "g159hun3ifHTW$#2424rfhsd";

    public function getLoginToken() {
      return($this->loginToken);
    }
    public function checkLoginToken() {
      // This function is used to check if the token exists
      $currentUserToken = $_SESSION['loginToken'];
      if (ISSET($currentUserToken)) {
        $validateToken = $this->validateLoginToken($currentUserToken);
        // Check if the usertoken is equal to the loginToken
        if ($validateToken == true) {
          return(true);
        }
      }
    }

    private function validateLoginToken($currentUserToken) {
      // Check if the token is correct
      $loginToken = $this->getLoginToken();
      if ($currentUserToken == $loginToken) {
        return(true);
      }
      else {
        return(false);
      }
    }
    // Using the token validation to check if someone is logged in
    // $security = new security();
    // $security = $security->checkLoginToken();
    //
    // if ($security == true) {
    //   // Other code
    // }

  }



?>
