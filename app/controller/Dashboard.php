<?php
class Dashboard extends Controller
{
  public function index()
  {
    $this->view('template/header');
    $this->view('template/sidebar');
    $this->view('dashboard/index');
    $this->view('template/footer');
  }
}
