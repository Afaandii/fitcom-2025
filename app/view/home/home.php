<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bs css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font awesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Agrikalcer</title>
</head>

<body>
  <!-- navigasi bar -->
  <section class="w-100 h-100">
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
      <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#">
          <img src="img/logo-agrikalcer.png" alt="Logo" width="100" class="me-2">
        </a>

        <!-- Toggler button (mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarEcom"
          aria-controls="navbarEcom" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="navbarEcom">
          <!-- Search -->
          <form class="flex-grow-1 mx-lg-3 my-3 my-lg-0" role="search">
            <div class="input-group">
              <span class="input-group-text bg-white border-end-0 rounded-start-pill">
                <i class="fas fa-search text-secondary"></i>
              </span>
              <input type="search" class="form-control border-start-0 rounded-end-pill" placeholder="Cari produk...">
            </div>
          </form>

          <!-- Right menu -->
          <div class="d-flex align-items-center">
            <!-- Cart -->
            <a href="#" class="btn btn-outline-secondary me-3 position-relative">
              <i class="fas fa-shopping-cart"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                0
              </span>
            </a>
            <!-- Login & Register -->
            <a href="#" class="btn btn-outline-primary me-2">Masuk</a>
            <a href="#" class="btn btn-primary">Daftar</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- navigasi bar end -->

    <!-- carousel -->
    <div class="container-fluid">
      <div class="carousel-container">
        <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
          <!-- Indicators -->
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
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
  </section>

  <!-- bs js -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>