<?php 
	class Products
	{
		//un controlador no puede
		public function __construct()
		{
		}

		public function getList()
		{
			$pdo = Db_pdo::getInstance();
			$sql = "SELECT * FROM products";
			$products = $pdo->selectSQL($sql,[]);
			return $products;
		}
		 
		 public function getProductByID(int $ID, string $fields = "*")
		 {
		 	$pdo = Db_pdo::getInstance();
			$sql = "SELECT $fields FROM products where IDProduct = :ID";
			$parms = [":ID" => $ID];
			$product = $pdo->selectSQL($sql,$parms);
			if(!empty($product))
				$product = $product[0];
			return $product;
		 }
	}
?>

