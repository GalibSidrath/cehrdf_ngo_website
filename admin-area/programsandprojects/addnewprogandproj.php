
<?php 
    include '../session_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Program | CEHRDF Admin</title>
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
        <h2 class="fw-bold text-dark mb-0">Add Program</h2>
        <a href="programs.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Program Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter program title" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Slogan</label>
                    <input type="text" name="slogan" class="form-control" placeholder="e.g. Green Future, Justice For All">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="2" placeholder="Brief summary of the program (2-3 lines)"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Location <span class="text-danger">*</span></label>
                    <input type="text" name="location" class="form-control" placeholder="e.g. Cox's Bazar, Chittagong" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Display Image <span class="text-danger">*</span></label>
                    <input type="file" name="display_image" class="form-control" accept="image/*" required>
                    <div class="form-text">Recommended size: 800x500 pixels. Max 2MB.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Start Date <span class="text-danger">*</span></label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">End Date</label>
                    <input type="date" name="end_date" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="ongoing">Ongoing</option>
                        <option value="upcoming">Upcoming</option>
                        <option value="finished">Finished</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold d-block">Feature on Homepage? <span class="text-danger">*</span></label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_featured" id="featuredYes" value="1">
                        <label class="form-check-label" for="featuredYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_featured" id="featuredNo" value="0" checked>
                        <label class="form-check-label" for="featuredNo">No</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Description</label>
                    <?php
                    $editorFolder = 'programs';
                    $editorName = 'full_description'; // This matches the name used in the query
                    $editorContent = '<p>Write detailed description about this program...</p>';
                    include '../editor/editor.php';
                    ?>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" name="save_program" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>Save Program
                    </button>
                    <a href="programs.php" class="btn btn-outline-secondary">
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
// Include database connection
include '../../config/connection.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_program'])) {
    
    // Sanitize and collect form inputs
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $slogan = mysqli_real_escape_string($con, $_POST['slogan']);
    $short_des = mysqli_real_escape_string($con, $_POST['short_description']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $feature = mysqli_real_escape_string($con, $_POST['is_featured']);
    $content = mysqli_real_escape_string($con, $_POST['full_description']);

    // Handle Image Upload
    $img_name = "";
    if (isset($_FILES['display_image']) && $_FILES['display_image']['error'] == 0) {
        $uploadDir = '../uploads/project-feature-img/';
        
        // Create directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $img_name = time() . '_' . basename($_FILES['display_image']['name']);
        $targetPath = $uploadDir . $img_name;

        // Move the file
        if (!move_uploaded_file($_FILES['display_image']['tmp_name'], $targetPath)) {
            echo "<script>alert('Failed to upload image.');</script>";
        }
    }

    // Insert Query (Assuming 'id' is auto-increment)
    // Included 'title' column as it exists in your HTML form
    $insertQuery = "INSERT INTO program (title, slogan, short_des, location, img, start_date, end_date, status, feature, content) 
                    VALUES ('$title', '$slogan', '$short_des', '$location', '$img_name', '$start_date', '$end_date', '$status', '$feature', '$content')";

    if (mysqli_query($con, $insertQuery)) {
        echo "<script>alert('Program added successfully!'); window.location.href='programsandprojects.php';</script>";
    } else {
        echo "<script>alert('Database Error: " . mysqli_error($con) . "');</script>";
    }
}
?>