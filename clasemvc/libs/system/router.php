<?php

  class System_router
  {
    private $controller;
    private $method = false;
    private $params = array();
      //esto es para que no cargue index directamente
    private $defaultController;
    private $dirbase;
    private $URI;

    public function __construct(string $default,string $dirbase)
    {
      // controllado inicial
      $this->defaultController = $default;
      // url a mapear
      $this->URI = $_SERVER["REQUEST_URI"];
      // directorio base a ignorar
      $this->dirbase = $dirbase;

      $this->mapRoute();
      // ->setRoute();
    }

    public function setRoute()
    {
      // colocar la ruta mapping en los atributos de la clase
    }

      //cargada de url
    public function mapRoute(string $route = "")
    {
      // metodo para mapear la ruta
      if($route){
        $this->URI = $route;
      }

      if($this->URI != ""){
        if(strpos($this->URI,'/'.$this->dirbase) == 0 and $this->dirbase != ""){
          $this->URI = str_replace("/".$this->dirbase,'',$this->URI);
        }
        if($this->URI == "/"){
          $this->URI = $this->defaultController;
        }
          $uriparts = explode("/",$this->URI);
          $controllerFound = false;
          $methodFound = false;
          $i = 0;
          // print_array($this->URI);
          // print_array($uriparts);
        foreach ($uriparts as $key => $segment) 
        {
          // var_dump($segment != "");
          if($segment == "")
          {
            continue;
          }
          if($i == 0 and $controllerFound == false and $segment != "")
          {
            // echo 'controller -- '.$segment;
            $controllerFound = true;
            $this->controller = $segment;
          }
          elseif($controllerFound == true and $methodFound == false and $i > 0)
          {
            $methodFound = true;
            $this->method = $segment;
          }
          elseif($segment != "")
          {
            $this->params[] = $segment;
          }
          if($segment != "")
            $i++;
        }
      }

      return $this;
    }

    public function getController()
    {
      return $this->controller;
    }

    public function getMethod()
    {
      return $this->method;
    }

    public function getParams()
    {
      return $this->params;
    }

    public function getURI()
    {
      return $this->URI;
    }
  }
  

?>