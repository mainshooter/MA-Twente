
<?php

  class view {
    public function displayMessage($message) {
      echo $message;
    }
    public function wachtwoordVergetenForm() {
      echo "
        <form>
          <div>Uw email</div>
          <input type='email' id='email'>
          <div></div>
          <br />
          <button type='button' onclick='passwordForgotRequest(email);'>Wachtwoord reset!</button>
        </form>
      ";
    }
    public function displayTable($header, $res) {

      echo "<table class='col-12'>";
    foreach ($header as $row) {
      echo "<tr>";
      foreach ($row as $key =>$val) {
        if ($key == 'idgebruiker') {

        }
        else {
          echo "<th>" . $key . "</th>";
        }
      }
    }
    foreach($res as $row) {
      echo '<input type="hidden" name="id" value="'.$row['idgebruiker'].'">';
      echo '<tr><form method="POST" action="ctrl.database.php">';
      foreach ($row as $key => $val) {
        if($key == "idgebruiker") {

        }
        else if ($key == 'wachtwoord') {

        }
        else {
            echo  "<td>" .$val ."</td>";
        }

      }
      echo '<td><button type="submit" value="update" name="gebruiker" onclick=loadItem("ctrl/ctrl.user.php?user=readUser&userID=' . $row['idgebruiker'] .'");>Update</button></td>';
      echo '<td><button type="submit" value="delete" name="gebruiker">Delete</button></td>';
    }
    echo "</table>";
    echo  "<button style='background-color:white;color:black;' class='col-1' type='button' onclick='ctrl/ctrl.user.php'>Gebruiker toevoegen</button><br><br><br><br>";
  }
  public function createUserForm() {
    echo "
      <form>
        <input type='text' id=''>
      </form>
    ";
  }

   public function alertSucces($melding) {
     echo "succes" . $melding;
   }

   public function deleteAlert($melding) {
     echo "succes" . $melding;
   }

   public function updateFormulier($header,$res) {
     echo "<table>";
     foreach ($header as $row) {
       echo "<tr>";
       foreach ($row as $key =>$val) {
         if ($key == 'idgebruiker') {

         }
         else {
           echo "<th>" . $key . "</th>";
         }
       }
     }
     echo "</tr>";
     foreach($res as $row) {
       echo "<tr>";
       foreach($row as $key => $val) {
         if ($key == 'mail') {
           echo '<td>' .$val .' </td>';
         }
         else {
           echo '<td><input id=' . $key . ' type="text" name="' .$key.'" value="' .$val.'"></td>';
         }
       }
       echo "</tr>";
     }
     echo "<div></div>";
     echo "<button type='button' onclick='updateUser(\"" . $row['mail'] . "\");'>Update!</button>";
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
