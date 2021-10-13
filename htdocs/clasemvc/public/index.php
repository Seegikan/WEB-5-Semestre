
<?php
  include("../config/config.php");
  //echo(DOCUMENT_ROOT);

  include(DOCUMENT_ROOT."/config/autoload.php");

/*
  require_once '../config/config.php';
  require_once DOCUMENT_ROOT.'/config/autoload.php';
  require_once APPLICATION.'/utilities/utilities.php';
*/
  $URI = $_SERVER["REQUEST_URI"];

  $router = new System_router("index",SUBDIR);

  print_array($router);


?>

