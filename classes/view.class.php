<?php

  class view {
    public function displayMessage($message) {
      echo $message;
    }
    public function displayTable($header, $res) {
      echo "<table>";
    foreach ($header as $row) {
      echo "<tr>";
      foreach ($row as $key =>$val) {
        echo "<th>" . $key . "</th>";
      }
    }
    foreach($res as $row) {
      echo '<input type="hidden" name="user_id" value="'.$row['user_id'].'">';
      echo '<tr><form method="POST" action="ctrl.database.php">';
      foreach ($row as $key => $val) {
      echo  "<td><input type= 'text' name=' $key' value=' " .$val ."'></input></td>";
      }
      echo '<td><button type="submit" value="update" name="submit">Update</button></td>';
      echo '<td><button type="submit" value="delete" name="submit">Delete</button></td>';
    }
    echo "</table>";
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




  }

?>
