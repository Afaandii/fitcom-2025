  <?php
  $seller = [
    'name' => 'Amoerfarm Store',
    'rating' => 4.9,
    'location' => 'Sidoarjo',
    'response_time' => '± 20 menit'
  ];
  ?>

  <div class="container mt-4">
    <!-- Check if product exists -->
    <?php if ($data['product']): ?>
      <div class="row">
        <!-- Product Images -->
        <div class="col-lg-6">
          <div class="position-relative">
            <!-- Main Image -->
            <div class="product-image-container mb-3" id="imageContainer">
              <?php
              $images = $product['image'] ?? [$product['image']];
              ?>
              <img src="<?= $images[0] ?>" alt="Product Image" class="product-image" id="mainImage">
              <div class="zoom-lens" id="zoomLens"></div>
            </div>

            <!-- Thumbnail Images -->
            <div class="d-flex gap-2 flex-wrap">
              <?php foreach ($product['image'] as $index => $image): ?>
                <img src="<?= $image ?>" alt="Thumbnail" class="thumbnail-image <?= $index === 0 ? 'active' : '' ?>"
                  onclick="changeMainImage('<?= $image ?>', this)">
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <!-- Product Info -->
        <div class="col-lg-6">
          <div class="ps-lg-4">
            <h1 class="h3 fw-bold mb-2"><?= $product['name'] ?></h1>
            <p class="text-muted mb-2">Brand: <span class="text-dark"><?= $product['name'] ?></span></p>

            <!-- Rating & Reviews -->
            <div class="d-flex align-items-center mb-3">
              <div class="rating-stars me-2">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                  <i class="<?= $i <= floor($product['rating']) ? 'fas' : 'far' ?> fa-star"></i>
                <?php endfor; ?>
              </div>
              <span class="me-3"><?= $product['rating'] ?></span>
              <span class="text-muted me-3">(<?= number_format($product['review_count']) ?> ulasan)</span>
              <span class="text-muted"><?= number_format($product['sold']) ?> terjual</span>
            </div>

            <!-- Price -->
            <div class="mb-4">
              <div class="d-flex align-items-center gap-3 mb-2">
                <h2 class="h4 text-primary fw-bold mb-0"><?= $product['price'] ?></h2>
                <span class="price-original">Rp <?= number_format($product['original_price']) ?></span>
                <span class="price-discount"><?= $product['discount'] ?>%</span>
              </div>
              <p class="text-success mb-0"><i class="fas fa-check-circle"></i> Hemat Rp
                <?= number_format($product['original_price'] - 21999000) ?></p>
            </div>

            <!-- Quantity -->
            <div class="mb-4">
              <h6 class="fw-bold">Jumlah:</h6>
              <div class="d-flex align-items-center">
                <button class="btn btn-outline-secondary" onclick="decrementQuantity()">-</button>
                <input type="number" class="form-control mx-2 text-center" value="1" min="1"
                  max="<?= $product['stock'] ?>" id="quantity" style="width: 80px;">
                <button class="btn btn-outline-secondary" onclick="incrementQuantity()">+</button>
                <span class="ms-3 text-muted">Stok: <?= $product['stock'] ?></span>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-grid gap-2 d-md-flex mb-4">
              <button class="btn btn-outline-custom flex-fill" onclick="addToCart()">
                <i class="fas fa-shopping-cart me-2"></i>Keranjang
              </button>
              <button class="btn btn-primary-custom flex-fill" onclick="buyNow()">
                <i class="fas fa-bolt me-2"></i>Beli Sekarang
              </button>
            </div>

            <!-- Seller Info -->
            <div class="seller-info">
              <h6 class="fw-bold mb-3"><i class="fas fa-store me-2"></i>Informasi Penjual</h6>
              <div class="row">
                <div class="col-6">
                  <p class="mb-1 fw-bold"><?= $seller['name'] ?></p>
                  <p class="text-muted mb-2">
                    <i class="fas fa-star text-warning"></i> <?= $seller['rating'] ?> |
                    <i class="fas fa-map-marker-alt"></i> <?= $seller['location'] ?>
                  </p>
                </div>
                <div class="col-6">
                  <p class="mb-1"><i class="fas fa-clock"></i> Waktu Respon</p>
                  <p class="text-muted"><?= $seller['response_time'] ?></p>
                </div>
              </div>
              <button class="btn btn-outline-primary btn-sm">Kunjungi Toko</button>
            </div>
          </div>
        </div>
      </div>
    <?php else: ?>
      <p class="text-center text-danger">Produk tidak ditemukan.</p>
    <?php endif; ?>

    <!-- Product Details Tabs -->
    <div class="row mt-5">
      <div class="col-12">
        <ul class="nav nav-tabs product-tabs" id="productTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description"
              type="button" role="tab">
              <i class="fas fa-info-circle me-2"></i>Deskripsi
            </button>
          </li>
        </ul>

        <div class="tab-content mt-4" id="productTabContent">
          <!-- Description -->
          <div class="tab-pane fade show active" id="description" role="tabpanel">
            <div class="p-4 bg-light rounded">
              <h5>Deskripsi Produk</h5>
              <p><?= $product['description'] ?></p>

              <h6 class="mt-4">Fitur Unggulan:</h6>
              <ul>
                <?php if (!empty($product['features']) && is_array($product['features'])): ?>
                  <?php foreach ($product['features'] as $fitur): ?>
                    <li><?= htmlspecialchars($fitur) ?></li>
                  <?php endforeach; ?>
                <?php else: ?>
                  <li>Tidak ada fitur tersedia.</li>
                <?php endif; ?>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>