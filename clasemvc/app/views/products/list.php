<div class="container">
	<div class="product_list" >
		
<?php
//para mejorarlo es la clase del 21 - 49min
	foreach ($products as $key => $product) {
    ?>
    <div class="card product_item col-12 col-sm-6 col-md-3">
      <div class="product_item_image">
        <img src="<?= URL.'/images/products/'.$product["IDProduct"].'/'.$product["Image"]?>" class="card-img-top" alt="...">
        <a href="#" data-target="<?= URL.'/shoppingcart/add'?>" data-product="<?= $product["IDProduct"]?>" class="btn_add_cart_item rounded-pill shadow-sm animate__animated animate__fadeIn">Add product</a>
      </div>
      <div class="card-body">
        <h5 class="card-title"><?= $product["Name"] ?></h5>
        <a href="<?= URL.'productos/detalle'?>" class="rounded-pill btn btn-info">Ver más</a>
        <!-- <p class="card-text"><?= $product["Description"]?></p> -->
      </div>
    </div>
    <?php    
  }
?>

	</div>
	

</div>