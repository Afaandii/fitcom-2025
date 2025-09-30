<?php
class Cart extends Controller
{
  private $cartItems = [];
  private $recommendations = [];

  public function __construct()
  {
    $this->cartItems = [
      [
        'shop_id' => 1,
        'items' => [
          [
            'id' => 1,
            'name' => 'Anggur',
            'image' => BASEURL . '/img/anggur.png',
            'price' => '100000',
            'quantity' => 1,
            'stock' => 25,
            'weight' => 221,
            'selected' => true
          ]
        ]
      ],
      [
        'shop_id' => 2,
        'items' => [
          [
            'id' => 3,
            'name' => 'Pacul',
            'image' => BASEURL . '/img/pacul.png',
            'price' => '200000',
            'quantity' => 1,
            'stock' => 15,
            'weight' => 300,
            'selected' => false
          ]
        ]
      ],
      [
        'shop_id' => 3,
        'items' => [
          [
            'id' => 4,
            'name' => 'Sayur',
            'image' => BASEURL . '/img/sayur.png',
            'price' => '300000',
            'quantity' => 1,
            'stock' => 15,
            'weight' => 300,
            'selected' => false
          ]
        ]
      ]
    ];


    $this->recommendations = [
      1 => ["id" => 1, "name" => "Beras", "price" => "112.000", "image" => BASEURL . "/img/beras.png"],
      2 => ["id" => 2, "name" => "Biji Kopi", "price" => "85.000", "image" => BASEURL . "/img/kopi.png"],
      3 => ["id" => 3, "name" => "Melon", "price" => "10.000", "image" => BASEURL . "/img/melon.png"],
      4 => ["id" => 4, "name" => "Jagung", "price" => "5.500", "image" => BASEURL . "/img/jagung.png"],
      5 => ["id" => 5, "name" => "Cabai Rawit", "price" => "43.000", "image" => BASEURL . "/img/lombok.png"],
      6 => ["id" => 6, "name" => "Timun", "price" => "7.000", "image" => BASEURL . "/img/timun.png"],
      7 => ["id" => 7, "name" => "Sawi", "price" => "10.000", "image" => BASEURL . "/img/sawi.png"],
      8 => ["id" => 8, "name" => "Wortel", "price" => "5.000", "image" => BASEURL . "/img/wortel.png"],
    ];
  }

  public function isCartEmpty($cart)
  {
    if (empty($cart)) {
      return true;
    }
    foreach ($cart as $shop) {
      if (!empty($shop['items'])) {
        return false;
      }
    }
    return true;
  }


  public function index()
  {
    $cart = $this->cartItems;
    $isEmpty = $this->isCartEmpty($cart);
    $this->view('component/navigasi');
    $this->view('cart/cart', [
      'dataCart' => [
        'cart' => $cart,
        'recommendations' => $this->recommendations,
        'summary' => $this->calculateSummary(),
        'is_empty' => $isEmpty
      ]
    ]);

    $this->view('component/footer');
  }

  private function calculateSummary()
  {
    $totalItems = 0;
    $totalPrice = 0;

    foreach ($this->cartItems as $shop) {
      foreach ($shop['items'] as $item) {
        if ($item['selected']) {
          $totalItems += $item['quantity'];
          $totalPrice += $item['price'] * $item['quantity'];
        }
      }
    }

    return [
      'total_items' => $totalItems,
      'total_price' => $totalPrice,
      'final_price' => $totalPrice
    ];
  }
}
