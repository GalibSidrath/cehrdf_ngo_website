
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | CEHRDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
</head>
<body class="admin-login-body">

<!-- ============================================================
     SECTION: LOGIN CONTAINER
     Bootstrap container for centering
     ============================================================ -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <!-- ============================================================
                 SECTION: LOGIN CARD
                 White card with all login elements
                 ============================================================ -->
            <div class="admin-login-card mx-auto">

                <!-- ============================================================
                     SECTION: LOCK ICON
                     Circular gradient lock icon
                     ============================================================ -->
                <div class="admin-login-lock">
                    <i class="fas fa-lock"></i>
                </div>

                <!-- ============================================================
                     SECTION: LOGO HEADER
                     Organization name and subtitle
                     ============================================================ -->
                <div class="admin-login-logo">
                    <h2>CEHRDF.</h2>
                    <p>Admin Panel Login</p>
                </div>

                <!-- ============================================================
                     SECTION: ERROR ALERT (PHP)
                     Show only when login fails
                     ============================================================ -->
                <!-- PHP ERROR MESSAGE HERE -->

                <!-- ============================================================
                     SECTION: LOGIN FORM
                     POST method form for credentials
                     ============================================================ -->
                <form method="POST" action="" novalidate>

                    <!-- ============================================================
                         SECTION: USERNAME INPUT
                         Floating label input field
                         ============================================================ -->
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control admin-login-input"
                            id="username"
                            name="username"
                            placeholder="Username"
                            required
                            autocomplete="username"
                        >
                        <label for="username" class="admin-login-label">
                            <i class="fas fa-user me-1 text-muted"></i> Username
                        </label>
                    </div>

                    <!-- ============================================================
                         SECTION: PASSWORD INPUT
                         Floating label input field
                         ============================================================ -->
                    <div class="form-floating mb-4">
                        <input
                            type="password"
                            class="form-control admin-login-input"
                            id="password"
                            name="password"
                            placeholder="Password"
                            required
                            autocomplete="current-password"
                        >
                        <label for="password" class="admin-login-label">
                            <i class="fas fa-key me-1 text-muted"></i> Password
                        </label>
                    </div>

                    <!-- ============================================================
                         SECTION: LOGIN BUTTON
                         Submit button
                         ============================================================ -->
                    <div class="d-grid">
                        <button type="submit" class="admin-login-btn">
                            <i class="fas fa-sign-in-alt me-2"></i> Login
                        </button>
                    </div>

                </form>
                <!-- End of Login Form -->

                <!-- ============================================================
                     SECTION: LOGIN FOOTER
                     Copyright text
                     ============================================================ -->
                <div class="admin-login-footer">
                    <p class="mb-1">&copy; 2026 CEHRDF. All Rights Reserved.</p>
                    <small>Authorized personnel only</small>
                </div>

            </div>
            <!-- End of Login Card -->

        </div>
    </div>
</div>
<!-- End of Login Container -->

<!-- ============================================================
     SECTION: BOOTSTRAP 5 JS
     Bootstrap JavaScript bundle
     ============================================================ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>