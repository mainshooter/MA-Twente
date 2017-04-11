<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login MA-Twente</title>

    <link rel="stylesheet" href="style/grid.css" type="text/css">
    <link rel="stylesheet" href="style/style.css" type="text/css">


  </head>
  <body>
    <h1 class="col-12 center-text">Login system MA-Twente</h1>

    <div class="row">
      <div class="col-3"></div>
      <div class="col-6">
        <form method="post">
          <div>Email</div>
          <input type="email" name='email' />
          <div>Password</div>
          <input type="password" name='password' />
          <div></div>
          <input type="submit" name="user" value="login">
        </form>
        <a href="wachtwoordvergeten.php">
      </div>
      <div class="col-3"></div>
  </div>
  <?php
  session_start();
  if (ISSET($_POST['user'])) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/MA-Twente/classes/user.class.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/MA-Twente/classes/view.class.php';

    $user = new user();
    $view = new view();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = $user->login($email, $password);

    if ($login == true) {
      header('Location: dashboard.html');

    }
    else if ($login == false) {
      $view->displayMessage("Not correct");
    }
  }
  ?>

  </body>
</html>
