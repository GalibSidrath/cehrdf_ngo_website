<?php 
    include '../session_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Training | CEHRDF Admin</title>
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
        <h2 class="fw-bold text-dark mb-0">Add Training</h2>
        <a href="trainings.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Training Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter training title" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="2" placeholder="Brief summary of the training (2-3 lines)"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Duration <span class="text-danger">*</span></label>
                    <input type="text" name="duration" class="form-control" placeholder="e.g. 3 Days, 2 Weeks, 1 Month" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Available Seats <span class="text-danger">*</span></label>
                    <input type="number" name="max_participants" class="form-control" placeholder="e.g. 25" min="1" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Registration Fee <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">BDT</span>
                        <input type="number" name="fee" class="form-control" placeholder="e.g. 500" min="0" value="0" required>
                    </div>
                    <div class="form-text">Enter 0 for free training.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Location <span class="text-danger">*</span></label>
                    <input type="text" name="location" class="form-control" placeholder="e.g. Cox's Bazar Community Center" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Featured Image</label>
                    <input type="file" name="featured_image" class="form-control" accept="image/*">
                    <div class="form-text">Recommended size: 800x500 pixels. Max 2MB.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="">Select Status</option>
                        <option value="upcoming">Upcoming</option>
                        <option value="ongoing">Ongoing</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Description</label>
                    <?php
                    $editorFolder = 'trainings';
                    $editorName = 'description';
                    $editorContent = '<p>Write detailed description about this training program...</p>';
                    include '../editor/editor.php';
                    ?>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" name="save_training" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>Save Training
                    </button>
                    <a href="trainings.php" class="btn btn-outline-secondary">
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
// ==========================================
// BACKEND INSERTION LOGIC (PLACED AT BOTTOM)
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_training'])) {
    
    // Include database connection
    include '../../config/connection.php';

    // Sanitize and collect form data
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $short_des = mysqli_real_escape_string($con, $_POST['short_description']);
    $duration = mysqli_real_escape_string($con, $_POST['duration']);
    $seats = mysqli_real_escape_string($con, $_POST['max_participants']);
    $reg_fee = mysqli_real_escape_string($con, $_POST['fee']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $content = mysqli_real_escape_string($con, $_POST['description']);

    // Handle Image Upload Process
    $img_name = "";
    if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] == 0) {
        $uploadDir = '../uploads/training-feature-img/';
        
        // Generate directory automatically if it is missing
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Add unique prefix using timestamp to prevent duplicate names
        $img_name = time() . '_' . basename($_FILES['featured_image']['name']);
        $targetPath = $uploadDir . $img_name;

        // Attempt to move file to backend uploads folder
        if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $targetPath)) {
            echo "<script>alert('Failed to upload the image file.');</script>";
        }
    }

    // Prepare and execute database insert operation
    $insertQuery = "INSERT INTO training (title, short_des, duration, seats, reg_fee, location, img, status, content) 
                    VALUES ('$title', '$short_des', '$duration', '$seats', '$reg_fee', '$location', '$img_name', '$status', '$content')";

    if (mysqli_query($con, $insertQuery)) {
        // JavaScript redirection handles safe client-side forwarding without header errors
        echo "<script>alert('Training program saved successfully!'); window.location.href='training.php';</script>";
    } else {
        echo "<script>alert('Database Query Error: " . mysqli_error($con) . "');</script>";
    }
}
?>