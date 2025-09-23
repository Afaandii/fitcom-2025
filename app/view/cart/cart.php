<nav class="navbar header-cart">
    <div class="container">
        <div class="d-flex align-items-center w-100">
            <button class="btn btn-link p-0 me-3" onclick="history.back()">
                <i class="fas fa-arrow-left fs-5"></i>
            </button>
            <span class="navbar-brand mb-0 h1">Keranjang</span>
        </div>
    </div>
</nav>

<div class="container py-3">
    <?php if (empty($dataCart['cart']) || $this->isCartEmpty($dataCart['cart'])): ?>
        <!-- Empty Cart -->
        <div class="empty-cart">
            <i class="fas fa-shopping-cart"></i>
            <h5 class="mb-3">Keranjang Masih Kosong</h5>
            <p class="text-muted mb-4">Yuk, isi keranjangmu dengan produk-produk terbaik!</p>
            <button class="btn btn-primary" onclick="location.href='<?= BASEURL; ?>'">
                <i class="fas fa-search me-2"></i>Mulai Belanja
            </button>
        </div>
    <?php else: ?>
        <!-- Cart Items -->
        <div class="cart-items">
            <?php foreach ($dataCart['cart'] as $shopIndex => $shop): ?>
                <div class="shop-section" data-shop-id="<?= $shop['shop_id'] ?>">
                    <!-- Shop Header -->
                    <div class="shop-header">
                        <input type="checkbox" class="shop-checkbox" 
                               id="shop-<?= $shop['shop_id'] ?>" 
                               onchange="toggleShopSelection(<?= $shop['shop_id'] ?>)">
                        <i class="fas fa-store ms-2 me-2 text-primary"></i>
                    </div>
                    
                    <!-- Shop Items -->
                    <?php foreach ($shop['items'] as $itemIndex => $item): ?>
                        <div class="cart-item" data-item-id="<?= $item['id'] ?>">
                            <div class="d-flex align-items-start">
                                <!-- Checkbox -->
                                <input type="checkbox" class="cart-item-checkbox me-3" 
                                       id="item-<?= $item['id'] ?>"
                                       <?= $item['selected'] ? 'checked' : '' ?>
                                       onchange="toggleItemSelection(<?= $item['id'] ?>, <?= $shop['shop_id'] ?>)">
                                
                                <!-- Product Image -->
                                <img src="<?= $item['image'] ?>" 
                                     alt="<?= $item['name'] ?>" 
                                     class="cart-item-image me-3">
                                
                                <!-- Product Info -->
                                <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-medium"><?= $item['name'] ?></h6>
                                    
                                    <!-- Price -->
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="price-current me-2">Rp <?= number_format($item['price']) ?></span>
                                        <?php if ($item['original_price'] > $item['price']): ?>
                                            <span class="price-original me-2">Rp <?= number_format($item['original_price']) ?></span>
                                            <span class="price-discount"><?= $item['discount'] ?>%</span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Quantity Controller -->
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="quantity-controller">
                                            <button class="quantity-btn" 
                                                    onclick="updateQuantity(<?= $item['id'] ?>, -1)"
                                                    <?= $item['quantity'] <= 1 ? 'disabled' : '' ?>>
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input type="number" class="quantity-input" 
                                                   value="<?= $item['quantity'] ?>" 
                                                   min="1" max="<?= $item['stock'] ?>"
                                                   onchange="setQuantity(<?= $item['id'] ?>, this.value)">
                                            <button class="quantity-btn" 
                                                    onclick="updateQuantity(<?= $item['id'] ?>, 1)"
                                                    <?= $item['quantity'] >= $item['stock'] ? 'disabled' : '' ?>>
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        
                                        <!-- Delete Button -->
                                        <button class="delete-btn" onclick="removeItem(<?= $item['id'] ?>)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    
                                    <p class="text-muted small mb-0 mt-1">Stok: <?= $item['stock'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <!-- Recommendations -->
    <div class="recommendations">
        <h6 class="mb-3 fw-bold">Rekomendasi Untukmu</h6>
        <div class="row g-2">
            <?php foreach ($dataCart['recommendations'] as $product): ?>
                <div class="col-6 col-md-3">
                    <div class="recommendation-card">
                        <a href="/fitcom-2025/public/product/detail/<?= $product['id'] ?>" class="text-decoration-none">
                            <img src="<?= $product['image'] ?>" 
                             alt="<?= $product['name'] ?>" 
                             class="recommendation-image">
                            <div class="recommendation-content">
                                <h6 class="recommendation-title"><?= $product['name'] ?></h6>
                                <div class="d-flex align-items-center">
                                    <span class="recommendation-price">Rp <?= number_format($product['price']) ?></span>
                                    <?php if ($product['discount']): ?>
                                        <span class="price-discount ms-1"><?= $product['discount'] ?>%</span>
                                    <?php endif; ?>
                                </div>
                                <button class="btn btn-primary btn-sm mt-2" 
                                    onclick="addToCartFromRecommendation(<?= $product['id'] ?>)">
                                    <i class="fas fa-cart-plus me-1"></i>Tambah ke Keranjang
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Cart Summary (Fixed Bottom) -->
<?php if (!empty($dataCart['cart']) && !$this->isCartEmpty($dataCart['cart'])): ?>
<div class="cart-summary">
    <!-- Select All -->
    <div class="select-all-section">
        <div class="d-flex align-items-center">
            <input type="checkbox" class="me-2" id="selectAll" onchange="toggleSelectAll()">
            <label for="selectAll" class="small mb-0">Pilih Semua</label>
        </div>
        <div class="text-end">
            <div class="small text-muted">Total (<span id="totalItems"><?= $dataCart['summary']['total_items'] ?></span> item)</div>
            <div class="fw-bold text-primary" id="totalPrice">Rp <?= number_format($dataCart['summary']['final_price']) ?></div>
        </div>
    </div>
    
        <!-- Checkout Button -->
        <button class="checkout-btn mt-2" id="checkoutBtn" onclick="checkout()">
            Checkout (<span id="checkoutCount"><?= $dataCart['summary']['total_items'] ?></span>)
        </button>
</div>
<?php endif; ?>


<script>
    let cartData = <?= json_encode($dataCart) ?>;
</script>