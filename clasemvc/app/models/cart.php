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
        public function delete()
		{
			$response = ["status" => false];
			if(isset($_POST["product"]))
			{
				$id = $_POST["product"];
				if(isset($_SESSION["Cart"]["Items"][$id]))
				{
					$toDelete = $_SESSION["Cart"]	["Items"][$id];
					$_SESSION["Cart"]["Total"] -= $toDelete["Total"];
					$_SESSION["Cart"]["TotalItems"] -= $toDelete["Quantity"];
				}
			}
			return

		}

		public function update()
		{
			$response = ["status" => false];
			if(isset($_POST["product"]) and isset($_POST["quantity"]))
			{
				$IDProduct = $_POST["product"];
				$IDProduct = $_POST["Quantity"];
				if(isset($_SESSION["Cart"]["Items"][$id]))
				{
					$tmp = $_SESSION["Cart"]["Items"][$id];
					if($Quantity == 0)
					{
						$response = $this->delete();
					}
					else
					{
						$_SESSION["Cart"]["Items"][$id]["Quantity"] = Quantity;
						$newTotal = $Quantity*$_SESSION["Cart"]["Items"][$id]["Price"];
						$_SESSION["Cart"]["Items"][$id]["Total"] = $newTotal;

						$_SESSION["Cart"]["Total"] -= $tmp["Total"];
						$_SESSION["Cart"]["Total"] += $Quantity;
						$response["status"] = true;
						$response["ProducsTotal"] = '$' .number_format($newTotal, 2 );
						$response["Total"] = '$' .number_format($_SESSION["Cart"]["Total"],2);
						$response["TotalItems"] = $_SESSION["Cart"]["TotalItems"];
					}

				}
				else
				{
					$response["massage"] = "no se encontro el producto";
				}
			}
			else
			{
					$response["massage"] = "Request invalido";
			}
				return $response;
		}//update



	}
?>