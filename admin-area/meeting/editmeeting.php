<?php 
    include '../session_check.php';
?>
<?php
// Include database connection
include '../../config/connection.php';

// 1. Fetch existing meeting data based on ID
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM meetings WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Meeting record not found!'); window.location.href='meetings.php';</script>";
        exit;
    }
} else {
    header("Location: meetings.php");
    exit;
}

// 2. Handle form submission for updating meeting data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_meeting'])) {
    
    // Sanitize input values
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $presented_by = mysqli_real_escape_string($con, $_POST['presented_by']);
    $date = mysqli_real_escape_string($con, $_POST['meeting_date']);
    $time = mysqli_real_escape_string($con, $_POST['meeting_time']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $meeting_type = mysqli_real_escape_string($con, $_POST['meeting_type']);
    $content = mysqli_real_escape_string($con, $_POST['agenda']);

    // Update query
    $updateQuery = "UPDATE meetings SET 
                    title='$title', 
                    presented_by='$presented_by', 
                    date='$date', 
                    time='$time', 
                    location='$location', 
                    meeting_type='$meeting_type', 
                    content='$content' 
                    WHERE id='$id'";

    if (mysqli_query($con, $updateQuery)) {
        echo "<script>alert('Meeting updated successfully!'); window.location.href='meetings.php';</script>";
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
    <title>Edit Meeting | CEHRDF Admin</title>
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
        <h2 class="fw-bold text-dark mb-0">Edit Meeting</h2>
        <a href="meetings.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Meeting Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Presented By <span class="text-danger">*</span></label>
                    <input type="text" name="presented_by" class="form-control" value="<?php echo htmlspecialchars($row['presented_by']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Date <span class="text-danger">*</span></label>
                    <input type="date" name="meeting_date" class="form-control" value="<?php echo htmlspecialchars($row['date']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Time <span class="text-danger">*</span></label>
                    <input type="time" name="meeting_time" class="form-control" value="<?php echo htmlspecialchars($row['time']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Location</label>
                    <input type="text" name="location" class="form-control" value="<?php echo htmlspecialchars($row['location']); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Meeting Type</label>
                    <select name="meeting_type" class="form-select">
                        <option value="general" <?php echo ($row['meeting_type'] == 'general') ? 'selected' : ''; ?>>General</option>
                        <option value="board" <?php echo ($row['meeting_type'] == 'board') ? 'selected' : ''; ?>>Board Meeting</option>
                        <option value="stakeholder" <?php echo ($row['meeting_type'] == 'stakeholder') ? 'selected' : ''; ?>>Stakeholder</option>
                        <option value="workshop" <?php echo ($row['meeting_type'] == 'workshop') ? 'selected' : ''; ?>>Workshop</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Agenda / Description</label>
                    <?php
                    $editorFolder = 'meetings';
                    $editorName = 'agenda';
                    // Pass the existing record content directly to the dynamic editor components
                    $editorContent = $row['content'];
                    include '../editor/editor.php';
                    ?>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" name="update_meeting" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Meeting
                    </button>
                    <a href="meetings.php" class="btn btn-outline-secondary">
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