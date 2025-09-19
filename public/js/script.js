// title browser bergerak
document.addEventListener("DOMContentLoaded", function() {
      let text = " 🌱 AmoerFarm - Toko Pertanian Modern ";
      let i = 0;

      function scrollTitle() {
        document.title = text.substring(i) + text.substring(0, i);
        i = (i + 1) % text.length;
      }

      setInterval(scrollTitle, 250); // ganti kecepatan geser (ms)
    });


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

            switch (currentZoomType) {
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