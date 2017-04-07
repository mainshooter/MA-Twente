<?php

require_once('databasehandler.class.php');
require_once('view.class.php');

if(ISSET($_REQUEST['submit'])) {
  $crud = new DbHandler('localhost' , 'ma-twente' ,'root' , 'Lente_2017');

  switch ($_REQUEST['submit']) {

    case 'read':
    $sql = "SELECT * FROM gebruiker";
    $header = $crud->ReadData($sql);
  }






















}





































 ?>
