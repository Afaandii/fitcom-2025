<div class="card-wrapper container py-3">
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
                        <input type="checkbox" class="shop-checkbox" id="shop-<?= $shop['shop_id'] ?>"
                            onchange="toggleShopSelection(<?= $shop['shop_id'] ?>)">
                        <i class="fas fa-store ms-2 me-2 text-primary"></i>
                    </div>

                    <!-- Shop Items -->
                    <?php foreach ($shop['items'] as $itemIndex => $item): ?>
                        <div class="cart-item" data-item-id="<?= $item['id'] ?>">
                            <div class="d-flex align-items-start">
                                <!-- Checkbox -->
                                <input type="checkbox" class="cart-item-checkbox me-3" id="item-<?= $item['id'] ?>"
                                    <?= $item['selected'] ? 'checked' : '' ?>
                                    onchange="toggleItemSelection(<?= $item['id'] ?>, <?= $shop['shop_id'] ?>)">

                                <!-- Product Image -->
                                <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="cart-item-image me-3">

                                <!-- Product Info -->
                                <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-medium"><?= $item['name'] ?></h6>

                                    <!-- Price -->
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="price-current me-2">Rp <?= number_format($item['price']) ?></span>
                                    </div>

                                    <!-- Quantity Controller -->
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="quantity-controller">
                                            <button class="quantity-btn" onclick="updateQuantity(<?= $item['id'] ?>, -1)"
                                                <?= $item['quantity'] <= 1 ? 'disabled' : '' ?>>
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input type="number" class="quantity-input" value="<?= $item['quantity'] ?>" min="1"
                                                max="<?= $item['stock'] ?>" onchange="setQuantity(<?= $item['id'] ?>, this.value)">
                                            <button class="quantity-btn" onclick="updateQuantity(<?= $item['id'] ?>, 1)"
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
    <div class="container-fluid mt-2">
        <h6 class="mb-3 fw-bold">Rekomendasi Untukmu</h6>
        <div class="row justify-content-center g-2 g-lg-3">
            <?php if (isset($dataCart['recommendations']) && !empty($dataCart['recommendations'])): ?>
                <?php foreach ($dataCart['recommendations'] as $product): ?>
                    <div class="col-6 col-lg-3 ">
                        <div class="card text-center w-100 shadow-sm rounded-3 h-100">
                            <a href="/fitcom-2025/public/product/detail/<?= $product['id'] ?>" class="text-decoration-none">
                                <div class="p-3">
                                    <img src="<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>"
                                        class="img-fluid rounded-3">
                                </div>
                            </a>
                            <div class="card-body bg-light">
                                <h6 class="fw-bold text-dark"><?= htmlspecialchars($product['name']); ?></h6>
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="text-primary fw-semibold fs-6">
                                        Rp <?= htmlspecialchars($product['price']) ?>
                                    </span>
                                </div>
                                <button class="btn btn-primary btn-sm mt-3" onclick="addToCartFromRecommendation(<?= $product['id'] ?>)">
                                    <i class="fas fa-cart-plus me-1"></i>Tambah ke Keranjang
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Tidak ada rekomendasi produk tersedia</p>
                </div>
            <?php endif; ?>
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
                <div class="small text-muted">Total (<span id="totalItems"><?= $dataCart['summary']['total_items'] ?></span> item)
                </div>
                <div class="fw-bold text-primary" id="totalPrice">Rp <?= number_format($dataCart['summary']['final_price']) ?>
                </div>
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