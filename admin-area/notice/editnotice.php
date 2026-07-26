<?php 

    include '../../config/connection.php';

    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($con, $_GET['id']);
        $query = "SELECT * FROM notice WHERE id = '$id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        
        if(!$row) {
            echo "<script>alert('Notice not found!'); window.location.href='notices.php';</script>";
            exit;
        }
    } else {
        header("Location: notices.php");
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $ref_no = mysqli_real_escape_string($con, $_POST['ref_no']);
        $pub_date = mysqli_real_escape_string($con, $_POST['publish_date']);
        $content = mysqli_real_escape_string($con, $_POST['notice_content']);

        $updateQuery = "UPDATE notice SET title='$title', ref_no='$ref_no', pub_date='$pub_date', content='$content' WHERE id='$id'";
        
        if(mysqli_query($con, $updateQuery)) {
            echo "<script>alert('Notice updated successfully!'); window.location.href='notices.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Notice | CEHRDF Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<?php include '../dashboard-components/header.php'; ?>
<?php include '../dashboard-components/sidebar.php'; ?>

<main class="admin-main">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark mb-1">Edit Notice</h2>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Notice Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Reference No</label>
                    <input type="text" name="ref_no" class="form-control" value="<?php echo htmlspecialchars($row['ref_no']); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Publish Date <span class="text-danger">*</span></label>
                    <input type="date" name="publish_date" class="form-control" value="<?php echo $row['pub_date']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Notice Content <span class="text-danger">*</span></label>
                    <?php
                        $editorFolder = 'notices';
                        $editorName = 'notice_content';
                        $editorContent = $row['content']; 
                        include '../editor/editor.php';
                    ?>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Notice
                    </button>
                    <a href="notices.php" class="btn btn-outline-secondary">
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