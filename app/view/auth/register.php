<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Amoerfarm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="<?= BASEURL ?>/img/amoer-logo-pure.png" type="image/png">
    <style>
        body {
            background-image: url('<?= BASEURL ?>/img/bg-auth.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            /* Overlay with green color and 50% opacity */
            z-index: 0;
        }

        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
            position: relative;
            z-index: 1;
        }
        .register-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 2;
        }
        .register-header {
            background: #667eea;
            color: white;
            padding: 25px;
            text-align: center;
        }
        .register-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
        }
        .register-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
        }
        .register-body {
            padding: 35px;
        }
        .form-floating label {
            color: #666;
        }
        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label {
            color: #42B883;
        }
        .form-control:focus {
            border-color: #42B883;
            box-shadow: 0 0 0 0.2rem rgba(66, 184, 131, 0.25);
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        .login-link a {
            color: #42B883;
            text-decoration: none;
            font-weight: 600;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        .alert {
            border-radius: 8px;
            font-size: 14px;
        }
        .password-requirements {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="register-card">
                        <div class="register-header">
                            <h1><i class="fas fa-shopping-bag me-2"></i>Amoerfarm Register</h1>
                        </div>
                        <div class="register-body">
                            <h4 class="mb-4 text-center">Daftar Akun Baru</h4>
                            
                            <?php if (!empty($error)): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-circle me-2"></i><?= htmlspecialchars($error) ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($success)): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i><?= htmlspecialchars($success) ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            <?php endif; ?>
                            
                            <form method="POST" action="<?= BASEURL ?>/auth/processRegister" id="registerForm">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                                    <label for="name"><i class="fas fa-user me-2"></i>Nama Lengkap</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nomor HP" required>
                                    <label for="phone"><i class="fas fa-phone me-2"></i>Nomor HP</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    <label for="email"><i class="fas fa-envelope me-2"></i>Email</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" required minlength="8">
                                    <label for="password"><i class="fas fa-lock me-2"></i>Kata Sandi</label>
                                    <div class="password-requirements">
                                        Minimal 8 karakter dengan kombinasi huruf dan angka
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                                </button>
                            </form>
                            
                            <div class="login-link">
                                <p class="mb-0">Sudah punya akun? <a href="<?= BASEURL ?>/auth">Masuk di sini</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const phone = document.getElementById('phone').value;
            
            // Password validation
            if (password.length < 8) {
                e.preventDefault();
                alert('Kata sandi minimal 8 karakter');
                return false;
            }
            
            // Phone validation (basic Indonesian phone number format)
            const phonePattern = /^(\+62|62|0)[0-9]{9,12}$/;
            if (!phonePattern.test(phone.replace(/\s+/g, ''))) {
                e.preventDefault();
                alert('Format nomor HP tidak valid');
                return false;
            }
        });
        
        // Format phone number input
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.startsWith('62')) {
                value = '+' + value;
            } else if (value.startsWith('0')) {
                value = value;
            }
            e.target.value = value;
        });
    </script>
</body>
</html>