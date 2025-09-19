    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="product-card">
                    <h2 class="text-center mb-4">Image Zoom Feature Demo</h2>

                    <!-- Zoom Type Selector -->
                    <div class="zoom-type-selector text-center">
                        <h5>Pilih Tipe Zoom:</h5>
                        <button class="btn btn-outline-primary zoom-type-btn" onclick="setZoomType('lens')">Lens Zoom</button>
                        <button class="btn btn-outline-primary zoom-type-btn" onclick="setZoomType('overlay')">Overlay
                            Zoom</button>
                        <button class="btn btn-primary zoom-type-btn" onclick="setZoomType('magnifier')">Magnifier Zoom</button>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Main Image Container -->
                            <div class="zoom-container" id="zoomContainer">
                                <img
                                    src="https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                                    alt="AirPods Pro" class="zoom-image" id="mainImage" crossorigin="anonymous">
                                <div class="zoom-lens" id="zoomLens"></div>
                                <div class="zoom-result" id="zoomResult"></div>
                            </div>

                            <!-- Thumbnails -->
                            <div class="thumbnail-container">
                                <img
                                    src="https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                    class="thumbnail active"
                                    onclick="changeImage(this, 'https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"
                                    crossorigin="anonymous">
                                <img
                                    src="https://images.unsplash.com/photo-1606220945770-b5b6c2c55bf1?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                    class="thumbnail"
                                    onclick="changeImage(this, 'https://images.unsplash.com/photo-1606220945770-b5b6c2c55bf1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"
                                    crossorigin="anonymous">
                                <img
                                    src="https://images.unsplash.com/photo-1588423771073-b8903fbb85b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                    class="thumbnail"
                                    onclick="changeImage(this, 'https://images.unsplash.com/photo-1588423771073-b8903fbb85b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"
                                    crossorigin="anonymous">
                                <img
                                    src="https://images.unsplash.com/photo-1600294037681-c80b4cb5b434?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
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
                                    <p>Hover mouse pada gambar untuk melihat area zoom dengan lens circular. Hasil zoom ditampilkan di
                                        sebelah kanan.</p>
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