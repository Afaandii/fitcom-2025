<section class="w-100 h-100">
  <!-- carousel -->
  <div class="container-fluid p-2 mt-3">
    <div class="carousel-container">
      <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <!-- Indicators -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
          <!-- Slide 1 -->
          <div class="carousel-item active">
            <img
              src="https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
              class="d-block w-100" alt="Banner Promo 1">
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item">
            <img
              src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
              class="d-block w-100" alt="Banner Promo 2">
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item">
            <img
              src="https://images.unsplash.com/photo-1472851294608-062f824d29cc?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
              class="d-block w-100" alt="Banner Promo 3">
          </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
  <!-- carousel end -->

  <!-- kategori card -->
  <div class="container-fluid bg-light rounded-2 mt-3">
    <div class="card-container">
      <div class="card-scroll justify-content-lg-center gap-lg-4">
        <div class="card-kategori">
          <a href="#">
            <div class="container-icon">
              <img src="img/AmoerFarm Logo.png" alt="logo" class="kategori-img-logo">
            </div>
            <h6 class="mt-2">Dummy</h6>
          </a>
        </div>
        <div class="card-kategori">
          <a href="#">
            <div class="container-icon">
              <img src="img/AmoerFarm Logo.png" alt="logo" class="kategori-img-logo">
            </div>
            <h6 class="mt-2">Dummy</h6>
          </a>
        </div>
        <div class="card-kategori">
          <a href="#">
            <div class="container-icon">
              <img src="img/AmoerFarm Logo.png" alt="logo" class="kategori-img-logo">
            </div>
            <h6 class="mt-2">Dummy</h6>
          </a>
        </div>
        <div class="card-kategori">
          <a href="#">
            <div class="container-icon">
              <img src="img/AmoerFarm Logo.png" alt="logo" class="kategori-img-logo">
            </div>
            <h6 class="mt-2">Dummy</h6>
          </a>
        </div>
        <div class="card-kategori">
          <a href="#">
            <div class="container-icon">
              <img src="img/AmoerFarm Logo.png" alt="logo" class="kategori-img-logo">
            </div>
            <h6 class="mt-2">Dummy</h6>
          </a>
        </div>
        <div class="card-kategori">
          <a href="#">
            <div class="container-icon">
              <img src="img/AmoerFarm Logo.png" alt="logo" class="kategori-img-logo">
            </div>
            <h6 class="mt-2">Dummy</h6>
          </a>
        </div>
        <div class="card-kategori">
          <a href="#">
            <div class="container-icon">
              <img src="img/AmoerFarm Logo.png" alt="logo" class="kategori-img-logo">
            </div>
            <h6 class="mt-2">Dummy</h6>
          </a>
        </div>
        <div class="card-kategori">
          <a href="#">
            <div class="container-icon">
              <img src="img/AmoerFarm Logo.png" alt="logo" class="kategori-img-logo">
            </div>
            <h6 class="mt-2">Dummy</h6>
          </a>
        </div>
        <div class="card-kategori">
          <a href="#">
            <div class="container-icon">
              <img src="img/AmoerFarm Logo.png" alt="logo" class="kategori-img-logo">
            </div>
            <h6 class="mt-2">Dummy</h6>
          </a>
        </div>
        <div class="card-kategori">
          <a href="#">
            <div class="container-icon">
              <img src="img/AmoerFarm Logo.png" alt="logo" class="kategori-img-logo">
            </div>
            <h6 class="mt-2">Dummy</h6>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- kategori card end -->

  <!-- card produk -->
  <div class="container-fluid">
    <div class="row justify-content-center g-2 g-lg-3">

      <!-- ini dummy dari controller home -->
      <?php foreach ($products as $id => $product) : ?>
        <div class="col-6 col-lg-3">
          <a href="/fitcom-2025/public/product/detail/<?= $id ?>" class="text-decoration-none">
            <div class="card text-center w-100 shadow-sm rounded-3">
              <div class="p-3">
                <img src="<?= $product['image']; ?>" alt="poto.png" class="img-fluid rounded-3">
              </div>
              <div class="card-body bg-light">
                <h2 class="h4 fw-bold text-dark"><?= $product['name']; ?></h2>
                <p class="text-primary fs-5 fw-semibold mt-2"><?= $product['price']; ?></p>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
  <!-- card produk end -->
</section>