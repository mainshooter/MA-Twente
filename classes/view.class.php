
<?php

  class view {
    public function displayMessage($message) {
      echo $message;
    }
    public function displayTable($header, $res) {

      echo "<table class='col-12'>";
    foreach ($header as $row) {
      echo "<tr>";
      foreach ($row as $key =>$val) {
        if($key == "idgebruiker") {

        } else {
        echo "<th>" . $key . "</th>";
      }
      }
    }
    foreach($res as $row) {
      echo '<input type="hidden" name="id" value="'.$row['idgebruiker'].'">';
      echo '<tr><form method="POST" action="ctrl.database.php">';
      foreach ($row as $key => $val) {
        if($key == "idgebruiker") {

        } else {
            echo  "<td>" .$val ."</td>";
        }

      }
      echo '<td><button type="submit" value="update" name="gebruiker">Update</button></td>';
      echo '<td><button type="submit" value="delete" name="gebruiker">Delete</button></td>';
    }
    echo "</table>";
    echo  "<button style='background-color:white;color:black;' class='col-1' type='submit' value='send' name='send'><a href='dashboard.html'>Gebruiker toevoegen</a></button><br><br><br><br>";
  }

   public function alertSucces($melding) {
     echo "succes" . $melding;
   }

   public function deleteAlert($melding) {
     echo "succes" . $melding;
   }

   public function updateFormulier($row) {
     echo '<table>';
     foreach($res as $row) {
       foreach($row as $key => $val) {
         echo '<tr><td><input type="text" name="' .$key.'" value="' .$val.'"<br></td></tr>';
       }
     }
     echo '</table>';
   }

   public function updateAlert($melding) {
     echo "succes" . $melding;
   }
   public function noLogin() {
     echo "
      <h2>U bent niet ingelogd klik <a href='index.php'>hier</a> om in te loggen</h2>
     ";
   }




  }

?>
