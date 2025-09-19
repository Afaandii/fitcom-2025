<?php

class Product extends Controller
{
  public function index()
  {
    $this->view('component/navigasi');
    $this->view('product/show');
    $this->view('component/footer');
  }
}