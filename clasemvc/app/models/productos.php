class pruducts

	get
	return base de datos 

	<?php 
  // consultamos los productos de la base de datos
  $sql = "SELECT * FROM products ORDER BY Created_at DESC";
  $pdo = Db::getInstance();
  $products = $pdo->selectSQL($sql,[]);
  // print_array($products);
  // recorremos los resultados y generamos los items
  foreach ($products as $key => $product) 
  {
    ?>
    <div class="card product_item col-12 col-sm-6 col-md-3">
      <div class="product_item_image">
        <img src="<?= URL_SITE.'/assets/images/products/'.$product["IDProduct"].'/'.$product["Image"]?>" class="card-img-top" alt="...">
        <a href="#" class="btn_add_cart_item rounded-pill shadow-sm animate__animated animate__fadeIn">Add product</a>
      </div>
      <div class="card-body">
        <h5 class="card-title"><?= $product["Name"] ?></h5>
        <!-- <p class="card-text"><?= $product["Description"]?></p> -->
      </div>
    </div>
    <?php    
  }
?>
