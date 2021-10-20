<?php 

  // funcion que busca un archivo en la carpeta libs

  function autoLoadClase($className)
  {
    // tranformar $className a archivos
      ///lo que busca, por lo que cambia y donde lo busca
    $data = str_replace("_", "/", strtolower($className));
    $file = DOCUMENT_ROOT.'/libs/'.$data.'.php';
    // echo $file;
    // si el archivo existe lo cargamos
    if(is_file($file) and file_exists($file)){
      require_once($file);
    }
    else{
          $file = APPLICATION."/".$data.".php";
          //var_dump(file_exists($file));
          if(is_file($file) && file_exists($file)){
          require_once($file);
          }
      }
  }

  if(version_compare(PHP_VERSION,'5.1.2','>=')){
    if(version_compare(PHP_VERSION, '5.3.0', '>=' )){
      // registramos la función autoloadClase al autoload de php
      spl_autoload_register('autoLoadClase',true,false);
    }else{
      spl_autoload_register('autoLoadClase');
    }
  }

  function print_array($data,$die = false)
  {
      echo '<pre>'.print_r($data,true).'</pre>';
      if($die){
          die();
      }
  }

  function varDump($data,$die = false)
  {
      echo '<pre>';
          var_dump($data);
      echo '</pre>';
      if($die){
          die();
      }
  }
?>