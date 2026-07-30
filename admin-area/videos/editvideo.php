<?php 
    include '../session_check.php';
?>
<?php
// Include database connection
include '../../config/connection.php';

// 1. Fetch data based on ID
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM videos WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Video not found!'); window.location.href='videos.php';</script>";
        exit;
    }
} else {
    header("Location: videos.php");
    exit;
}

// 2. Handle Update Logic
if(isset($_POST['update_video'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $url = mysqli_real_escape_string($con, $_POST['video_url']);
    $vid = mysqli_real_escape_string($con, $_POST['vid']);
    $pub_date = mysqli_real_escape_string($con, $_POST['publish_date']);
    $is_featured = mysqli_real_escape_string($con, $_POST['is_featured']);

    $updateQuery = "UPDATE videos SET title='$title', url='$url', vid='$vid', pub_date='$pub_date', feature='$is_featured' WHERE id='$id'";

    if(mysqli_query($con, $updateQuery)) {
        echo "<script>alert('Video updated successfully!'); window.location.href='videos.php';</script>";
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
    <title>Edit Video | CEHRDF Admin</title>
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
        <h2 class="fw-bold text-dark mb-0">Edit Video</h2>
        <a href="videos.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form method="POST">
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Video Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">YouTube URL <span class="text-danger">*</span></label>
                    <input type="url" name="video_url" class="form-control" value="<?php echo htmlspecialchars($row['url']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Video ID <span class="text-danger">*</span></label>
                    <input type="text" name="vid" class="form-control" value="<?php echo htmlspecialchars($row['vid']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Publish Date <span class="text-danger">*</span></label>
                    <input type="date" name="publish_date" class="form-control" value="<?php echo $row['pub_date']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold d-block">Feature on Homepage?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_featured" id="featuredYes" value="1" <?php echo ($row['feature'] == '1') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="featuredYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_featured" id="featuredNo" value="0" <?php echo ($row['feature'] == '0') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="featuredNo">No</label>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" name="update_video" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>Update Video
                    </button>
                    <a href="videos.php" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>s