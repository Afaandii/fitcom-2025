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
        console.log("Magnifier zoom initialized"); // Debug log
    } else {
        console.log("Elements not found for magnifier zoom"); // Debug log
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
