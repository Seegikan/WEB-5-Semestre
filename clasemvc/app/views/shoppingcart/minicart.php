<?php


	if(isset($_SESSION["Cart"]["Items"]) and count($_SESSION["Cart"]["Items"]) > 0)
	{
		$items = $_SESSION["Cart"]["Items"];
		foreach ($items as $key => $item)
		{
			//echo "cada item";
			$total =  number_format($item["Total"], 2);
			echo "<li>{$item["Quantity"]} x {$item["Name"]} <span> \$$total  </span> <li>";
		}
		
		echo '<li>Total: $' .number_format($_SESSION["Cart"]["Total"], 2). '</li>';
	}
	else
	{
		echo '<li> No haz guardado nada</li>';
	}
?>




<a href="#" class="rounded-pill btn btn-info">Carrito</a>