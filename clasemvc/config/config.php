<?php

 define("DEV_ENV",true);

  define('SUBDIR','clasemvc');
  define('URL', 'http://'.$_SERVER["SERVER_NAME"]."/".SUBDIR);
  /* Configuración de la Base de Datos
  */
  $dbconfig = array();
  //defoult es el [objeto] y [propiedades]
  $dbconfig["default"]['DB_TYPE'] = "mysql";
  $dbconfig["default"]['DB_HOST'] = "localhost";
  //base de datos 
  $dbconfig["default"]['DB_NAME'] = "clase";
  $dbconfig["default"]['DB_USER'] = "root";
  $dbconfig["default"]['DB_PASS'] = "";

  define("DB_CONFIG", $dbconfig);
  define('CHARSET','utf8');

  /*
    * configuraciones generales
  */
  define("DOCUMENT_ROOT",$_SERVER["DOCUMENT_ROOT"].'/'.SUBDIR);
  define('APPLICATION', DOCUMENT_ROOT.'/app');
  define('SOURCE', APPLICATION);
  define("ERROR_NO", serialize (array (2002,1045,42000))); // Errores por 
  define("TIME_ZONE",'America/Mexico_City');

?>