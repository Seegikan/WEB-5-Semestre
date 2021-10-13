<?php

	class System_router
	{
		private $controller;
		private $method = false;
		private $params = array();
		private $defaultController;
		private $URI;
		private $dirBase;
	

		public function __construct(string $default, string $dirBase)
		{

			//controlador inicial
			$this->defaultController = $default;
			//uri a mapear
			$this->URI =$_SERVER['REQUEST_URI'];
			//directorio base a ignorar
			$this->dirBase =  $dirBase;

			$this->mapRoute(); //->setRoute();

		}

		 public function mapRoute(string $route = '')
		{
			// metodo para mapear la ruta
			if($route)
			{
				$this->URI = $route;
			}

			if($this->URI != "")
			{
				if(strpos($this->URI, '/'.$this->dirBase) == 0 and $this->dirBase != "")
				{
					$this->URI = str_replace("/".$this->dirBase, '',$this->URI);

				}
				echo $this->URI;
			}
		}

		public function setRoute()
		{
			// colocar la ruta mapeada en los atributos de la clase
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