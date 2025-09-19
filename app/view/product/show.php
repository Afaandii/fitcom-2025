<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Zoom Feature</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .zoom-container {
            position: relative;
            display: inline-block;
            overflow: hidden;
            cursor: zoom-in;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .zoom-image {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
            display: block;
        }

        .zoom-lens {
            position: absolute;
            border: 2px solid #007bff;
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.2);
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.2s ease;
            backdrop-filter: blur(1px);
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
        }

        .zoom-result {
            position: absolute;
            right: -330px;
            top: 0;
            width: 320px;
            height: 320px;
            border: 2px solid #dee2e6;
            background-size: 800px 800px;
            background-repeat: no-repeat;
            opacity: 0;
            z-index: 1000;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
            transition: opacity 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .zoom-result::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: linear-gradient(45deg, rgba(0,123,255,0.1), rgba(0,123,255,0.05));
            border-radius: 20px;
            z-index: -1;
        }

        /* Alternative zoom styles */
        .zoom-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .zoom-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .zoom-overlay img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            border-radius: 10px;
            box-shadow: 0 10px 50px rgba(0,0,0,0.5);
        }

        .close-zoom {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 30px;
            cursor: pointer;
            z-index: 2001;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            backdrop-filter: blur(10px);
        }

        .zoom-instructions {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            background: rgba(0,0,0,0.5);
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 14px;
        }

        /* Thumbnail container */
        .thumbnail-container {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 2px solid transparent;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            opacity: 0.7;
        }

        .thumbnail:hover,
        .thumbnail.active {
            border-color: #007bff;
            opacity: 1;
            transform: scale(1.05);
        }

        .product-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        }

        .zoom-type-selector {
            margin-bottom: 20px;
        }

        .zoom-type-btn {
            margin-right: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body class="bg-light py-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="product-card">
                <h2 class="text-center mb-4">Image Zoom Feature Demo</h2>
                
                <!-- Zoom Type Selector -->
                <div class="zoom-type-selector text-center">
                    <h5>Pilih Tipe Zoom:</h5>
                    <button class="btn btn-outline-primary zoom-type-btn" onclick="setZoomType('lens')">Lens Zoom</button>
                    <button class="btn btn-outline-primary zoom-type-btn" onclick="setZoomType('overlay')">Overlay Zoom</button>
                    <button class="btn btn-primary zoom-type-btn" onclick="setZoomType('magnifier')">Magnifier Zoom</button>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <!-- Main Image Container -->
                        <div class="zoom-container" id="zoomContainer">
                            <img src="https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                                 alt="AirPods Pro" 
                                 class="zoom-image" 
                                 id="mainImage"
                                 crossorigin="anonymous">
                            <div class="zoom-lens" id="zoomLens"></div>
                            <div class="zoom-result" id="zoomResult"></div>
                        </div>

                        <!-- Thumbnails -->
                        <div class="thumbnail-container">
                            <img src="https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                 class="thumbnail active" 
                                 onclick="changeImage(this, 'https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"
                                 crossorigin="anonymous">
                            <img src="https://images.unsplash.com/photo-1606220945770-b5b6c2c55bf1?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                 class="thumbnail" 
                                 onclick="changeImage(this, 'https://images.unsplash.com/photo-1606220945770-b5b6c2c55bf1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"
                                 crossorigin="anonymous">
                            <img src="https://images.unsplash.com/photo-1588423771073-b8903fbb85b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                 class="thumbnail" 
                                 onclick="changeImage(this, 'https://images.unsplash.com/photo-1588423771073-b8903fbb85b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"
                                 crossorigin="anonymous">
                            <img src="https://images.unsplash.com/photo-1600294037681-c80b4cb5b434?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                 class="thumbnail" 
                                 onclick="changeImage(this, 'https://images.unsplash.com/photo-1600294037681-c80b4cb5b434?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"
                                 crossorigin="anonymous">
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center">
                        <div>
                            <h3>Fitur Zoom yang Tersedia:</h3>
                            <div class="mb-3">
                                <h5 class="text-primary">1. Lens Zoom</h5>
                                <p>Hover mouse pada gambar untuk melihat area zoom dengan lens circular. Hasil zoom ditampilkan di sebelah kanan.</p>
                            </div>
                            
                            <div class="mb-3">
                                <h5 class="text-primary">2. Overlay Zoom</h5>
                                <p>Klik gambar untuk membuka overlay full-screen dengan gambar beresolusi tinggi.</p>
                            </div>
                            
                            <div class="mb-3">
                                <h5 class="text-primary">3. Magnifier Zoom</h5>
                                <p>Hover dengan efek magnifier yang mengikuti mouse cursor dengan smooth animation.</p>
                            </div>

                            <div class="alert alert-info">
                                <strong>Tips:</strong> 
                                <ul class="mb-0 mt-2">
                                    <li>Pilih tipe zoom di atas</li>
                                    <li>Hover atau klik pada gambar utama</li>
                                    <li>Gunakan thumbnail untuk berganti gambar</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Zoom Overlay -->
<div class="zoom-overlay" id="zoomOverlay" onclick="closeZoomOverlay()">
    <div class="close-zoom" onclick="closeZoomOverlay()">&times;</div>
    <img src="" alt="Zoomed Image" id="zoomOverlayImage">
    <div class="zoom-instructions">
        Klik di mana saja untuk menutup
    </div>
</div>

<script>
let currentZoomType = 'magnifier';
let zoomContainer = document.getElementById('zoomContainer');
let mainImage = document.getElementById('mainImage');
let zoomLens = document.getElementById('zoomLens');
let zoomResult = document.getElementById('zoomResult');
let zoomOverlay = document.getElementById('zoomOverlay');
let zoomOverlayImage = document.getElementById('zoomOverlayImage');

// Initialize zoom functionality
function initializeZoom() {
    // Remove all existing event listeners
    zoomContainer.replaceWith(zoomContainer.cloneNode(true));
    zoomContainer = document.getElementById('zoomContainer');
    mainImage = document.getElementById('mainImage');
    zoomLens = document.getElementById('zoomLens');
    zoomResult = document.getElementById('zoomResult');

    // Reset styles
    zoomLens.style.opacity = '0';
    zoomResult.style.opacity = '0';
    zoomContainer.style.cursor = 'zoom-in';

    switch(currentZoomType) {
        case 'lens':
            initializeLensZoom();
            break;
        case 'overlay':
            initializeOverlayZoom();
            break;
        case 'magnifier':
            initializeMagnifierZoom();
            break;
    }
}

// Lens Zoom Implementation
function initializeLensZoom() {
    zoomContainer.addEventListener('mousemove', handleLensZoom);
    zoomContainer.addEventListener('mouseleave', hideLensZoom);
}

function handleLensZoom(e) {
    const rect = zoomContainer.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    
    // Position zoom lens
    zoomLens.style.left = (x - 60) + 'px';
    zoomLens.style.top = (y - 60) + 'px';
    zoomLens.style.opacity = '1';
    
    // Show zoom result
    zoomResult.style.opacity = '1';
    
    // Calculate background position for zoom result
    const fx = (x / rect.width) * 100;
    const fy = (y / rect.height) * 100;
    
    zoomResult.style.backgroundImage = `url(${mainImage.src})`;
    zoomResult.style.backgroundPosition = `${fx}% ${fy}%`;
}

function hideLensZoom() {
    zoomLens.style.opacity = '0';
    zoomResult.style.opacity = '0';
}

// Overlay Zoom Implementation
function initializeOverlayZoom() {
    zoomContainer.addEventListener('click', showZoomOverlay);
}

function showZoomOverlay() {
    zoomOverlayImage.src = mainImage.src.replace('w=500', 'w=1200').replace('q=80', 'q=100');
    zoomOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeZoomOverlay() {
    zoomOverlay.classList.remove('active');
    document.body.style.overflow = '';
}

// Magnifier Zoom Implementation
function initializeMagnifierZoom() {
    zoomContainer.addEventListener('mousemove', handleMagnifierZoom);
    zoomContainer.addEventListener('mouseleave', hideMagnifierZoom);
}

function handleMagnifierZoom(e) {
    const rect = zoomContainer.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    
    // Create magnifier effect
    const magnifierSize = 150;
    const zoomLevel = 2.5;
    
    // Position and show lens
    zoomLens.style.width = magnifierSize + 'px';
    zoomLens.style.height = magnifierSize + 'px';
    zoomLens.style.left = (x - magnifierSize/2) + 'px';
    zoomLens.style.top = (y - magnifierSize/2) + 'px';
    zoomLens.style.opacity = '1';
    zoomLens.style.borderRadius = '50%';
    
    // Calculate the zoomed background position
    const bgX = -((x * zoomLevel) - magnifierSize/2);
    const bgY = -((y * zoomLevel) - magnifierSize/2);
    
    // Apply magnified background to lens
    zoomLens.style.backgroundImage = `url(${mainImage.src})`;
    zoomLens.style.backgroundSize = `${rect.width * zoomLevel}px ${rect.height * zoomLevel}px`;
    zoomLens.style.backgroundPosition = `${bgX}px ${bgY}px`;
    zoomLens.style.backgroundRepeat = 'no-repeat';
}

function hideMagnifierZoom() {
    zoomLens.style.opacity = '0';
    zoomLens.style.backgroundImage = 'none';
}

// Set zoom type
function setZoomType(type) {
    currentZoomType = type;
    
    // Update button states
    document.querySelectorAll('.zoom-type-btn').forEach(btn => {
        btn.classList.remove('btn-primary');
        btn.classList.add('btn-outline-primary');
    });
    
    event.target.classList.remove('btn-outline-primary');
    event.target.classList.add('btn-primary');
    
    // Reinitialize zoom
    initializeZoom();
}

// Change main image
function changeImage(thumbnail, newSrc) {
    // Update main image
    mainImage.src = newSrc;
    
    // Update active thumbnail
    document.querySelectorAll('.thumbnail').forEach(thumb => {
        thumb.classList.remove('active');
    });
    thumbnail.classList.add('active');
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    initializeZoom();
    
    // Handle escape key for overlay
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeZoomOverlay();
        }
    });
});

// Prevent zoom overlay from closing when clicking the image
document.getElementById('zoomOverlayImage').addEventListener('click', function(e) {
    e.stopPropagation();
});
</script>

</body>
</html>