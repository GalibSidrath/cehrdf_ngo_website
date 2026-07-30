<?php 
    include '../session_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Admin | CEHRDF Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>

<body>

    <?php include '../dashboard-components/header.php'; ?>
    <?php include '../dashboard-components/sidebar.php'; ?>

    <main class="admin-main">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark mb-0">Add New Admin</h2>
        </div>

        <div class="row">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form method="POST" action="">

                            <div class="mb-3">
                                <label for="username" class="form-label fw-semibold text-secondary">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i
                                            class="fas fa-user"></i></span>
                                    <input type="text" class="form-control bg-light border-start-0 ps-0" id="username"
                                        name="username" placeholder="Enter username" required autocomplete="off">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold text-secondary">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i
                                            class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control bg-light border-start-0 ps-0"
                                        id="password" name="password" placeholder="Enter password" required>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-block">
                                <button type="submit" name="submit" class="btn btn-success px-4 me-2">
                                    <i class="fas fa-save me-2"></i>Submit
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <div class="admin-sidebar-overlay" id="sidebarOverlay"></div>
    <button class="admin-mobile-toggle" id="mobileToggle"><i class="fas fa-bars"></i></button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggle = document.getElementById('mobileToggle');

        toggle.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        });
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
    </script>

</body>

</html>
<?php
// Include the database connection
include '../../config/connection.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {

    // Sanitize input
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert the admin into the database
    $query = "INSERT INTO admin (username, pass) VALUES ('$username', '$hashed_password')";

    if (mysqli_query($con, $query)) {
        echo "<script>
                alert('Admin added successfully!');
                window.location.href='admins.php'; 
              </script>";
    } else {
        echo "<script>
                alert('Error: " . mysqli_error($con) . "');
              </script>";
    }
}
?>