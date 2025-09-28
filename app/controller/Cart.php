<?php
class Cart extends Controller 
{
    private $cartItems = [];
    private $recommendations = [];
    
    public function __construct() {
      $this->cartItems = [
        [
          'shop_id' => 1,
          'items' => [
            [
              'id' => 1,
              'name' => 'dummy 1',
              'image' => 'https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
              'price' => '100.000',
              'original_price' => 24999000,
              'discount' => 12,
              'quantity' => 1,
              'stock' => 25,
              'weight' => 221,
              'selected' => true
            ],
            [
              'id' => 2,
              'name' => 'dummy 2',
              'image' => 'https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
              'price' => '200.000',
              'original_price' => 3999000,
              'discount' => 13,
              'quantity' => 2,
              'stock' => 50,
              'weight' => 50,
              'selected' => true
            ]]
        ],
        [
          'shop_id' => 2,
          'items' => [
            [
              'id' => 3,
              'name' => 'dummy 3',
              'image' => 'https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
              'price' => '300.000',
              'original_price' => 199000,
              'discount' => 25,
              'quantity' => 1,
              'stock' => 15,
              'weight' => 300,
              'selected' => false
            ]]
        ]];
        
      $this->recommendations = [
        1 => ["id" => 1, "name" => "Dummy 1", "price" => "100.000", "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
        2 => ["id" => 2, "name" => "Dummy 2", "price" => "200.000", "discount" => 15, "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
        3 => ["id" => 3, "name" => "Dummy 3", "price" => "300.000", "discount" => 20, "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
        4 => ["id" => 4, "name" => "Dummy 4", "price" => "400.000", "discount" => 25, "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
        5 => ["id" => 5, "name" => "Dummy 5", "price" => "500.000", "discount" => 30, "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
        6 => ["id" => 6, "name" => "Dummy 6", "price" => "600.000", "discount" => 35, "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
        7 => ["id" => 7, "name" => "Dummy 7", "price" => "700.000", "discount" => 40, "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
        8 => ["id" => 8, "name" => "Dummy 8", "price" => "800.000", "discount" => 45, "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
      ];
    }

    public function isCartEmpty($cart) {
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
  
    
    public function index() {
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
    
    private function calculateSummary() {
        $totalItems = 0;
        $totalPrice = 0;
        $totalDiscount = 0;
        
        foreach ($this->cartItems as $shop) {
            foreach ($shop['items'] as $item) {
                if ($item['selected']) {
                    $totalItems += $item['quantity'];
                    $totalPrice += $item['price'] * $item['quantity'];
                    $totalDiscount += ($item['original_price'] - $item['price']) * $item['quantity'];
                }
            }
        }
        
        return [
            'total_items' => $totalItems,
            'total_price' => $totalPrice,
            'total_discount' => $totalDiscount,
            'shipping' => 15000,
            'final_price' => $totalPrice + 15000
        ];
    }
}
