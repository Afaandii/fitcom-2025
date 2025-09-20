<?php
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Amoerfarm</title>
    <!-- bs css -->
    <link rel="stylesheet" href="<?= BASEURL; ?>css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" href="<?= BASEURL ?>/img/amoer-logo-pure.png" type="image/png">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css">
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
    </style>
</head>

<body>
    <div class="register-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="register-card">
                        <div class="register-header">
                            <h1><i class="fas fa-user me-2"></i>Amoerfarm Register</h1>
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
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi"
                                        required minlength="8">
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

    <!-- bs -->
    <script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASEURL; ?>/js/jquery-3.7.1.js"></script>
    <script src="<?= BASEURL; ?>/js/script.js"></script>
</body>

</html>