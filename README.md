# Aplikasi E-Commerce AmoerFarm

## Gambaran Umum
AmoerFarm adalah platform e-commerce sederhana yang dirancang untuk menjual produk pertanian seperti hasil panen segar, benih, pupuk, dan alat pertanian. Aplikasi ini memungkinkan pengguna untuk menjelajahi produk, menambahkan item ke keranjang belanja, mendaftar/masuk, dan mengelola pembelian. Selain itu, terdapat dashboard admin untuk mengelola produk, pengguna, dan pesanan.

Aplikasi ini dikembangkan menggunakan **PHP native** dengan arsitektur **MVC (Model-View-Controller)** untuk organisasi dan pemeliharaan yang lebih baik. Tampilan depan dibuat responsif dengan **Bootstrap 5.3** dan diperkaya dengan **jQuery** untuk interaksi dinamis.

## Fitur
- Pendaftaran dan otentikasi pengguna.
- Penjelajahan dan pencarian produk.
- Fungsi keranjang belanja.
- Dashboard admin untuk operasi CRUD pada produk, pengguna, dan pesanan.
- Antarmuka pengguna (UI) responsif untuk perangkat mobile dan desktop.

## Persyaratan
- PHP 7.4 atau lebih tinggi.
- Basis data MySQL (atau kompatibel).
- XAMPP (atau stack server lokal seperti WAMP/MAMP) untuk pengembangan.
- Peramban web (Chrome, Firefox, dll.).

## Instruksi Instalasi
1. Unduh file zip proyek bernama `webFitcom2025_Feast_SMKAntartika2SDA`.
2. Ekstrak isi file ke dalam direktori `htdocs` XAMPP. Setelah diekstrak.
3. Jalankan XAMPP atau Laragon dan pastikan layanan Apache dan MySQL aktif.
4. Buka peramban web dan navigasikan ke:
   - **Frontend e-commerce**: `http://localhost/fitcom-2025/public`
   - **Dashboard admin**: `http://localhost/fitcom-2025/public/dashboard`

Catatan: Pastikan URL rewriting diaktifkan di Apache (mod_rewrite). Jika tidak, aktifkan di `httpd.conf` dan restart Apache.

## Struktur Folder
Proyek ini mengikuti struktur MVC standar dengan folder tambahan untuk aset dan file publik. Berikut adalah pohon direktori terperinci:

```
fitcom-2025/
├── app/
│   ├── config/
│   │   └── config.php              
│   ├── controller/
│   │   ├── Auth.php               
│   │   ├── Cart.php               
│   │   ├── Dashboard.php          
│   │   ├── Home.php               
│   │   └── Product.php            
│   ├── core/
│   │   ├── app.php                
│   │   ├── controller.php         
│   │   ├── database.php           
│   │   └── flasher.php            
│   ├── model/
│   │   ├── model.php           
│   │   └── user.php        
│   ├── view/
│   │   ├── auth/
│   │   │   ├── login.php         
│   │   │   └── register.php    
│   │   ├── cart/
│   │   │   └── cart.php       
│   │   ├── component/
│   │   │   ├── footer.php      
│   │   │   └── navigasi.php      
│   │   ├── dashboard/
│   │   │   └── index.php       
│   │   ├── home/
│   │   │   └── home.php    
│   │   ├── product/
│   │   │   ├── create_product.php
│   │   │   ├── detail.php
│   │   │   ├── edit_product.php
│   │   │   └── product_home.php
│   │   ├── template/
│   │   │   ├── footer.php
│   │   │   ├── header.php
│   │   │   └── sidebar.php
│   │   ├── .htaccess
│   │   └── init.php
├── public/
│   ├── css/
│   │   ├── bootstrap-grid.css
│   │   ├── bootstrap-grid.css.map
│   │   ├── bootstrap-grid.min.css
│   │   ├── bootstrap-grid.min.css.map
│   │   ├── bootstrap-grid.rtl.css
│   │   ├── bootstrap-grid.rtl.css.map
│   │   ├── bootstrap-grid.rtl.min.css
│   │   ├── bootstrap-grid.rtl.min.css.map
│   │   ├── bootstrap-reboot.css
│   │   ├── bootstrap-reboot.css.map  
│   │   ├── # dan css boostrap lainnya...
│   │   └── style.css
│   ├── img/
│   │   ├── amoer-logo-pure.png    
│   │   ├── AmoerFarm Logo.png
│   │   ├── dan image product lainnya
│   │   └── bg-auth.jpg           
│   ├── js/
│   │   ├── bootstrap.bundle.js
│   │   ├── bootstrap.bundle.js.map
│   │   ├── bootstrap.bundle.min.js
│   │   ├── bootstrap.bundle.min.js.map
│   │   ├── bootstrap.esm.js
│   │   ├── bootstrap.esm.js.map
│   │   ├── bootstrap.esm.min.js
│   │   ├── bootstrap.esm.min.js.map
│   │   ├── bootstrap.js
│   │   ├── bootstrap.js.map
│   │   ├── bootstrap.min.js
│   │   ├── bootstrap.min.js.map
│   │   ├── datatables-simple-demo.js  
│   │   ├── jquery-3.7.1.js     
│   │   └── scripts.js            
│   └── .htaccess
│   └── index.php
└── README.md                         
```

## Catatan Pengembangan
- **Pemecahan MVC**:
  - **Models**: Menangani interaksi basis data (misalnya, `user.php` untuk data pengguna).
  - **Views**: Template PHP untuk merender HTML (misalnya, `login.php`).
  - **Controllers**: Memproses permintaan dan berinteraksi dengan model/views (misalnya, `Auth.php`).
- Semua aset (CSS, JS, gambar) ditempatkan di folder `public` untuk keamanan.
- Bootstrap 5.3 disertakan di `public/css` dan `public/js`.
- jQuery digunakan untuk panggilan AJAX dan manipulasi DOM.

## Pemecahan Masalah
- Pastikan izin folder disetel dengan benar 
- Untuk masalah URL, verifikasi `.htaccess` di folder `public`.

Untuk pertanyaan atau kontribusi, hubungi kami.