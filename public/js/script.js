/* Title browser bergerak */
$(function () {
    let text = " 🌱 AmoerFarm - Toko Pertanian Modern ";
    let i = 0;

    function scrollTitle() {
        document.title = text.substring(i) + text.substring(0, i);
        i = (i + 1) % text.length;
    }

    setInterval(scrollTitle, 250);
});

/* Magnifier zoom */
let $imageContainer, $mainImage, $zoomLens;

function initializeMagnifierZoom() {
    $imageContainer = $("#imageContainer");
    $mainImage = $("#mainImage");
    $zoomLens = $("#zoomLens");

    if ($imageContainer.length && $mainImage.length && $zoomLens.length) {
        $imageContainer.on("mousemove", handleMagnifierZoom);
        $imageContainer.on("mouseleave", hideMagnifierZoom);
    } else {
        console.error("Elements not found for magnifier zoom");
    }
}

function handleMagnifierZoom(e) {
    const rect = $imageContainer[0].getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    const magnifierSize = 150;
    const zoomLevel = 2.5;

    $zoomLens.css({
        width: magnifierSize + "px",
        height: magnifierSize + "px",
        left: (x - magnifierSize / 2) + "px",
        top: (y - magnifierSize / 2) + "px",
        opacity: "1",
        borderRadius: "50%",
        backgroundImage: `url(${$mainImage.attr("src")})`,
        backgroundSize: `${rect.width * zoomLevel}px ${rect.height * zoomLevel}px`,
        backgroundPosition: `${-((x * zoomLevel) - magnifierSize / 2)}px ${-((y * zoomLevel) - magnifierSize / 2)}px`,
        backgroundRepeat: "no-repeat"
    });
}

function hideMagnifierZoom() {
    $zoomLens.css({
        opacity: "0",
        backgroundImage: "none"
    });
}

// Change main image
function changeMainImage(src, thumbnail) {
    $mainImage.attr("src", src);

    $(".thumbnail-image").removeClass("active");
    $(thumbnail).addClass("active");
}

// Variant selection
function selectVariant(element) {
    $(element).siblings(".variant-option").removeClass("active");
    $(element).addClass("active");
}

// Quantity controls
function incrementQuantity() {
    let $quantityInput = $("#quantity");
    let currentValue = parseInt($quantityInput.val());
    let maxValue = parseInt($quantityInput.attr("max"));

    if (currentValue < maxValue) {
        $quantityInput.val(currentValue + 1);
    }
}

function decrementQuantity() {
    let $quantityInput = $("#quantity");
    let currentValue = parseInt($quantityInput.val());
    let minValue = parseInt($quantityInput.attr("min"));

    if (currentValue > minValue) {
        $quantityInput.val(currentValue - 1);
    }
}

// Action functions
function addToWishlist() {
    alert("Produk ditambahkan ke wishlist!");
}

function addToCart() {
    let quantity = $("#quantity").val();
    alert(`${quantity} produk ditambahkan ke keranjang!`);
}

function buyNow() {
    let quantity = $("#quantity").val();
    alert(`Membeli ${quantity} produk sekarang!`);
}

// Initialize magnifier zoom on page load
$(function () {
    initializeMagnifierZoom();
});
/* magnifier zoom end */

/* register */
$(function () {
    $('#registerForm').on('submit', function (e) {
        const password = $('#password').val();
        const phone = $('#phone').val();

        // Password validation
        if (password.length < 8) {
            e.preventDefault();
            alert('Kata sandi minimal 8 karakter');
            return false;
        }

        const phonePattern = /^(\+62|62|0)[0-9]{9,12}$/;
        if (!phonePattern.test(phone.replace(/\s+/g, ''))) {
            e.preventDefault();
            alert('Format nomor HP tidak valid');
            return false;
        }
    });

    $('#phone').on('input', function () {
        let value = $(this).val().replace(/\D/g, '');

        if (value.startsWith('62')) {
            value = '+' + value;
        } else if (value.startsWith('0')) {
            value = value;
        }

        $(this).val(value);
    });
});
/* register end */





