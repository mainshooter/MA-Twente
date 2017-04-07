<?php

  class view {
    public function displayMessage($message) {
      echo $message;
    }


    public function displayTable($header, $res) {
      echo "<table>";
    foreach ($header as $row) {
      echo "<tr>";
      foreach ($row as $key =>$val)
    }
    }



  }

?>
