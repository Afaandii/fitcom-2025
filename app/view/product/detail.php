<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>iPhone 15 Pro Max - Blibli Store</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    .product-image-container {
      position: relative;
      overflow: hidden;
      cursor: zoom-in;
      width: 100%;
      height: 450px;
      background: #f8f9fa;
      border-radius: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .product-image {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
      transition: transform 0.3s ease;
    }

    .zoom-lens {
      position: absolute;
      border: 2px solid #007bff;
      width: 150px;
      height: 150px;
      background: rgba(255, 255, 255, 0.2);
      pointer-events: none;
      opacity: 0;
      transition: opacity 0.2s ease;
      backdrop-filter: blur(1px);
      border-radius: 50%;
      box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
    }

    .thumbnail-image {
      width: 80px;
      height: 80px;
      object-fit: contain;
      cursor: pointer;
      border: 2px solid transparent;
      border-radius: 8px;
      transition: all 0.3s ease;
      background: #f8f9fa;
      padding: 5px;
    }

    .thumbnail-image:hover,
    .thumbnail-image.active {
      border-color: #007bff;
    }

    .price-original {
      text-decoration: line-through;
      color: #6c757d;
    }

    .price-discount {
      background: #dc3545;
      color: white;
      padding: 2px 8px;
      border-radius: 4px;
      font-size: 0.8em;
    }

    .rating-stars {
      color: #ffc107;
    }

    .product-tabs .nav-link {
      border: none;
      border-bottom: 3px solid transparent;
      color: #6c757d;
    }

    .product-tabs .nav-link.active {
      border-bottom-color: #007bff;
      color: #007bff;
    }

    .seller-info {
      background: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
    }

    .btn-primary-custom {
      background: linear-gradient(45deg, #007bff, #0056b3);
      border: none;
      padding: 12px 30px;
      border-radius: 25px;
    }

    .btn-outline-custom {
      border: 2px solid #007bff;
      color: #007bff;
      padding: 12px 30px;
      border-radius: 25px;
    }

    .btn-outline-custom:hover {
      background: #007bff;
      color: white;
    }

    .variant-option {
      border: 2px solid #dee2e6;
      padding: 8px 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
      margin: 5px;
      display: inline-block;
    }

    .variant-option:hover,
    .variant-option.active {
      border-color: #007bff;
      background: #e3f2fd;
    }

    .breadcrumb-custom {
      background: none;
      padding: 0;
    }

    .breadcrumb-custom .breadcrumb-item a {
      color: #007bff;
      text-decoration: none;
    }
  </style>
</head>

<body>

  <?php
  // Data seller untuk contoh
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
      <!-- <div class="container py-3">
            <div class="card shadow-sm p-4 mb-4">
                <div class="text-center mb-3">
                    <img src="<?= $data['product']['image']; ?>" 
                         class="img-fluid" 
                         alt="<?= $data['product']['name']; ?>"
                         style="max-height: 200px; object-fit: contain;">
                </div>
                <h2 class="text-center"><?= $data['product']['name']; ?></h2>
                <p class="text-primary fs-4 text-center"><?= $data['product']['price']; ?></p>
            </div>
        </div> -->

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
                <img src="<?= $image ?>" alt="Thumbnail"
                  class="thumbnail-image <?= $index === 0 ? 'active' : '' ?>"
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
              <p class="text-success mb-0"><i class="fas fa-check-circle"></i> Hemat Rp <?= number_format($product['original_price'] - 21999000) ?></p>
            </div>

            <!-- Variants -->
            <!-- <div class="mb-4">
                        <h6 class="fw-bold">Pilih Warna:</h6>
                        <div class="mb-3">
                            <?php foreach ($product['variants']['color'] as $color): ?>
                                <span class="variant-option <?= $color === 'Natural Titanium' ? 'active' : '' ?>" 
                                      onclick="selectVariant(this)"><?= $color ?></span>
                            <?php endforeach; ?>
                        </div>
                        
                        <h6 class="fw-bold">Pilih Kapasitas:</h6>
                        <div class="mb-3">
                            <?php foreach ($product['variants']['storage'] as $storage): ?>
                                <span class="variant-option <?= $storage === '256GB' ? 'active' : '' ?>" 
                                      onclick="selectVariant(this)"><?= $storage ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div> -->

            <!-- Quantity -->
            <div class="mb-4">
              <h6 class="fw-bold">Jumlah:</h6>
              <div class="d-flex align-items-center">
                <button class="btn btn-outline-secondary" onclick="decrementQuantity()">-</button>
                <input type="number" class="form-control mx-2 text-center" value="1" min="1" max="<?= $product['stock'] ?>" id="quantity" style="width: 80px;">
                <button class="btn btn-outline-secondary" onclick="incrementQuantity()">+</button>
                <span class="ms-3 text-muted">Stok: <?= $product['stock'] ?></span>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-grid gap-2 d-md-flex mb-4">
              <button class="btn btn-outline-custom flex-fill" onclick="addToWishlist()">
                <i class="fas fa-heart me-2"></i>Wishlist
              </button>
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
            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">
              <i class="fas fa-info-circle me-2"></i>Deskripsi
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="specifications-tab" data-bs-toggle="tab" data-bs-target="#specifications" type="button" role="tab">
              <i class="fas fa-cog me-2"></i>Spesifikasi
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">
              <i class="fas fa-star me-2"></i>Ulasan (<?= number_format($product['review_count']) ?>)
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

          <!-- Specifications -->
          <div class="tab-pane fade" id="specifications" role="tabpanel">
            <div class="p-4 bg-light rounded">
              <h5>Spesifikasi Teknis</h5>
              <div class="row">
                <?php foreach ($product['specifications'] as $spec => $value): ?>
                  <div class="col-md-6 mb-3">
                    <div class="d-flex justify-content-between border-bottom pb-2">
                      <span class="fw-bold"><?= $spec ?>:</span>
                      <span><?= $value ?></span>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

          <!-- Reviews -->
          <div class="tab-pane fade" id="reviews" role="tabpanel">
            <div class="p-4 bg-light rounded">
              <h5>Ulasan Pembeli</h5>
              <div class="row mb-4">
                <div class="col-md-3 text-center">
                  <h2 class="text-primary"><?= $product['rating'] ?></h2>
                  <div class="rating-stars mb-2">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                      <i class="<?= $i <= floor($product['rating']) ? 'fas' : 'far' ?> fa-star"></i>
                    <?php endfor; ?>
                  </div>
                  <p class="text-muted"><?= number_format($product['review_count']) ?> ulasan</p>
                </div>
                <div class="col-md-9">
                  <!-- Rating breakdown here -->
                  <p class="text-muted">Ulasan pembeli akan ditampilkan di sini...</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Magnifier zoom functionality
    let imageContainer, mainImage, zoomLens;

    // Initialize magnifier zoom
    function initializeMagnifierZoom() {
      imageContainer = document.getElementById('imageContainer');
      mainImage = document.getElementById('mainImage');
      zoomLens = document.getElementById('zoomLens');

      if (imageContainer && mainImage && zoomLens) {
        imageContainer.addEventListener('mousemove', handleMagnifierZoom);
        imageContainer.addEventListener('mouseleave', hideMagnifierZoom);
        console.log('Magnifier zoom initialized'); // Debug log
      } else {
        console.log('Elements not found for magnifier zoom'); // Debug log
      }
    }

    function handleMagnifierZoom(e) {
      const rect = imageContainer.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      // Create magnifier effect
      const magnifierSize = 150;
      const zoomLevel = 2.5;

      // Position and show lens
      zoomLens.style.width = magnifierSize + 'px';
      zoomLens.style.height = magnifierSize + 'px';
      zoomLens.style.left = (x - magnifierSize / 2) + 'px';
      zoomLens.style.top = (y - magnifierSize / 2) + 'px';
      zoomLens.style.opacity = '1';
      zoomLens.style.borderRadius = '50%';

      // Calculate the zoomed background position
      const bgX = -((x * zoomLevel) - magnifierSize / 2);
      const bgY = -((y * zoomLevel) - magnifierSize / 2);

      // Apply magnified background to lens
      zoomLens.style.backgroundImage = `url(${mainImage.src})`;
      zoomLens.style.backgroundSize = `${rect.width * zoomLevel}px ${rect.height * zoomLevel}px`;
      zoomLens.style.backgroundPosition = `${bgX}px ${bgY}px`;
      zoomLens.style.backgroundRepeat = 'no-repeat';
    }

    function hideMagnifierZoom() {
      if (zoomLens) {
        zoomLens.style.opacity = '0';
        zoomLens.style.backgroundImage = 'none';
      }
    }

    // Change main image
    function changeMainImage(src, thumbnail) {
      mainImage.src = src;

      // Update active thumbnail
      document.querySelectorAll('.thumbnail-image').forEach(img => {
        img.classList.remove('active');
      });
      thumbnail.classList.add('active');
    }

    // Variant selection
    function selectVariant(element) {
      // Remove active class from siblings
      element.parentNode.querySelectorAll('.variant-option').forEach(opt => {
        opt.classList.remove('active');
      });

      // Add active class to selected
      element.classList.add('active');
    }

    // Quantity controls
    function incrementQuantity() {
      const quantityInput = document.getElementById('quantity');
      const currentValue = parseInt(quantityInput.value);
      const maxValue = parseInt(quantityInput.max);

      if (currentValue < maxValue) {
        quantityInput.value = currentValue + 1;
      }
    }

    function decrementQuantity() {
      const quantityInput = document.getElementById('quantity');
      const currentValue = parseInt(quantityInput.value);
      const minValue = parseInt(quantityInput.min);

      if (currentValue > minValue) {
        quantityInput.value = currentValue - 1;
      }
    }

    // Action functions
    function addToWishlist() {
      alert('Produk ditambahkan ke wishlist!');
    }

    function addToCart() {
      const quantity = document.getElementById('quantity').value;
      alert(`${quantity} produk ditambahkan ke keranjang!`);
    }

    function buyNow() {
      const quantity = document.getElementById('quantity').value;
      alert(`Membeli ${quantity} produk sekarang!`);
    }

    // Initialize magnifier zoom on page load
    document.addEventListener('DOMContentLoaded', function() {
      initializeMagnifierZoom();
    });
  </script>

</body>

</html>