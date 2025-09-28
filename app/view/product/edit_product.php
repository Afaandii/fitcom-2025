<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4 mt-5">
      <div class="form-edit-container">
        <form action="<?= BASEURL ?>/product/update/" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id">
          <input type="hidden" name="gambar_lama">

          <!-- Kode -->
          <div class="form-edit-group">
            <label class="form-edit-label">Kode</label>
            <input type="text" class="form-edit-input" name="kode" id="kode" placeholder="Masukkan kode produk"
              required>
          </div>

          <!-- Nama -->
          <div class="form-edit-group">
            <label class="form-edit-label">Nama</label>
            <input type="text" class="form-edit-input" name="nama" id="nama" required
              placeholder="Masukkan nama produk">
          </div>

          <!-- Satuan -->
          <div class="form-edit-group">
            <label class="form-edit-label">Satuan</label>
            <input type="text" class="form-edit-input" name="satuan" id="satuan" required
              placeholder="Masukkan satuan (Pcs, Kg, dll)">
          </div>

          <!-- Harga -->
          <div class="form-edit-group">
            <label class="form-edit-label">Harga</label>
            <input type="text" class="form-edit-input" name="harga" id="harga" placeholder="Masukkan harga produk">
          </div>

          <!-- Gambar -->
          <div class="form-edit-group">
            <label class="form-edit-label">Gambar</label>
            <input type="file" class="form-edit-input" name="gambar" id="gambar" accept="image/*">
          </div>

          <!-- Buttons -->
          <div class="form-edit-buttons">
            <button type="submit" class="btn btn-update" name="action" value="update">Update</button>
            <button type="submit" class="btn btn-delete" name="action" value="delete"
              onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Delete</button>
            <button type="button" class="btn btn-cancel-edit"
              onclick="window.location.href='<?= BASEURL ?>/product'">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </main>