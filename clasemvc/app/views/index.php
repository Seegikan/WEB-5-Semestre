<div class="container">
  <!-- start slider -->
  <?php
    //posible cambio de nombre
    $pdo = Db_pdo::getInstance();

    $sql = "SELECT * FROM banners where Active = 1 order by OrderImage desc";
    $images = $pdo->selectSQL($sql,[]);
  ?>

  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php
        $i = 0;
        foreach ($images as $key => $image) {
          $active = ($i == 0) ? "active" : '';
            
          echo '<div class="carousel-item '.$active.'">
          <img src="'.URL.'/'.$image["Image"].'" class="d-block w-100" alt="'.$image["Name"].'">
        </div>'; 
          $i++;
        }
      ?>
      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>