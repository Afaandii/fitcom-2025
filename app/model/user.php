<?php
// models/user.php - Model untuk user management
class user {
    
    private $users = [];
    
    public function __construct() {
        // Simulate database dengan session
        if (!isset($_SESSION['users_db'])) {
            $_SESSION['users_db'] = [
                [
                    'id' => 1,
                    'name' => 'Admin User',
                    'phone' => '081234567890',
                    'email' => 'admin@tokopedia.com',
                    'password' => password_hash('admin123', PASSWORD_DEFAULT),
                    'created_at' => date('Y-m-d H:i:s')
                ]
            ];
        }
        $this->users = $_SESSION['users_db'];
    }
    
    public function authenticate($phoneOrEmail, $password) {
        foreach ($this->users as $user) {
            if (($user['email'] === $phoneOrEmail || $user['phone'] === $phoneOrEmail) 
                && password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
    
    public function register($name, $phone, $email, $password) {
        $newUser = [
            'id' => count($this->users) + 1,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        $this->users[] = $newUser;
        $_SESSION['users_db'] = $this->users;
        
        return true;
    }
    
    public function emailExists($email) {
        foreach ($this->users as $user) {
            if ($user['email'] === $email) {
                return true;
            }
        }
        return false;
    }
    
    public function phoneExists($phone) {
        foreach ($this->users as $user) {
            if ($user['phone'] === $phone) {
                return true;
            }
        }
        return false;
    }
    
    public function getUserById($id) {
        foreach ($this->users as $user) {
            if ($user['id'] == $id) {
                return $user;
            }
        }
        return false;
    }
    
    public function getAllUsers() {
        return $this->users;
    }
}
?>