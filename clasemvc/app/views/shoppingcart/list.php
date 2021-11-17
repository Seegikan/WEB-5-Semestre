<div class="container listshopping">

	<?php

		if (isset($cart["Items"])) {
			?>
			<div class="listItem headerItems">
				<div class="productinfo">Producto </div>
				<div class="productinfo">Precio </div>
				<div class="productinfo">Cantidad </div>
				<div class="productinfo">Subtotal </div>
			 </div>
			 <?php
			 foreach ($cart["Items"] as $key => $item) {
			 	$subtotal = number_format($item["Total"], 2);

			 	echo '<div class="listItem" id="cart_item_'.$key.'">';

			 	echo '<div class="productinfo" > 
						<div class="btn btn-danger delete_item" data-parentid="'.$key.'">
							<i class="bi bi-trash" > </i>
						</div>
						</div>';
			echo '<div class="productinfo">'.$item["Name"].'</div>';
			echo '<div class="productinfo">$'.number_format($item["Price"], 2).'</div>';
			echo '<div class="productinfo">
				<input type="number"
				class="product_quantity"
				data-parentid="'.$key.'"
				min="1"
				value="'.$item["Quantity"].'" >
				</div>';
			echo '<div class="productinfo sub_total" >'.$subtotal.'</div>';
			echo "</div>";

			 }

			?>
			<div class="listItem sub_total">
				<div class="totalContainer"> Total $<?=number_format($cart["Total"], 2)?></div>
			</div>
			<div class="buy_container">
				<div class="btn btn-success" id="btn-buy" > Comprar </div>
			</div>
			<?php
		}
		else
		{
			echo 'No se encontraton articulos en el carrito';
		}
		?>

</div>

<script>
	 var shoppingCartURl = '<?= URL.'/shoppingcart/' ?>'
</script>

