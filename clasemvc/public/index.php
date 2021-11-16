
<?php
  include("../config/config.php");
  //echo(DOCUMENT_ROOT);

  include(DOCUMENT_ROOT."/config/autoload.php");
  //iniciar una sesion
  session_start();

/*
  require_once '../config/config.php';
  require_once DOCUMENT_ROOT.'/config/autoload.php';
  require_once APPLICATION.'/utilities/utilities.php';
*/
  //$URI = $_SERVER["REQUEST_URI"];

  $router = new System_router("index",SUBDIR);

  //print_array($router);

  $core = System_core::getInstance();
  //$core-> load-> view('test/testnew');
  $controllerClass = $core->load->controller($router->getController());
 

  if(is_object($controllerClass))
  {
    $method = "main";
    if($router->getMethod() != "")
    {
      $method = $router->getMethod();
    }
    if(method_exists($controllerClass, $method))
    {
      call_user_func_array(array($controllerClass, $method), $router->getParams());
    }
  }

?>

