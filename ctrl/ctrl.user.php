<?php
  session_start();
  if (ISSET($_REQUEST['user'])) {

    require_once $_SERVER['DOCUMENT_ROOT'] . '/MA-Twente/classes/user.class.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/MA-Twente/classes/view.class.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/MA-Twente/classes/databasehandler.class.php';


    $user = new user();
    $view = new view();
    $db = new DbHandler();


    switch ($_REQUEST['user']) {
      case 'login':
        $email = $_POST['email'];
        $password = $_POST['password'];

        $login = $user->login($email, $password);

        if ($login == true) {
          header('Location: dashboard.html');
        }
        else if ($login == false) {
          $view->displayMessage("Not correct");
        }
        break;
        case 'forgot':

          $userExists = $user->checkEmailExists($_REQUEST['email']);

          if ($userExists == true) {
            $user->updatePassword($_REQUEST['email'], "1234");
            $view->displayMessage("Wachtwoord is aangepast");
          }
          else {
            $view->displayMessage("Something went wrong");
          }
          break;
        case 'addUser':
          # code...
          break;
        case 'readUser':
          $userID = $_REQUEST['userID'];

          $sql = "SELECT `mail`, `voorletter`, `achternaam`, `geslacht`, `telefoonnummer_idtelefoonnummer`, afdeling_idafdeling FROM gebruiker WHERE idgebruiker='" . $userID . "' LIMIT 1";
          $header = $db->ReadData($sql);

          $sql = "SELECT `mail`, `voorletter`, `achternaam`, `geslacht`, `telefoonnummer_idtelefoonnummer`, afdeling_idafdeling FROM gebruiker WHERE idgebruiker='" . $userID . "'";
          $result = $db->ReadData($sql);

          $view->updateFormulier($header, $result);
          break;
        case 'update':
          $mail = $_POST['mail'];
          $voorletter = $_POST['voorletter'];
          $achternaam = $_POST['achternaam'];
          $geslacht = $_POST['geslacht'];
          // $telefoonnummer_idtelefoonnummer = $_POST['telefoonnummer_idtelefoonnummer'];
          // $afdeling_idafdeling = $_POST['afdeling_idafdeling'];

          $sql = "UPDATE gebruiker set voorletter='" . $voorletter . "', achternaam='" . $achternaam . "', geslacht='" . $geslacht . "' WHERE mail='" . $mail . "'";

          echo $db->UpdateData($sql);

          echo "<button type='button' onclick=loadItem('ctrl/ctrl.gebruikers.php?gebruiker=read');>Ga terug</button>";
          break;
        case 'logout':
          $user->logout();
          header('Location: /MA-Twente/index.php');
          break;
    }
  }

?>
