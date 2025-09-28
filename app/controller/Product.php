<?php
class Product extends Controller
{
  public function index()
  {
    $this->view("template/header");
    $this->view("template/sidebar");
    $this->view("product/product_home");
    $this->view("template/footer");
  }

  public function create()
  {
    $this->view("template/header");
    $this->view("template/sidebar");
    $this->view("product/create_product");
    $this->view("template/footer");
  }

  public function edit()
  {
    $this->view("template/header");
    $this->view("template/sidebar");
    $this->view("product/edit_product");
    $this->view("template/footer");
  }

  public function detail($id)
  {
    return [
      1 => [
        "kode" => "PRD001",
        "name" => "Dummy 1",
        "satuan" => "Pcs",
        "price" => "100.000",
        "rating" => "4.5",
        "review_count" => "19",
        "sold" => "23",
        "original_price" => "128.000",
        "discount" => "18",
        "stock" => "43",
        "description" => "Produk ini uwapik",
        "features" => [
          "Chip A17 Pro dengan performa yang luar biasa",
          "Sistem kamera Pro dengan zoom optik 5x",
          "Layar Super Retina XDR 6.7 inci",
          "Baterai sepanjang hari dengan charging cepat",
          "Material titanium yang kuat dan ringan"
        ],
        "image" => [
          "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop",
          "https://images.unsplash.com/photo-1574860910121-12b0a65a6209?q=80&w=1124&auto=format&fit=crop"
        ]
      ],
      2 => [
        "kode" => "PRD002",
        "name" => "Dummy 2",
        "satuan" => "Kg",
        "price" => "200.000",
        "rating" => "4.0",
        "review_count" => "15",
        "sold" => "30",
        "original_price" => "250.000",
        "discount" => "20",
        "stock" => "50",
        "description" => "Produk ini sangat bagus",
        "features" => [
          "Desain modern dan elegan",
          "Kapasitas baterai besar",
          "Layar Full HD",
          "Kamera berkualitas tinggi",
          "Garansi resmi 1 tahun"
        ],
        "image" => [
          "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop",
          "https://images.unsplash.com/photo-1574860910121-12b0a65a6209?q=80&w=1124&auto=format&fit=crop"
        ]
      ],
      3 => [
        "kode" => "PRD003",
        "name" => "Dummy 3",
        "satuan" => "Liter",
        "price" => "300.000",
        "rating" => "4.2",
        "review_count" => "25",
        "sold" => "40",
        "original_price" => "350.000",
        "discount" => "15",
        "stock" => "60",
        "description" => "Produk ini berkualitas tinggi",
        "features" => [
          "Material premium",
          "Performa cepat dan stabil",
          "Kompatibel dengan berbagai perangkat",
          "Desain ergonomis",
          "Hemat energi"
        ],
        "image" => [
          "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop",
          "https://images.unsplash.com/photo-1574860910121-12b0a65a6209?q=80&w=1124&auto=format&fit=crop"
        ]
      ],
      4 => [
        "kode" => "PRD004",
        "name" => "Dummy 4",
        "satuan" => "Pack",
        "price" => "400.000",
        "rating" => "4.8",
        "review_count" => "30",
        "sold" => "50",
        "original_price" => "450.000",
        "discount" => "10",
        "stock" => "70",
        "description" => "Produk ini sangat direkomendasikan",
        "features" => [
          "Kualitas terbaik di kelasnya",
          "Desain minimalis",
          "Tahan lama",
          "Mudah digunakan",
          "Harga terjangkau"
        ],
        "image" => [
          "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop",
          "https://images.unsplash.com/photo-1574860910121-12b0a65a6209?q=80&w=1124&auto=format&fit=crop"
        ]
      ],
      5 => [
        "kode" => "PRD005",
        "name" => "Dummy 5",
        "satuan" => "Box",
        "price" => "500.000",
        "rating" => "4.6",
        "review_count" => "35",
        "sold" => "60",
        "original_price" => "550.000",
        "discount" => "9",
        "stock" => "80",
        "description" => "Produk ini memiliki fitur lengkap",
        "features" => [
          "Fitur canggih",
          "Desain stylish",
          "Mudah dibersihkan",
          "Bahan ramah lingkungan",
          "Garansi panjang"
        ],
        "image" => [
          "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop",
          "https://images.unsplash.com/photo-1574860910121-12b0a65a6209?q=80&w=1124&auto=format&fit=crop"
        ]
      ],
      6 => [
        "kode" => "PRD006",
        "name" => "Dummy 6",
        "satuan" => "Set",
        "price" => "600.000",
        "rating" => "4.7",
        "review_count" => "40",
        "sold" => "70",
        "original_price" => "650.000",
        "discount" => "8",
        "stock" => "90",
        "description" => "Produk ini sangat populer",
        "features" => [
          "Performa tinggi",
          "Desain kompak",
          "Mudah dibawa",
          "Hemat daya",
          "Cocok untuk semua kalangan"
        ],
        "image" => [
          "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop",
          "https://images.unsplash.com/photo-1574860910121-12b0a65a6209?q=80&w=1124&auto=format&fit=crop"
        ]
      ],
      7 => [
        "kode" => "PRD007",
        "name" => "Dummy 7",
        "satuan" => "Unit",
        "price" => "700.000",
        "rating" => "4.9",
        "review_count" => "45",
        "sold" => "80",
        "original_price" => "750.000",
        "discount" => "7",
        "stock" => "100",
        "description" => "Produk ini terbaik di kelasnya",
        "features" => [
          "Teknologi terbaru",
          "Desain eksklusif",
          "Tahan air",
          "Mudah dirawat",
          "Harga kompetitif"
        ],
        "image" => [
          "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop",
          "https://images.unsplash.com/photo-1574860910121-12b0a65a6209?q=80&w=1124&auto=format&fit=crop"
        ]
      ],
      8 => [
        "kode" => "PRD008",
        "name" => "Dummy 8",
        "satuan" => "Bundle",
        "price" => "800.000",
        "rating" => "5.0",
        "review_count" => "50",
        "sold" => "90",
        "original_price" => "850.000",
        "discount" => "6",
        "stock" => "110",
        "description" => "Produk ini sangat luar biasa",
        "features" => [
          "Kinerja maksimal",
          "Desain futuristik",
          "Bahan berkualitas tinggi",
          "Mudah dioperasikan",
          "Garansi resmi"
        ],
        "image" => [
          "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop",
          "https://images.unsplash.com/photo-1574860910121-12b0a65a6209?q=80&w=1124&auto=format&fit=crop"
        ]
      ]
    ];
  }

  public function index()
  {
    $products = $this->getProducts();

    $this->view("template/header");
    $this->view("template/sidebar");
    $this->view("product/product_home", ["products" => $products]); // kirim semua produk
    $this->view("template/footer");
  }

  public function detail($id)
  {
    $products = $this->getProducts();
    $product = $products[$id] ?? null;

    $this->view('component/navigasi');
    $this->view('product/detail', ["product" => $product]);
    $this->view('component/footer');
  }
}
