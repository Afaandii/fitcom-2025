<?php
class Home extends Controller
{
  public function index()
  {
    $list_products = [
      1 => ["name" => "Beras", "price" => "Rp 112.000", "image" => BASEURL . "/img/beras.png"],
      2 => ["name" => "Biji Kopi", "price" => "Rp 85.000", "image" => BASEURL . "/img/kopi.png"],
      3 => ["name" => "Melon", "price" => "Rp 10.000", "image" => BASEURL . "/img/melon.png"],
      4 => ["name" => "Jagung", "price" => "Rp 5.500", "image" => BASEURL . "/img/jagung.png"],
      5 => ["name" => "Cabai Rawit", "price" => "Rp 43.000", "image" => BASEURL . "/img/lombok.png"],
      6 => ["name" => "Timun", "price" => "Rp 7.000", "image" => BASEURL . "/img/timun.png"],
      7 => ["name" => "Sawi", "price" => "Rp 10.000", "image" => BASEURL . "/img/sawi.png"],
      8 => ["name" => "Worter", "price" => "Rp 5.000", "image" => BASEURL . "/img/wortel.png"],
    ];

    $search_query = isset($_GET['search']) ? trim($_GET['search']) : '';

    $this->view('component/navigasi');
    $this->view('home/home', [
      'products' => $list_products,
      'search_query' => $search_query
    ]);
    $this->view('component/footer');
  }
}
