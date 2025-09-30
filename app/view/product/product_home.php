<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4 mt-5">
      <a href="<?= BASEURL ?>/product/create" class="btn btn-tambah">
        <i class="fas fa-plus me-2"></i>Tambah
      </a>
      <div class="table-container table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">Action</th>
              <th scope="col">Gambar</th>
              <th scope="col">Kode</th>
              <th scope="col">Nama</th>
              <th scope="col">Satuan</th>
              <th scope="col">Harga</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <a href="<?= BASEURL ?>/product/edit" class="btn btn-edit">Edit</a>
              </td>
              <td>
                <div class="product-icon-container">
                  <img src="<?= BASEURL ?>/img/sayur.png" alt="sayur" width="100">
                </div>
              </td>
              <td>
                <span class="product-code">P001</span>
              </td>
              <td>Produk 01</td>
              <td>
                <span class="unit-text">Pcs</span>
              </td>
              <td>
                <span class="price-text">Rp 200.000</span>
              </td>
            </tr>
            <tr>
              <td>
                <button class="btn btn-edit">Edit</button>
              </td>
              <td>
                <div class="product-icon-container">
                  <img src="<?= BASEURL ?>/img/anggur.png" alt="anggur" width="100">
                </div>
              </td>
              <td>
                <span class="product-code">P002</span>
              </td>
              <td>Produk 02</td>
              <td>
                <span class="unit-text">Pcs</span>
              </td>
              <td>
                <span class="price-text">Rp 300.000</span>
              </td>
            </tr>
            <tr>
              <td>
                <button class="btn btn-edit">Edit</button>
              </td>
              <td>
                <div class="product-icon-container">
                  <img src="<?= BASEURL ?>/img/pacul.png" alt="pacul" width="100">
                </div>
              </td>
              <td>
                <span class="product-code">P003</span>
              </td>
              <td>Produk 03</td>
              <td>
                <span class="unit-text">Pcs</span>
              </td>
              <td>
                <span class="price-text">Rp 400.000</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>