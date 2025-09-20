<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Amoerfarm</title>
    <!-- bs css -->
    <link rel="stylesheet" href="<?= BASEURL; ?>css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" href="<?= BASEURL ?>/img/amoer-logo-pure.png" type="image/png">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css">
    <style>
        body {
            background-image: url('http://localhost/fitcom-2025/public/img/bg-auth.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
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
    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-card">
                        <div class="login-header">
                            <h1><i class="fas fa-user me-2"></i>Amoerfarm Login</h1>
                        </div>
                        <div class="login-body">
                            <h4 class="mb-4 text-center">Masuk ke Akun</h4>

                            <?php if (!empty($error)): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-circle me-2"></i><?= htmlspecialchars($error) ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i><?= htmlspecialchars($_SESSION['success']) ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                                <?php unset($_SESSION['success']); ?>
                            <?php endif; ?>

                            <form method="POST" action="<?= BASEURL ?>/auth/processLogin">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="phone_or_email" name="phone_or_email"
                                        placeholder="Email atau No. HP" required>
                                    <label for="phone_or_email"><i class="fas fa-envelope me-2"></i>Email atau No. HP</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi"
                                        required>
                                    <label for="password"><i class="fas fa-lock me-2"></i>Kata Sandi</label>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember">
                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-sign-in-alt me-2"></i>Masuk
                                </button>
                            </form>

                            <div class="register-link">
                                <p class="mb-0">Belum punya akun? <a href="<?= BASEURL ?>/auth/register">Daftar di sini</a></p>
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