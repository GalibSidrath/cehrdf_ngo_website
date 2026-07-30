<?php 
    include '../session_check.php';
?>
<?php
// Include database connection
include '../../config/connection.php';

// 1. Fetch existing data based on ID
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM program WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Program not found!'); window.location.href='programsandprojects.php';</script>";
        exit;
    }
} else {
    header("Location: programsandprojects.php");
    exit;
}

// 2. Handle form submission for update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_program'])) {
    
    // Sanitize inputs
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $slogan = mysqli_real_escape_string($con, $_POST['slogan']);
    $short_des = mysqli_real_escape_string($con, $_POST['short_description']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $feature = mysqli_real_escape_string($con, $_POST['is_featured']);
    $content = mysqli_real_escape_string($con, $_POST['full_description']);

    // Default to the existing image
    $img_name = $row['img']; 

    // 3. Handle Image Upload (only if a new image is selected)
    if (isset($_FILES['display_image']) && $_FILES['display_image']['error'] == 0) {
        $uploadDir = '../uploads/project-feature-img/';
        $new_img_name = time() . '_' . basename($_FILES['display_image']['name']);
        $targetPath = $uploadDir . $new_img_name;

        if (move_uploaded_file($_FILES['display_image']['tmp_name'], $targetPath)) {
            // Delete the old image to save server space
            if (!empty($row['img']) && file_exists($uploadDir . $row['img'])) {
                unlink($uploadDir . $row['img']);
            }
            // Update variable to the new image name
            $img_name = $new_img_name; 
        } else {
            echo "<script>alert('Failed to upload new image.');</script>";
        }
    }

    // 4. Update Database
    $updateQuery = "UPDATE program SET 
                    title='$title', 
                    slogan='$slogan', 
                    short_des='$short_des', 
                    location='$location', 
                    img='$img_name', 
                    start_date='$start_date', 
                    end_date='$end_date', 
                    status='$status', 
                    feature='$feature', 
                    content='$content' 
                    WHERE id='$id'";

    if (mysqli_query($con, $updateQuery)) {
        echo "<script>alert('Program updated successfully!'); window.location.href='programsandprojects.php';</script>";
    } else {
        echo "<script>alert('Database Error: " . mysqli_error($con) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program | CEHRDF Admin</title>
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
        <h2 class="fw-bold text-dark mb-0">Edit Program</h2>
        <a href="projectsandprograms.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Program Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Slogan</label>
                    <input type="text" name="slogan" class="form-control" value="<?php echo htmlspecialchars($row['slogan']); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="2"><?php echo htmlspecialchars($row['short_des']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Location <span class="text-danger">*</span></label>
                    <input type="text" name="location" class="form-control" value="<?php echo htmlspecialchars($row['location']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold d-block">Display Image</label>
                    <?php if(!empty($row['img'])): ?>
                        <div class="mb-2">
                            <img src="../uploads/project-feature-img/<?php echo $row['img']; ?>" alt="Current Image" class="rounded" style="width: 150px; height: 100px; object-fit: cover;">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="display_image" class="form-control" accept="image/*">
                    <div class="form-text">Leave blank if you don't want to change the image. Max 2MB.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Start Date <span class="text-danger">*</span></label>
                    <input type="date" name="start_date" class="form-control" value="<?php echo $row['start_date']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">End Date</label>
                    <input type="date" name="end_date" class="form-control" value="<?php echo $row['end_date']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="ongoing" <?php echo ($row['status'] == 'ongoing') ? 'selected' : ''; ?>>Ongoing</option>
                        <option value="upcoming" <?php echo ($row['status'] == 'upcoming') ? 'selected' : ''; ?>>Upcoming</option>
                        <option value="finished" <?php echo ($row['status'] == 'finished') ? 'selected' : ''; ?>>Finished</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold d-block">Feature on Homepage? <span class="text-danger">*</span></label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_featured" id="featuredYes" value="1" <?php echo ($row['feature'] == '1') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="featuredYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_featured" id="featuredNo" value="0" <?php echo ($row['feature'] == '0') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="featuredNo">No</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Description</label>
                    <?php
                    $editorFolder = 'programs';
                    $editorName = 'full_description';
                    // Pass the existing content to the editor
                    $editorContent = $row['content']; 
                    include '../editor/editor.php';
                    ?>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" name="update_program" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Program
                    </button>
                    <a href="projectsandprograms.php" class="btn btn-outline-secondary">
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