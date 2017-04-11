<script src="js/ajax.js"></script>

<?php
  require_once 'classes/view.class.php';
  $view = new view();
  if (ISSET($_REQUEST['forgetToken'])) {

  }
  else {
    $view->wachtwoordVergetenForm();
  }

?>
<div id="result"></div>
