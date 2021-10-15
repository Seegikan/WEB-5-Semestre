<?php 
	class Index extends System_core
	{
		public function __construct()
		{
			parent::__construct();
		}


		public function main()
		{
			echo 'hola quesos o quesadillas';
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

