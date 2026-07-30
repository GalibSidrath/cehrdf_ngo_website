<?php
// Start the session at the very beginning of the file
session_start();

// Include your database connection file (Adjust the path if needed)
include '../config/connection.php';

// If the admin is already logged in, redirect them to the dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: dashboard.php"); // Change 'index.php' to your dashboard file name
    exit();
}

$error_message = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize the input to prevent SQL Injection
    $username = mysqli_real_escape_string($con, trim($_POST['username']));
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error_message = "Please enter both username and password.";
    } else {
        // Query to fetch the admin by username
        $query = "SELECT id, username, pass FROM admin WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $admin_data = mysqli_fetch_assoc($result);

            // Verify the entered password against the hashed password in the database
            if (password_verify($password, $admin_data['pass'])) {

                // Password is correct! Set session variables
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $admin_data['id'];
                $_SESSION['admin_username'] = $admin_data['username'];

                // Redirect to the dashboard
                header("Location: dashboard.php"); // Change 'index.php' to your dashboard file name
                exit();

            } else {
                // Password does not match
                $error_message = "Invalid username or password.";
            }
        } else {
            // Username does not exist
            $error_message = "Invalid username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | CEHRDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="admin-login-body">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="admin-login-card mx-auto mt-5">

                    <div class="admin-login-lock text-center mb-3">
                        <i class="fas fa-lock fa-2x text-primary"></i>
                    </div>

                    <div class="admin-login-logo text-center mb-4">
                        <h2>CEHRDF.</h2>
                        <p class="text-muted">Admin Panel Login</p>
                    </div>

                    <?php if (!empty($error_message)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i> <?php echo $error_message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="" novalidate>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control admin-login-input" id="username" name="username"
                                placeholder="Username" required autocomplete="username">
                            <label for="username" class="admin-login-label">
                                <i class="fas fa-user me-1 text-muted"></i> Username
                            </label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control admin-login-input" id="password" name="password"
                                placeholder="Password" required autocomplete="current-password">
                            <label for="password" class="admin-login-label">
                                <i class="fas fa-key me-1 text-muted"></i> Password
                            </label>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg admin-login-btn">
                                <i class="fas fa-sign-in-alt me-2"></i> Login
                            </button>
                        </div>

                    </form>

                    <div class="admin-login-footer text-center mt-4">
                        <p class="mb-1 text-muted">&copy; 2026 CEHRDF. All Rights Reserved.</p>
                        <small class="text-muted">Authorized personnel only</small>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>