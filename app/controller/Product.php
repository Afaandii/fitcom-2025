<?php

class Product extends Controller
{
  public function detail($id)
  {
    $products = [
      1 => ["name" => "Dummy 1", "price" => "Rp 100.000", "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
      2 => ["name" => "Dummy 2", "price" => "Rp 200.000", "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
      3 => ["name" => "Dummy 3", "price" => "Rp 300.000", "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
      4 => ["name" => "Dummy 4", "price" => "Rp 400.000", "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
      5 => ["name" => "Dummy 5", "price" => "Rp 500.000", "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
      6 => ["name" => "Dummy 6", "price" => "Rp 600.000", "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
      7 => ["name" => "Dummy 7", "price" => "Rp 700.000", "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
      8 => ["name" => "Dummy 8", "price" => "Rp 800.000", "image" => "https://images.unsplash.com/photo-1615485020475-ba867eb72d7f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
    ];

    $product = $products[$id] ?? null;

    $this->view('component/navigasi');
    $this->view('product/detail', ["product" => $product]);
    $this->view('component/footer');
  }
}
