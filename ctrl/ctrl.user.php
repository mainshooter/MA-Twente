<?php

  if (ISSET($_REQUEST['user'])) {

    require_once $_SERVER['DOCUMENT_ROOT'] . '/leerjaar2/MA-Twente/classes/user.class.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/leerjaar2/MA-Twente/classes/view.class.php';

    $user = new user();
    $view = new view();

    switch ($_REQUEST['user']) {
      case 'login':
        $email = $_POST['email'];
        $password = $_POST['password'];

        $login = $user->login($email, $password);

        if ($login == true) {
          header('Location: dashboard.php');
        }
        else if ($login == false) {
          $view->displayMessage("Not correct");
        }

        break;

      default:
        # code...
        break;
    }
  }

?>
