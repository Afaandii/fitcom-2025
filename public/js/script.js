// title browser bergerak
document.addEventListener("DOMContentLoaded", function() {
    let text = " 🌱 AmoerFarm - Toko Pertanian Modern ";
    let i = 0;

    function scrollTitle() {
    document.title = text.substring(i) + text.substring(0, i);
    i = (i + 1) % text.length;
    }

    setInterval(scrollTitle, 250); 
});

/* magnifier zoom */
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
/* Magnifier zoom end */