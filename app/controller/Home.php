<?php
class Home extends Controller
{
  public function index()
  {
    $this->view('component/navigasi');
    $this->view('home/home');
    $this->view('component/footer');
  }
}
