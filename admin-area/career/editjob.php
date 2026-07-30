<?php 
    include '../session_check.php';
?>
<?php
// Include database connection
include '../../config/connection.php';

// 1. Fetch existing job data based on ID
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM career WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Job record not found!'); window.location.href='jobs.php';</script>";
        exit;
    }
} else {
    header("Location: jobs.php");
    exit;
}

// 2. Handle form submission for updating job data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_job'])) {
    
    // Sanitize input values
    $title = mysqli_real_escape_string($con, $_POST['job_title']);
    $dpt = mysqli_real_escape_string($con, $_POST['department']);
    $type = mysqli_real_escape_string($con, $_POST['job_type']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $num_of_vac = mysqli_real_escape_string($con, $_POST['vacancy']);
    $salary_range = mysqli_real_escape_string($con, $_POST['salary_range']);
    $deadline = mysqli_real_escape_string($con, $_POST['deadline']);
    $short_des = mysqli_real_escape_string($con, $_POST['short_description']);
    $content = mysqli_real_escape_string($con, $_POST['full_details']);

    // Update query
    $updateQuery = "UPDATE career SET 
                    title='$title', 
                    dpt='$dpt', 
                    type='$type', 
                    location='$location', 
                    num_of_vac='$num_of_vac', 
                    salary_range='$salary_range', 
                    deadline='$deadline', 
                    short_des='$short_des', 
                    content='$content' 
                    WHERE id='$id'";

    if (mysqli_query($con, $updateQuery)) {
        echo "<script>alert('Job updated successfully!'); window.location.href='jobs.php';</script>";
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
    <title>Edit Job | CEHRDF Admin</title>
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
        <h2 class="fw-bold text-dark mb-0">Edit Job</h2>
        <a href="jobs.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Job Title <span class="text-danger">*</span></label>
                    <input type="text" name="job_title" class="form-control" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Department</label>
                    <input type="text" name="department" class="form-control" value="<?php echo htmlspecialchars($row['dpt']); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Job Type <span class="text-danger">*</span></label>
                    <select name="job_type" class="form-select" required>
                        <option value="">Select Type</option>
                        <option value="permanent" <?php echo ($row['type'] == 'permanent') ? 'selected' : ''; ?>>Permanent</option>
                        <option value="contractual" <?php echo ($row['type'] == 'contractual') ? 'selected' : ''; ?>>Contractual</option>
                        <option value="part_time" <?php echo ($row['type'] == 'part_time') ? 'selected' : ''; ?>>Part Time</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Location</label>
                    <input type="text" name="location" class="form-control" value="<?php echo htmlspecialchars($row['location']); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Number of Vacancies</label>
                    <input type="number" name="vacancy" class="form-control" value="<?php echo htmlspecialchars($row['num_of_vac']); ?>" min="1">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Salary Range</label>
                    <input type="text" name="salary_range" class="form-control" value="<?php echo htmlspecialchars($row['salary_range']); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Application Deadline <span class="text-danger">*</span></label>
                    <input type="date" name="deadline" class="form-control" value="<?php echo htmlspecialchars($row['deadline']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="2"><?php echo htmlspecialchars($row['short_des']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Job Details</label>
                    <?php
                    $editorFolder = 'careers';
                    $editorName = 'full_details';
                    // Pass the existing content directly to the dynamic editor components
                    $editorContent = $row['content'];
                    include '../editor/editor.php';
                    ?>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" name="update_job" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Job
                    </button>
                    <a href="jobs.php" class="btn btn-outline-secondary">
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