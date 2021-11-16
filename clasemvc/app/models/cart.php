<?php 
	class Cart
	{
		//un controlador no puede
		public function __construct()
		{
			if(!isset($_SESSION["Cart"])){
				$_SESSION["Cart"] = array();
				$_SESSION["Cart"]["Total"] = 0;
				$_SESSION["Cart"]["TotalItems"] = 0;
				$_SESSION["Cart"]["Items"] = [];
			}
		}

		public function add()
		{
			$load = System_core::getInstance();
			$response = [
				"status" => false,
				"massage" => "no se puedo cargar el producto",
			];

			$success = false;
			if(isset($_POST["product"]))
			{
				$IDProduct = $_POST["product"];
				if(!isset($_SESSION["Cart"]["Items"][$IDProduct]))
				{

					$productsModel = $load->load->model("Products");
					$product = $productsModel->getProductByID($IDProduct,"IDProduct,Name,Price,Code,Image");
					//aqui alam
					if(!empty($product))
					{
						$tmp = $product;
						$tmp["Quantity"] = 1;
						$tmp["Total"] = $product["Price"];

						$_SESSION["Cart"]["Total"] += $product["Price"];
						$_SESSION["Cart"]["TotalItems"]++; 
						$_SESSION["Cart"]["Items"][$IDProduct] = $tmp;
					}
				}
				else
				{
					$_SESSION["Cart"]["Items"][$IDProduct]["Quantity"]++;
					$_SESSION["Cart"]["Items"][$IDProduct]["Total"] += $_SESSION["Cart"]["Items"][$IDProduct]["Price"];

					$_SESSION["Cart"]["Total"] += $_SESSION["Cart"]["Items"][$IDProduct]["Price"];
					$_SESSION["Cart"]["TotalItems"]++; 
					$success = true;
				} 
			}

			if($success === true)
			{
				$response["status"] = true;
				$response["massage"] = "Agregado correctamente";
				$response["Items"] = $_SESSION["Cart"]["TotalItems"];
			}
			return $response;
		}
	}
?>