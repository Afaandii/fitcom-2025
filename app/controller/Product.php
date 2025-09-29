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
    $products = [
      1 => [
        "kode" => "PRD001",
        "name" => "Beras",
        "satuan" => "Kg",
        "price" => "112.000",
        "rating" => "4.5",
        "review_count" => "19",
        "sold" => "23",
        "stock" => "43",
        "description" => "Beras 5 kg merk sania",
        "features" => [
          "Beras pulen",
          "Harga terjangkau",
          "Aroma wangi"
        ],
        "image" => [
          BASEURL . "/img/beras.png",
          BASEURL . "/img/beras2.png"
        ]
      ],
      2 => [
        "kode" => "PRD002",
        "name" => "Biji Kopi 250 gram",
        "satuan" => "Gram",
        "price" => "85.000",
        "rating" => "4.0",
        "review_count" => "15",
        "sold" => "30",
        "stock" => "50",
        "description" => "Biji Kopi Arabika 250 gram",
        "features" => [
          "Aroma kopi asli",
          "Rasa kopi kuat",
          "Mudah diseduh",
          "Cocok untuk espresso",
          "Kopi organik"
        ],
        "image" => [
          BASEURL . "/img/kopi.png",
          BASEURL . "/img/kopi2.png"
        ]
      ],
      3 => [
        "kode" => "PRD003",
        "name" => "Melon",
        "satuan" => "Biji",
        "price" => "10.000",
        "rating" => "4.2",
        "review_count" => "25",
        "sold" => "40",
        "stock" => "60",
        "description" => "Melon ini berkualitas tinggi",
        "features" => [
          "Rasa manis dan segar",
          "Tekstur lembut",
          "Kulit tipis",
          "Mudah dicerna",
          "Kaya akan vitamin"
        ],
        "image" => [
          BASEURL . "/img/melon.png",
          BASEURL . "/img/melon2.png"
        ]
      ],
      4 => [
        "kode" => "PRD004",
        "name" => "Jagung",
        "satuan" => "kg",
        "price" => "5.500",
        "rating" => "4.8",
        "review_count" => "30",
        "sold" => "50",
        "stock" => "70",
        "description" => "Jagung 1 kilo gram",
        "features" => [
          "jagung segar",
          "Rasa manis alami",
          "Tekstur renyah",
          "Mudah dimasak",
          "Kaya serat"
        ],
        "image" => [
          BASEURL . "/img/jagung.png",
          BASEURL . "/img/jagung2.png"
        ]
      ],
      5 => [
        "kode" => "PRD005",
        "name" => "Cabai Rawit",
        "satuan" => "kg",
        "price" => "43.000",
        "rating" => "4.6",
        "review_count" => "35",
        "sold" => "60",
        "stock" => "80",
        "description" => "Cabai rawit 1 kilo gram",
        "features" => [
          "Pedas alami",
          "Segar dan renyah",
          "Tahan lama",
          "Mudah diolah",
        ],
        "image" => [
          BASEURL . "/img/lombok.png",
          BASEURL . "/img/lombok2.png"
        ]
      ],
      6 => [
        "kode" => "PRD006",
        "name" => "Timun",
        "satuan" => "Biji",
        "price" => "7.000",
        "rating" => "4.7",
        "review_count" => "40",
        "sold" => "70",
        "stock" => "90",
        "description" => "Timun segar dan berkualitas",
        "features" => [
          "Segar dan renyah",
          "Kaya akan air",
          "Rendah kalori",
          "Menyehatkan kulit",
          "Cocok untuk lalapan",
        ],
        "image" => [
          BASEURL . "/img/timun.png",
          BASEURL . "/img/timun2.png"
        ]
      ],
      7 => [
        "kode" => "PRD007",
        "name" => "Sawi",
        "satuan" => "Ikat",
        "price" => "10.000",
        "rating" => "4.9",
        "review_count" => "45",
        "sold" => "80",
        "stock" => "100",
        "description" => "Sawi hijau segar",
        "features" => [
          "Segar dan Hijau",
          "Kaya nutrisi",
          "gizi tinggi",
          "Rasa lezat",
          "Harga kompetitif"
        ],
        "image" => [
          BASEURL . "/img/sawi.png",
          BASEURL . "/img/sawi2.png"
        ]
      ],
      8 => [
        "kode" => "PRD008",
        "name" => "Wortel",
        "satuan" => "Bundle",
        "price" => "5.000",
        "rating" => "5.0",
        "review_count" => "50",
        "sold" => "90",
        "stock" => "110",
        "description" => "Wortel segar dan manis",
        "features" => [
          "Segar dan manis",
          "Kaya vitamin A",
          "Cocok untuk jus",
          "Bahan berkualitas tinggi",
          "Rasa alami",
        ],
        "image" => [
          BASEURL . "/img/wortel.png",
          BASEURL . "/img/wortel2.png"
        ]
      ]
    ];

    $product = $products[$id] ?? null;

    $this->view("component/navigasi");
    $this->view("product/detail", ["product" => $product]);
    $this->view("component/footer");
  }
}