<?php

require_once('classes/databasehandler.class.php');
require_once('classes/view.class.php');

if(ISSET($_REQUEST['submit'])) {
  $crud = new DbHandler('localhost' , 'ma-twente' ,'root' , 'Lente_2017');

  switch ($_REQUEST['submit']) {

    case 'read':
    $sql = "SELECT * FROM gebruiker";
    $header = $crud->ReadData($sql);
    $sql = "SELECT * FROM gebruiker";
    $res = $crud->ReadData($sql);
    $view = new view();
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
    $view = new view();
    $view->alertSucces($melding);
    break;

    case 'update':
    $idgebruiker = $_POST['id'];
    $voorletter = $_POST['voorletter'];
    $achternaam = $_POST['achternaam'];
    $geslacht = $_POST['geslacht'];
    $afdeling = $_POST['afdeling'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $sql = "UPDATE gebruiker SET voorletter = $voorletter, achternaam = $achternaam, geslacht = $geslacht, afdeling = $afdeling, telefoonnummer = $telefoonnummer WHERE id = $idgebruiker";
    $melding = $crud->UpdateData($sql);
    $view = new view();
    $view->updateAlert($melding);
    break;

    case 'delete':
    $idgebruiker = $_POST['id'];
    $sql = "DELETE FROM gebruiker WHERE id = $idgebruiker";
    $melding = $crud->DeleteData($sql);
    $view = new view();
    $view->deleteAlert($melding);
    break;

  }
}





































 ?>
