
<?php 
    include '../session_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Partner | CEHRDF Admin</title>
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
        <h2 class="fw-bold text-dark mb-0">Add Partner</h2>
        <a href="partners.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Partner Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="e.g. UNICEF Bangladesh" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Partner Logo <span class="text-danger">*</span></label>
                    <input type="file" name="logo" class="form-control" accept="image/*" required>
                    <div class="form-text">Recommended: transparent PNG, max width 300px. Max 2MB.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Agreement Date <span class="text-danger">*</span></label>
                    <input type="date" name="agreement_date" class="form-control" required>
                </div>

                

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" name="save_partner" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>Save Partner
                    </button>
                    <a href="partners.php" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                </div>

            </form>

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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_partner'])) {
    
    // Sanitize the inputs
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $agreement_date = mysqli_real_escape_string($con, $_POST['agreement_date']);

    // Handle File Upload
    $logoName = $_FILES['logo']['name'];
    $logoTmp = $_FILES['logo']['tmp_name'];
    $uploadDir = '../uploads/partners/';

    // Create the directory if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Generate a unique file name to avoid overwriting
    $finalLogoName = time() . '_' . basename($logoName);
    $targetPath = $uploadDir . $finalLogoName;

    // Move the uploaded file to the target directory
    if (move_uploaded_file($logoTmp, $targetPath)) {
        
        // Insert data into the database
        $insertQuery = "INSERT INTO partner (name, logo, agreement_date) 
                        VALUES ('$name', '$finalLogoName', '$agreement_date')";

        if (mysqli_query($con, $insertQuery)) {
            echo "<script>
                    alert('Partner added successfully!');
                    window.location.href='partner.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Database Error: " . mysqli_error($con) . "');
                  </script>";
        }
    } else {
        echo "<script>
                alert('Failed to upload logo.');
              </script>";
    }
}
?>