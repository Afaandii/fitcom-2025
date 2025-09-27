<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4 mt-5">
      <a href="<?= BASEURL ?>/product/create" class="btn btn-tambah">
        <i class="fas fa-plus me-2"></i>Tambah
      </a>
      <div class="table-container">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col" style="width: 15%;">Action</th>
              <th scope="col" style="width: 15%;">Gambar</th>
              <th scope="col" style="width: 15%;">Kode</th>
              <th scope="col" style="width: 25%;">Nama</th>
              <th scope="col" style="width: 15%;">Satuan</th>
              <th scope="col" style="width: 18%;">Harga</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <a href="<?= BASEURL ?>/product/edit" class="btn btn-edit">Edit</a>
              </td>
              <td>
                <div class="product-icon-container">
                  <i class="fas fa-seedling" style="color: #8b5a2b; font-size: 20px;"></i>
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
                  <i class="fas fa-grape-cluster" style="color: #6f42c1; font-size: 20px;"></i>
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
                  <i class="fas fa-broom" style="color: #8b6914; font-size: 20px;"></i>
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