<?php
// controllers/AuthController.php - Sesuaikan dengan struktur MVC existing Anda
class Auth extends Controller
{

    private $user;

    public function __construct()
    {
        $this->user = $this->model('user');
    }

    // Halaman login
    public function index()
    {
        $this->view('auth/login');
    }

    // Halaman register
    public function register()
    {
        $this->view('auth/register');
    }   
}
