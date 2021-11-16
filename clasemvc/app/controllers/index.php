<?php 
	class Index extends System_core
	{
		//un controlador no puede
		public function __construct()
		{
			parent::__construct();
		}


		public function main()
		{

				//Limpia toda la sesion
			//session_destroy();
			//session_start();

			//echo 'hola quesos o quesadillas';
			$model = $this->load->model("home");
			$data = [];
			$data["gallery"] = $model->getGallery();
			//data 
			$utilities = new Utilities_layout();
			$utilities->top();
			$this->load->view("index",$data);
			$utilities->bottom();
    		$pdo = Db_pdo::getInstance();
    		print_array($_SESSION);

		}

		public function test($a = 0,$b = 0)
		{
			$data = [
				"products" => "nuevos",
				"items" => [
					0,1,2,3
				]
			];
			echo ' Hola desde Index de controladores';

			$this->load->view("test", $data);
			$model = $this->load->model("suma");
			echo $model->Sumar($a,$b);
		}
	}
?>

