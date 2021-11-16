<?php 
class productos extends System_core
{
		//un controlador no puede
	public function __construct()
	{
		parent::__construct();
	}

	public function main()
	{
		$model = $this->load->model("products");
		$data = [];
		$data["products"] = $model->getList();
		$utilities = new Utilities_layout();
		$utilities->top();
			//print_array($data["products"]);
		$this->load->view("products/list", $data);
		$bottom = [
			"JSLibs" => [
				URL.'/js/shoppingcart/shoppingcart.js'
			]
		];
		$utilities->bottom($bottom);
	}

	public function detalle($ID)
	{
		$model = $this->load->model("products");
		$data = [];
		$data["products"] = $model->getProductByID($ID);
		$utilities = new Utilities_layout();
		$utilities->top();
					//print_array($data["products"]);
		$this->load->view("products/list", $data);
		$bottom = [
			"JSLibs" => [
				URL.'/js/shoppingcart/shoppingcart.js'
			]
		];
		print_array($data["product"]);
		$utilities->bottom($bottom);
	}
}
?>

