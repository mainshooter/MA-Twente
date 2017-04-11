<?php

session_start();

// require_once('classes/databasehandler.class.php');
// require_once('classes/view.class.php');

require_once $_SERVER['DOCUMENT_ROOT'] . '/MA-Twente/classes/databasehandler.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MA-Twente/classes/view.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MA-Twente/classes/security.class.php';

$security = new security();
$security = $security->checkLoginToken();
$view = new view();

if ($security == true) {

if(ISSET($_REQUEST['gebruiker'])) {
  $crud = new DbHandler();


  switch ($_REQUEST['gebruiker']) {

    case 'read':
    $sql = "SELECT * FROM gebruiker";
    $header = $crud->ReadData($sql);
    $sql = "SELECT * FROM gebruiker";
    $res = $crud->ReadData($sql);
    $view->displayTable($header, $res);
    break;

    case 'create':
    $voorletter = $_POST['voorletter'];
    $achternaam = $_POST['achternaam'];
    $geslacht = $_POST['geslacht'];
    $afdeling = $_POST['afdeling'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $sql = "INSERT INTO gebruiker (voorletter, achternaam, geslacht, afdeling, telefoonnummer) VALUES ('$voorletter' , '$achternaam' , '$geslacht' , '$afdeling' , ' $telefoonnummer')";
    $melding = $crud->CreateData($sql);
    $view->alertSucces($melding);
    break;

    case 'update':
    $idgebruiker = $_POST['idgebruiker'];
    $voorletter = $_POST['voorletter'];
    $achternaam = $_POST['achternaam'];
    $geslacht = $_POST['geslacht'];
    $afdeling = $_POST['afdeling'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $sql = "UPDATE gebruiker SET voorletter = $voorletter, achternaam = $achternaam, geslacht = $geslacht, afdeling = $afdeling, telefoonnummer = $telefoonnummer WHERE idgebruiker = $idgebruiker";
    $melding = $crud->UpdateData($sql);
    $view->updateAlert($melding);
    break;

    case 'delete':
    $idgebruiker = $_POST['idgebruiker'];
    $sql = "DELETE FROM gebruiker WHERE id = $idgebruiker";
    $melding = $crud->DeleteData($sql);
    $view->deleteAlert($melding);
    break;

  }
 }
}
else if ($security == false) {
  $view->noLogin();
}

 ?>
