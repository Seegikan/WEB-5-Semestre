<?php

	class Utilities_layout
	{
		private $core;	

		public function __construct()
		{
				//tenemos lo que ya tenemos en memoria, si existe, sino se crea una nueva
			$this->core = System_core::getInstance();
		}

		public function top()
		{
			// code...
			$this->core->load->view("general/top");
			$this->core->load->view("general/header");

		}
		public function bottom()
		{
			// code...
			$this->core->load->view("general/footer");
			$this->core->load->view("general/bottom");

		}
	}
?>