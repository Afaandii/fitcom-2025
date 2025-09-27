<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4 mt-5">
      <div class="form-container">
        <form action="<?= BASEURL ?>/product/store" method="POST" enctype="multipart/form-data">
          <!-- Kode -->
          <div class="form-group">
            <div class="input-group-custom">
              <label class="form-label">Kode</label>
              <input type="text" class="form-input" name="kode" id="kode" placeholder="Masukkan kode produk" required>
            </div>
          </div>

          <!-- Nama -->
          <div class="form-group">
            <div class="input-group-custom">
              <label class="form-label">Nama</label>
              <input type="text" class="form-input" name="nama" id="nama" placeholder="Masukkan nama produk" required>
            </div>
          </div>

          <!-- Satuan -->
          <div class="form-group">
            <div class="input-group-custom">
              <label class="form-label">Satuan</label>
              <input type="text" class="form-input" name="satuan" id="satuan"
                placeholder="Masukkan satuan (Pcs, Kg, dll)" required>
            </div>
          </div>

          <!-- Harga -->
          <div class="form-group">
            <div class="input-group-custom">
              <label class="form-label">Harga</label>
              <input type="number" class="form-input" name="harga" id="harga" placeholder="Masukkan harga produk"
                required>
            </div>
          </div>

          <!-- Gambar -->
          <div class="form-group">
            <div class="input-group-custom">
              <label class="form-label">Gambar</label>
              <input type="file" class="form-input" name="gambar" id="gambar" accept="image/*">
            </div>
          </div>

          <!-- Buttons -->
          <div class="form-buttons">
            <button type="submit" class="btn btn-save">Save</button>
            <button type="button" class="btn btn-cancel"
              onclick="window.location.href='<?= BASEURL ?>/product'">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </main>