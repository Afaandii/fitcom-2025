<?php
class App
{
  protected $controller = "Home";
  protected $method = "index";
  protected $params = [];

  public function __construct()
  {
    $url = $this->parseURL();

    if (isset($url[0])) {
      if (file_exists("../app/controller/" . $url[0] . ".php")) {
        $this->controller = $url[0];
        unset($url[0]);
      }
    }

    include_once "../app/controller/" . $this->controller . ".php";
    $this->controller = new $this->controller;

    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    if (!empty($url)) {
      $this->params = array_values($url);
      // var_dump($url);
    }

    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  public function parseURL()
  {
    // digunakan untuk mengecek jika ada url yang dikirimkan maka akan diambil isi urlnya
    if (isset($_GET['url'])) {
      // rtrim() digunakan untuk menghapus / url diakhir
      $url = rtrim($_GET['url'], '/');
      // FILTER_SANITIZE_URL digunakan untuk membersihkan url dari karakter yang aneh.
      $url = filter_var($url, FILTER_SANITIZE_URL);
      // memecah url berdasarkan tanda / dan disimpan didalam array hasilnya, jadi tanda (/) hilang karena dipecah.
      $url = explode('/', $url);
      return $url;
    }
  }
}