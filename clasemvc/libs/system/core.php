<?php

	class System_core
	{
		public $load;
		private static $instance;

		public function __construct()
		{
			$this->load = System_load::getInstance();
		}

		public static function getInstance(){
		try {
			if (!isset(self::$instance)) {
				$miclase = __CLASS__;
				self::$instance = new $miclase();
			}
			return self::$instance;
			
		} catch (Exception $ex) {
			//crearLog($ex,ERROR_NO,DEV_ENV);
		}
	}

	}
?>