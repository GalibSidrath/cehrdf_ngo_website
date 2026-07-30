<?php 
    include '../session_check.php';
?>
<?php
// Include database connection
include '../../config/connection.php';

// 1. Fetch existing training data based on ID
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM training WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Training record not found!'); window.location.href='training.php';</script>";
        exit;
    }
} else {
    header("Location: training.php");
    exit;
}

// 2. Handle form submission for updating training data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_training'])) {
    
    // Sanitize input values
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $short_des = mysqli_real_escape_string($con, $_POST['short_description']);
    $duration = mysqli_real_escape_string($con, $_POST['duration']);
    $seats = mysqli_real_escape_string($con, $_POST['max_participants']);
    $reg_fee = mysqli_real_escape_string($con, $_POST['fee']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $content = mysqli_real_escape_string($con, $_POST['description']);

    // Default to the existing image name
    $img_name = $row['img']; 

    // 3. Handle Image Upload Process (only if a new file is chosen)
    if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] == 0) {
        $uploadDir = '../uploads/training-feature-img/';
        $new_img_name = time() . '_' . basename($_FILES['featured_image']['name']);
        $targetPath = $uploadDir . $new_img_name;

        if (move_uploaded_file($_FILES['featured_image']['tmp_name'], $targetPath)) {
            // Delete the older image asset from server to reclaim disk space
            if (!empty($row['img']) && file_exists($uploadDir . $row['img'])) {
                unlink($uploadDir . $row['img']);
            }
            // Assign the newly generated image name
            $img_name = $new_img_name; 
        } else {
            echo "<script>alert('Failed to upload the new featured image.');</script>";
        }
    }

    // 4. Update the record into the database
    $updateQuery = "UPDATE training SET 
                    title='$title', 
                    short_des='$short_des', 
                    duration='$duration', 
                    seats='$seats', 
                    reg_fee='$reg_fee', 
                    location='$location', 
                    img='$img_name', 
                    status='$status', 
                    content='$content' 
                    WHERE id='$id'";

    if (mysqli_query($con, $updateQuery)) {
        echo "<script>alert('Training program updated successfully!'); window.location.href='training.php';</script>";
    } else {
        echo "<script>alert('Database update failure: " . mysqli_error($con) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Training | CEHRDF Admin</title>
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
        <h2 class="fw-bold text-dark mb-0">Edit Training</h2>
        <a href="trainings.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Training Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="2"><?php echo htmlspecialchars($row['short_des']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Duration <span class="text-danger">*</span></label>
                    <input type="text" name="duration" class="form-control" value="<?php echo htmlspecialchars($row['duration']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Available Seats <span class="text-danger">*</span></label>
                    <input type="number" name="max_participants" class="form-control" value="<?php echo htmlspecialchars($row['seats']); ?>" min="1" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Registration Fee <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">BDT</span>
                        <input type="number" name="fee" class="form-control" value="<?php echo htmlspecialchars($row['reg_fee']); ?>" min="0" required>
                    </div>
                    <div class="form-text">Enter 0 for free training.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Location <span class="text-danger">*</span></label>
                    <input type="text" name="location" class="form-control" value="<?php echo htmlspecialchars($row['location']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold d-block">Featured Image</label>
                    <?php if(!empty($row['img'])): ?>
                        <div class="mb-2">
                            <img src="../uploads/training-feature-img/<?php echo $row['img']; ?>" alt="Current Training Image" class="rounded" style="width: 150px; height: 100px; object-fit: cover;">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="featured_image" class="form-control" accept="image/*">
                    <div class="form-text">Leave blank if you don't want to change the image. Max 2MB.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="">Select Status</option>
                        <option value="upcoming" <?php echo ($row['status'] == 'upcoming') ? 'selected' : ''; ?>>Upcoming</option>
                        <option value="ongoing" <?php echo ($row['status'] == 'ongoing') ? 'selected' : ''; ?>>Ongoing</option>
                        <option value="completed" <?php echo ($row['status'] == 'completed' || $row['status'] == 'finished') ? 'selected' : ''; ?>>Completed</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Description</label>
                    <?php
                    $editorFolder = 'trainings';
                    $editorName = 'description';
                    // Pass the existing record content directly to the dynamic editor components
                    $editorContent = $row['content'];
                    include '../editor/editor.php';
                    ?>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" name="update_training" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Training
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