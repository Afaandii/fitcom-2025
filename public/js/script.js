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

// atur posisi tetap wripper section ketika navbar fixed
document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".navbar.fixed-top");
    const wrapper = document.querySelector("section.w-100.h-100");
    const wrapperDetil = document.querySelector(".container.mt-4");
    const wrapperKeranjangKining = document.querySelector(".shop-section");

    if (navbar && wrapper) {
      wrapper.style.paddingTop = navbar.offsetHeight + "px";
    } else if(navbar && wrapperDetil){
        wrapperDetil.style.paddingTop = navbar.offsetHeight + "px";
    } else if(navbar && wrapperKeranjangKining){
        wrapperKeranjangKining.style.paddingTop = navbar.offsetHeight + "px";
    }
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

// seacrh bar script
let allProducts = {};

// Fungsi untuk render produk (hanya di halaman home)
function renderProducts(productsToShow) {
  
  const productContainer = $('#product-container');
  
  if (productContainer.length === 0) {
    // Jika tidak di halaman home, tidak perlu render
    return;
  }

  productContainer.empty();

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

  Object.entries(productsToShow).forEach(([id, product]) => {
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

  for (const [id, product] of Object.entries(allProducts)) {
    if (product.name && product.name.toLowerCase().includes(searchQuery)) {
      filteredProducts[id] = product;
      continue;
    }

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

// Fungsi untuk redirect ke home dengan search query
function redirectToSearchResults(query) {
  if (query && query.trim()) {
    // Encode query untuk URL
    const encodedQuery = encodeURIComponent(query.trim());
    // Redirect ke home dengan parameter search
    window.location.href = '/fitcom-2025/public/?search=' + encodedQuery;
  } else {
    // Jika query kosong, redirect ke home biasa
    window.location.href = '/fitcom-2025/public/';
  }
}

// Fungsi untuk cek apakah sedang di halaman home
function isHomePage() {
  const currentPath = window.location.pathname;
  const isHome = currentPath === '/fitcom-2025/public/' || 
                 currentPath === '/fitcom-2025/public/index.php' ||
                 currentPath.endsWith('/public/') ||
                 currentPath.includes('/home/');
  return isHome;
}

// Fungsi untuk handle search dari URL parameter
function handleSearchFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    const searchQuery = urlParams.get('search');

    if (searchQuery) {

        // Set nilai search input
        $('input[type="search"], input[placeholder*="Cari"]').val(searchQuery);

        // Jika di halaman home, langsung filter produk
        if (isHomePage() && allProducts && Object.keys(allProducts).length > 0) {
            const filteredProducts = searchProducts(searchQuery);
            renderProducts(filteredProducts);

            // Sembunyikan carousel dan kategori jika ada pencarian
            const $carousel = $('.carousel-container');
            const $kategori = $('.card-container');
            $carousel.hide();
            $kategori.hide();

            // Scroll ke hasil
            setTimeout(() => {
                if ($('#product-container').length > 0) {
                    $('html, body').animate({
                        scrollTop: $('#product-container').offset().top - 100
                    }, 300);
                }
            }, 100);
        }
    }
}

// Initialize saat document ready
$(document).ready(function() {
  
  // CEK APAKAH DI HALAMAN HOME
  const isHome = isHomePage();
  
  if (isHome) {
    // JIKA DI HALAMAN HOME - Setup data dan render
    if (typeof window.phpProducts !== 'undefined' && window.phpProducts) {
      allProducts = window.phpProducts;
      
      // Cek apakah ada search query dari URL
      const urlParams = new URLSearchParams(window.location.search);
      const searchQuery = urlParams.get('search');
      
      if (searchQuery) {
        // Ada search query, filter dan render
        const filteredProducts = searchProducts(searchQuery);
        renderProducts(filteredProducts);
      } else {
        // Tidak ada search, render semua produk
        renderProducts(allProducts);
      }
    }
    
    // Setup search untuk halaman home (real-time filtering)
    let searchTimeout;
    $('input[type="search"], input[placeholder*="Cari"]').on('input', function() {
      const query = $(this).val();

      // Sembunyikan carousel dan kategori jika ada pencarian
      const $carousel = $('.carousel-container');
      const $kategori = $('.card-container');

      if (query.trim()) {
          $carousel.hide();
          $kategori.hide();
      } else {
          $carousel.show();
          $kategori.show();
      }

      clearTimeout(searchTimeout);

      searchTimeout = setTimeout(function() {
          const filteredProducts = searchProducts(query);
          renderProducts(filteredProducts);

          // Update URL tanpa reload
          const newUrl = query.trim() ?
              '/fitcom-2025/public/?search=' + encodeURIComponent(query.trim()) :
              '/fitcom-2025/public/';
          window.history.replaceState({}, '', newUrl);

          if (query.trim() && $('#product-container').length > 0) {
              $('html, body').animate({
                  scrollTop: $('#product-container').offset().top - 100
              }, 300);
          }
      }, 300);
    });
    
  }
  
  // SETUP FORM SUBMIT UNTUK SEMUA HALAMAN (redirect ke home)
  $('form[role="search"], form').on('submit', function(e) {
    e.preventDefault();
    
    const query = $(this).find('input[type="search"], input[placeholder*="Cari"]').val();
    
    if (isHome && allProducts && Object.keys(allProducts).length > 0) {
      // Jika di home dan ada data, filter langsung
      const filteredProducts = searchProducts(query);
      renderProducts(filteredProducts);
      
      // Update URL
      const newUrl = query.trim() ? 
        '/fitcom-2025/public/?search=' + encodeURIComponent(query.trim()) : 
        '/fitcom-2025/public/';
      window.history.replaceState({}, '', newUrl);
      
      if (query.trim() && $('#product-container').length > 0) {
        $('html, body').animate({
          scrollTop: $('#product-container').offset().top - 100
        }, 300);
      }
    } else {
      // Jika tidak di home, redirect ke home dengan query
      redirectToSearchResults(query);
    }
  });
  
  // SETUP ESC KEY UNTUK CLEAR SEARCH
  $(document).on('keyup', 'input[type="search"], input[placeholder*="Cari"]', function(e) {
    if (e.keyCode === 27) {
      $(this).val('');
      
      if (isHome) {
        renderProducts(allProducts);
        window.history.replaceState({}, '', '/fitcom-2025/public/');
      }
    }
  });
  
  // Handle search dari URL parameter (untuk direct links)
  handleSearchFromURL();
});


/* keranjang */
// Global Cart Functions

// Toggle item selection
function toggleItemSelection(itemId, shopId) {
    const checkbox = document.getElementById(`item-${itemId}`);
    const isSelected = checkbox.checked;
    
    // Update data
    updateItemSelection(itemId, shopId, isSelected);
    
    // Update shop checkbox
    updateShopCheckbox(shopId);
    
    // Update summary
    updateCartSummary();
    
    // Show feedback
    showToast(isSelected ? 'Produk dipilih' : 'Produk tidak dipilih');
}

// Toggle shop selection
function toggleShopSelection(shopId) {
    const shopCheckbox = document.getElementById(`shop-${shopId}`);
    const isSelected = shopCheckbox.checked;
    
    // Update all items in this shop
    const shopSection = document.querySelector(`[data-shop-id="${shopId}"]`);
    const itemCheckboxes = shopSection.querySelectorAll('.cart-item-checkbox');
    
    itemCheckboxes.forEach(checkbox => {
        checkbox.checked = isSelected;
        const itemId = parseInt(checkbox.id.replace('item-', ''));
        updateItemSelection(itemId, shopId, isSelected);
    });
    
    updateCartSummary();
    showToast(isSelected ? 'Semua produk toko dipilih' : 'Semua produk toko tidak dipilih');
}

// Toggle select all
function toggleSelectAll() {
    const selectAllCheckbox = document.getElementById('selectAll');
    const isSelected = selectAllCheckbox.checked;
    
    // Update all items
    document.querySelectorAll('.cart-item-checkbox').forEach(checkbox => {
        checkbox.checked = isSelected;
        const itemId = parseInt(checkbox.id.replace('item-', ''));
        const shopId = parseInt(checkbox.closest('[data-shop-id]').dataset.shopId);
        updateItemSelection(itemId, shopId, isSelected);
    });
    
    // Update all shop checkboxes
    document.querySelectorAll('.shop-checkbox').forEach(checkbox => {
        checkbox.checked = isSelected;
    });
    
    updateCartSummary();
    showToast(isSelected ? 'Semua produk dipilih' : 'Semua produk tidak dipilih');
}

// Update quantity
function updateQuantity(itemId, change) {
    const item = findCartItem(itemId);
    if (!item) return;
    
    const newQuantity = item.quantity + change;
    if (newQuantity < 1 || newQuantity > item.stock) return;
    
    item.quantity = newQuantity;
    
    // Update UI
    const quantityInput = document.querySelector(`[data-item-id="${itemId}"] .quantity-input`);
    quantityInput.value = newQuantity;
    
    // Update buttons
    const minusBtn = document.querySelector(`[data-item-id="${itemId}"] .quantity-btn:first-child`);
    const plusBtn = document.querySelector(`[data-item-id="${itemId}"] .quantity-btn:last-child`);
    
    minusBtn.disabled = newQuantity <= 1;
    plusBtn.disabled = newQuantity >= item.stock;
    
    updateCartSummary();
    showToast(`Quantity updated to ${newQuantity}`);
}

// Set quantity directly
function setQuantity(itemId, quantity) {
    const item = findCartItem(itemId);
    if (!item) return;
    
    const newQuantity = parseInt(quantity);
    if (newQuantity < 1 || newQuantity > item.stock) {
        // Reset to valid value
        document.querySelector(`[data-item-id="${itemId}"] .quantity-input`).value = item.quantity;
        return;
    }
    
    item.quantity = newQuantity;
    updateCartSummary();
}

// Remove item
function removeItem(itemId) {
    if (!confirm('Hapus produk dari keranjang?')) return;
    
    // Find and remove item
    cartData.cart.forEach(shop => {
        shop.items = shop.items.filter(item => item.id !== itemId);
    });
    
    // Remove empty shops
    cartData.cart = cartData.cart.filter(shop => shop.items.length > 0);
    
    // Remove from DOM
    document.querySelector(`[data-item-id="${itemId}"]`).remove();
    
    // Check if cart is empty
    if (isCartEmpty()) {
        location.reload(); // Refresh to show empty state
    } else {
        updateCartSummary();
    }
    
    showToast('Produk dihapus dari keranjang');
}

// Add to cart from recommendation
function addToCartFromRecommendation(productId) {
    showToast('Produk ditambahkan ke keranjang');
    
    // In real app, this would make an AJAX call
    // For demo, just show success message
    setTimeout(() => {
        if (confirm('Produk berhasil ditambahkan ke keranjang. Lihat keranjang?')) {
            location.reload();
        }
    }, 1000);
}

// Checkout
function checkout() {
    const selectedItems = getSelectedItems();
    if (selectedItems.length === 0) {
        showToast('Pilih minimal 1 produk untuk checkout', 'warning');
        return;
    }
    
    // In real app, redirect to checkout page
    showToast(`Checkout ${selectedItems.length} produk`, 'success');
    
    // Simulate checkout process
    setTimeout(() => {
        alert('Redirect ke halaman checkout...');
    }, 1500);
}

// Helper Functions
function updateItemSelection(itemId, shopId, isSelected) {
    const item = findCartItem(itemId);
    if (item) {
        item.selected = isSelected;
    }
}

function updateShopCheckbox(shopId) {
    const shop = cartData.cart.find(s => s.shop_id === shopId);
    if (!shop) return;
    
    const shopCheckbox = document.getElementById(`shop-${shopId}`);
    const allSelected = shop.items.every(item => item.selected);
    const noneSelected = shop.items.every(item => !item.selected);
    
    if (allSelected) {
        shopCheckbox.checked = true;
        shopCheckbox.indeterminate = false;
    } else if (noneSelected) {
        shopCheckbox.checked = false;
        shopCheckbox.indeterminate = false;
    } else {
        shopCheckbox.indeterminate = true;
    }
}

function updateCartSummary() {
    let totalItems = 0;
    let totalPrice = 0;
    
    cartData.cart.forEach(shop => {
        shop.items.forEach(item => {
            if (item.selected) {
                totalItems += item.quantity;
                totalPrice += item.price * item.quantity;
            }
        });
    });
    
    const finalPrice = totalPrice + 15000; // Plus shipping
    
    // Update UI
    document.getElementById('totalItems').textContent = totalItems;
    document.getElementById('totalPrice').textContent = 'Rp ' + formatNumber(finalPrice);
    document.getElementById('checkoutCount').textContent = totalItems;
    
    // Update checkout button
    const checkoutBtn = document.getElementById('checkoutBtn');
    checkoutBtn.disabled = totalItems === 0;
}

function findCartItem(itemId) {
    for (let shop of cartData.cart) {
        for (let item of shop.items) {
            if (item.id === itemId) {
                return item;
            }
        }
    }
    return null;
}

function getSelectedItems() {
    const selectedItems = [];
    cartData.cart.forEach(shop => {
        shop.items.forEach(item => {
            if (item.selected) {
                selectedItems.push(item);
            }
        });
    });
    return selectedItems;
}

function isCartEmpty() {
    return cartData.cart.length === 0 || 
           cartData.cart.every(shop => shop.items.length === 0);
}

function formatNumber(num) {
    return new Intl.NumberFormat('id-ID').format(num);
}

// Toast notification
function showToast(message, type = 'info') {
    // Remove existing toasts
    document.querySelectorAll('.toast-notification').forEach(toast => toast.remove());
    
    const toast = document.createElement('div');
    toast.className = `toast-notification alert alert-${type === 'info' ? 'primary' : type} alert-dismissible`;
    toast.style.cssText = `
        position: fixed;
        top: 80px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;
        min-width: 250px;
        text-align: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    `;
    
    toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
    `;
    
    document.body.appendChild(toast);
    
    // Fade in
    setTimeout(() => toast.style.opacity = '1', 100);
    
    // Auto remove
    setTimeout(() => {
        if (toast.parentElement) {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }
    }, 3000);
}

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    // Update initial summary
    updateCartSummary();
    
    // Update select all checkbox
    updateSelectAllCheckbox();
    
    // Initialize shop checkboxes
    cartData.cart.forEach(shop => {
        updateShopCheckbox(shop.shop_id);
    });
});

function updateSelectAllCheckbox() {
    const selectAllCheckbox = document.getElementById('selectAll');
    if (!selectAllCheckbox) return;
    
    const allItems = [];
    cartData.cart.forEach(shop => {
        shop.items.forEach(item => allItems.push(item));
    });
    
    if (allItems.length === 0) return;
    
    const allSelected = allItems.every(item => item.selected);
    const noneSelected = allItems.every(item => !item.selected);
    
    if (allSelected) {
        selectAllCheckbox.checked = true;
        selectAllCheckbox.indeterminate = false;
    } else if (noneSelected) {
        selectAllCheckbox.checked = false;
        selectAllCheckbox.indeterminate = false;
    } else {
        selectAllCheckbox.indeterminate = true;
    }
}

// Edit mode functionality
let editMode = false;
document.getElementById('editCartBtn').addEventListener('click', function() {
    editMode = !editMode;
    toggleEditMode(editMode);
});

function toggleEditMode(isEdit) {
    const editBtn = document.getElementById('editCartBtn');
    const deleteButtons = document.querySelectorAll('.delete-btn');
    
    if (isEdit) {
        editBtn.innerHTML = '<i class="fas fa-check"></i>';
        deleteButtons.forEach(btn => btn.style.display = 'block');
        showToast('Mode edit aktif');
    } else {
        editBtn.innerHTML = '<i class="fas fa-edit"></i>';
        deleteButtons.forEach(btn => btn.style.display = 'none');
        showToast('Mode edit nonaktif');
    }
}

// Initialize edit mode (hide delete buttons initially)
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(btn => btn.style.display = 'none');
});

// Add keyboard shortcuts
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === 'a') {
        e.preventDefault();
        const selectAllCheckbox = document.getElementById('selectAll');
        if (selectAllCheckbox) {
            selectAllCheckbox.click();
        }
    }
    
    if (e.key === 'Delete' && editMode) {
        const selectedItems = getSelectedItems();
        if (selectedItems.length > 0 && confirm(`Hapus ${selectedItems.length} produk yang dipilih?`)) {
            selectedItems.forEach(item => removeItem(item.id));
        }
    }
});

// Smooth scroll to top when back button is clicked
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Handle quantity input validation
document.addEventListener('input', function(e) {
    if (e.target.classList.contains('quantity-input')) {
        const value = parseInt(e.target.value);
        const min = parseInt(e.target.min);
        const max = parseInt(e.target.max);
        
        if (value < min) {
            e.target.value = min;
        } else if (value > max) {
            e.target.value = max;
            showToast('Quantity melebihi stok yang tersedia', 'warning');
        }
    }
});

// Lazy loading for recommendation images
if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src || img.src;
                img.classList.remove('lazy');
                observer.unobserve(img);
            }
        });
    });
    
    document.querySelectorAll('.recommendation-image').forEach(img => {
        imageObserver.observe(img);
    });
}

// Handle offline/online status
window.addEventListener('online', () => {
    showToast('Koneksi internet tersambung kembali', 'success');
});

window.addEventListener('offline', () => {
    showToast('Tidak ada koneksi internet', 'warning');
});

// Performance optimization: Debounce quantity updates
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Debounced quantity update for better performance
const debouncedQuantityUpdate = debounce(updateCartSummary, 300);

// Override original updateQuantity to use debounced version
const originalUpdateQuantity = updateQuantity;
updateQuantity = function(itemId, change) {
    originalUpdateQuantity(itemId, change);
    debouncedQuantityUpdate();
};
// keranjang end