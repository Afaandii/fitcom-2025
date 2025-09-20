<?php
// controllers/AuthController.php - Sesuaikan dengan struktur MVC existing Anda
class Auth extends Controller {
    
    private $user;
    
    public function __construct() {
        $this->user = $this->model('user');
    }
    
    // Halaman login
    public function index() {
        $data = [
            'title' => 'Login - Tokopedia',
            'error' => $_SESSION['error'] ?? '',
            'success' => $_SESSION['success'] ?? ''
        ];
        
        // Hapus pesan setelah ditampilkan
        unset($_SESSION['error'], $_SESSION['success']);
        
        $this->view('auth/login', $data);
    }
    
    // Halaman register
    public function register() {
        $data = [
            'title' => 'Register - Tokopedia',
            'error' => $_SESSION['error'] ?? '',
            'success' => $_SESSION['success'] ?? ''
        ];
        
        // Hapus pesan setelah ditampilkan
        unset($_SESSION['error'], $_SESSION['success']);
        
        $this->view('auth/register', $data);
    }
    
    // Proses login
    public function processLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $phoneOrEmail = trim($_POST['phone_or_email'] ?? '');
            $password = $_POST['password'] ?? '';
            
            if (empty($phoneOrEmail) || empty($password)) {
                $_SESSION['error'] = 'Email/No. HP dan kata sandi harus diisi';
                header('Location: ' . BASEURL . '/auth');
                exit();
            }
            
            $user = $this->user->authenticate($phoneOrEmail, $password);
            
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['is_logged_in'] = true;
                
                // Redirect ke dashboard atau halaman yang diinginkan
                $redirect = $_GET['redirect'] ?? 'dashboard';
                header('Location: ' . BASEURL . '/' . $redirect);
                exit();
            } else {
                $_SESSION['error'] = 'Email/No. HP atau kata sandi salah';
                header('Location: ' . BASEURL . '/auth');
                exit();
            }
        }
    }
    
    // Proses register
    public function processRegister() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            
            if (empty($name) || empty($phone) || empty($email) || empty($password)) {
                $_SESSION['error'] = 'Semua field harus diisi';
                header('Location: ' . BASEURL . '/auth/register');
                exit();
            }
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'Format email tidak valid';
                header('Location: ' . BASEURL . '/auth/register');
                exit();
            }
            
            if (strlen($password) < 8) {
                $_SESSION['error'] = 'Kata sandi minimal 8 karakter';
                header('Location: ' . BASEURL . '/auth/register');
                exit();
            }
            
            if ($this->user->emailExists($email)) {
                $_SESSION['error'] = 'Email sudah terdaftar';
                header('Location: ' . BASEURL . '/auth/register');
                exit();
            }
            
            $result = $this->user->register($name, $phone, $email, $password);
            
            if ($result) {
                $_SESSION['success'] = 'Pendaftaran berhasil! Silakan login';
                header('Location: ' . BASEURL . '/auth');
                exit();
            } else {
                $_SESSION['error'] = 'Terjadi kesalahan saat mendaftar';
                header('Location: ' . BASEURL . '/auth/register');
                exit();
            }
        }
    }
    
    
    // Logout
    public function logout() {
        session_destroy();
        header('Location: ' . BASEURL . '/auth');
        exit();
    }
}
?>