<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bs css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font awesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="icon" href="<?= BASEURL ?>/img/amoer-logo-pure.png" type="image/png">
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">

  <title>AmoerFarm</title>
</head>

<body>
  <header>
    <!-- navbar bar -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brands d-flex align-items-center" href="<?= BASEURL; ?>">
          <img src="<?= BASEURL; ?>/img/AmoerFarm Logo.png" alt="Logo" width="100" class="me-2">
        </a>

        <!-- hamburger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarEcom"
          aria-controls="navbarEcom" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

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

          <div class="d-flex align-items-center">
            <!-- Cart -->
            <a href="<?= BASEURL ?>/cart" class="btn btn-outline-secondary me-3 position-relative">
              <i class="fas fa-shopping-cart"></i>
            </a>

            <a href="<?= BASEURL ?>/auth" class="btn btn-outline-primary me-2">Masuk</a>
            <a href="<?= BASEURL ?>/auth/register" class="btn btn-primary">Daftar</a>
          </div>
        </div>
      </div>
    </nav>

    <!-- untuk ukuran mobile bagian bottom -->
    <nav class="bottom-nav">
      <ul class="nav">
        <li class="nav-item">
          <a href="<?= BASEURL; ?>"
            class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/fitcom-2025/public/' ? 'active' : '') ?>">
            <i class="fas fa-home"></i>
            <span>Beranda</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= BASEURL; ?>/cart"
            class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], '/cart') !== false ? 'active' : '') ?>">
            <i class="fas fa-shopping-cart"></i>
            <span>Keranjang</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= BASEURL; ?>/auth"
            class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], '/auth') !== false ? 'active' : '') ?>">
            <i class="fas fa-user"></i>
            <span>Akun</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- navbar end -->
  </header>