// Variabel global untuk menyimpan data produk
let allProducts = {};

// Fungsi untuk render produk
function renderProducts(productsToShow) {
    const productContainer = $('#product-container');

    if (productContainer.length === 0) {
        console.error('Product container dengan ID #product-container tidak ditemukan!');
        return;
    }

    productContainer.empty();

  // Jika tidak ada produk yang cocok
  if (!productsToShow || Object.keys(productsToShow).length === 0) {
    productContainer.html(`
      <div class="col-12 text-center py-5">
        <div class="alert alert-info">
          <i class="fas fa-search mb-3" style="font-size: 3rem; opacity: 0.5;"></i>
          <h5>Produk tidak ditemukan</h5>
          <p class="mb-0">Coba gunakan kata kunci yang berbeda</p>
        </div>
      </div>
    `);
    return;
  }

  // Render setiap produk
  Object.entries(productsToShow).forEach(([id, product]) => {
    console.log(`Rendering product ID ${id}:`, product); // Debug log
    
    const productCard = `
      <div class="col-6 col-lg-3 mb-3">
        <a href="/fitcom-2025/public/product/detail/${id}" class="text-decoration-none">
          <div class="card text-center w-100 shadow-sm rounded-3 h-100">
            <div class="p-3">
              <img src="${product.image}" alt="${product.name}" class="img-fluid rounded-3" style="height: 200px; object-fit: cover;">
            </div>
            <div class="card-body bg-light">
              <h2 class="h5 fw-bold text-dark">${product.name}</h2>
              <p class="text-primary fs-6 fw-semibold mt-2 mb-0">${product.price}</p>
            </div>
          </div>
        </a>
      </div>
    `;
    productContainer.append(productCard);
  });
}

// Fungsi search sederhana
function searchProducts(query) {
    if (!query || query.trim() === '') {
        return allProducts;
    }

    const filteredProducts = {};
    const searchQuery = query.toLowerCase().trim();

  // Loop through semua produk
  for (const [id, product] of Object.entries(allProducts)) {
    // Search berdasarkan nama
    if (product.name && product.name.toLowerCase().includes(searchQuery)) {
      filteredProducts[id] = product;
      continue;
    }

    // Search berdasarkan harga (hanya angka)
    if (product.price) {
      const priceNumbers = product.price.replace(/[^\d]/g, '');
      const queryNumbers = searchQuery.replace(/[^\d]/g, '');
      if (queryNumbers && priceNumbers.includes(queryNumbers)) {
        filteredProducts[id] = product;
        continue;
      }
    }
  }

    return filteredProducts;
}

$(document).ready(function () {
    if (typeof window.phpProducts !== 'undefined' && window.phpProducts) {
        allProducts = window.phpProducts;
        renderProducts(allProducts);
    } else {
        console.error('Data produk dari PHP tidak ditemukan!');
    }

    let searchTimeout;
    $('input[type="search"]').on('input', function () {
        const query = $(this).val();
        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function () {
            const filteredProducts = searchProducts(query);
            renderProducts(filteredProducts);

            if (query.trim() && $('#product-container').length > 0) {
                $('html, body').animate({
                    scrollTop: $('#product-container').offset().top - 100
                }, 300);
            }
        }, 300);
    });

    $('form[role="search"]').on('submit', function (e) {
        e.preventDefault();
        const query = $(this).find('input[type="search"]').val();
        const filteredProducts = searchProducts(query);
        renderProducts(filteredProducts);

        if (query.trim() && $('#product-container').length > 0) {
            $('html, body').animate({
                scrollTop: $('#product-container').offset().top - 100
            }, 300);
        }
    });

    $(document).on('keyup', 'input[type="search"]', function (e) {
        if (e.keyCode === 27) {
            $(this).val('');
            renderProducts(allProducts);
        }
    });
});