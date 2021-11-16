
<!-- header -->
<header>
  <div class="container header-container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= URL?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URL?>/contact">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URL?>/ajax">AJAX</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URL?>/productos">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="dropdown cart_botton">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-cart"></i>
   <span class="badge bg-secondary totalItemsCart"><?= $_SESSION["Cart"]["TotalItems"] ?? 0 ?> </span>
</button>
  </button>
  <ul class="dropdown-menu minicart-list" aria-labelledby="dropdownMenu2">
    <?php $this->view("shoppingcart/minicart");?>
  </ul>
</div>
  </div>
</header>