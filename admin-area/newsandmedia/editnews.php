<?php 
    include '../session_check.php';
?>
<?php
// Include database connection
include '../../config/connection.php';

// Check if ID is provided
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    
    // Fetch data from database
    $query = "SELECT * FROM news WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('News not found!'); window.location.href='newsandmedia.php';</script>";
        exit;
    }
} else {
    header("Location: newsandmedia.php");
    exit;
}

// --------------------------------------------------------
// Handle Update Logic
// --------------------------------------------------------
if(isset($_POST['update_news'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $excerpt = mysqli_real_escape_string($con, $_POST['excerpt']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $author = mysqli_real_escape_string($con, $_POST['author']);
    $published_at = mysqli_real_escape_string($con, $_POST['published_at']);
    $is_featured = mysqli_real_escape_string($con, $_POST['is_featured']);
    $content = mysqli_real_escape_string($con, $_POST['content']);

    // Check if new image is uploaded
    if(!empty($_FILES['featured_image']['name'])) {
        $uploadDir = '../uploads/news-feature-img/';
        $fileName = time() . '_' . basename($_FILES["featured_image"]["name"]);
        $targetFilePath = $uploadDir . $fileName;
        
        // Delete old image from server if it exists
        if(!empty($row['img']) && file_exists($uploadDir . $row['img'])) {
            unlink($uploadDir . $row['img']);
        }
        
        // Upload new image
        if(move_uploaded_file($_FILES["featured_image"]["tmp_name"], $targetFilePath)) {
            $imageSql = ", img = '$fileName'";
        }
    } else {
        // Keep existing image if no new file is uploaded
        $imageSql = ""; 
    }

    // Update Query
    $updateQuery = "UPDATE news SET title='$title', short_des='$excerpt', category='$category', author='$author', pub_date='$published_at', feature='$is_featured', content='$content' $imageSql WHERE id='$id'";

    if(mysqli_query($con, $updateQuery)) {
        echo "<script>alert('News updated successfully!'); window.location.href='newsandmedia.php';</script>";
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
    <title>Edit News | CEHRDF Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<?php include '../dashboard-components/header.php'; ?>
<?php include '../dashboard-components/sidebar.php'; ?>

<main class="admin-main">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark mb-0">Edit News</h2>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form method="POST" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">News Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Short Excerpt</label>
                    <textarea name="excerpt" class="form-control" rows="2"><?php echo htmlspecialchars($row['short_des']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                    <select name="category" class="form-select" required>
                        <option value="news" <?php echo ($row['category'] == 'news') ? 'selected' : ''; ?>>News</option>
                        <option value="press_release" <?php echo ($row['category'] == 'press_release') ? 'selected' : ''; ?>>Press Release</option>
                        <option value="success_story" <?php echo ($row['category'] == 'success_story') ? 'selected' : ''; ?>>Success Story</option>
                        <option value="blog" <?php echo ($row['category'] == 'blog') ? 'selected' : ''; ?>>Blog</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Featured Image</label>
                    <div class="mb-2">
                        <img src="../uploads/news-feature-img/<?php echo $row['img']; ?>" style="width: 100px; height: 70px; object-fit: cover;" class="rounded border">
                    </div>
                    <input type="file" name="featured_image" class="form-control" accept="image/*">
                    <div class="form-text">Leave blank to keep current image.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Author</label>
                    <input type="text" name="author" class="form-control" value="<?php echo htmlspecialchars($row['author']); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Publish Date <span class="text-danger">*</span></label>
                    <input type="date" name="published_at" class="form-control" value="<?php echo $row['pub_date']; ?>" required>
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

                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Content <span class="text-danger">*</span></label>
                    <?php
                    $editorFolder = 'news';
                    $editorName = 'content';
                    $editorContent = $row['content']; // Set existing content to editor
                    include '../editor/editor.php';
                    ?>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" name="update_news" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>Update News
                    </button>
                    <a href="newsandmedia.php" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>