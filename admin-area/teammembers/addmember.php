
<?php 
    include '../session_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Member | CEHRDF Admin</title>
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
        <h2 class="fw-bold text-dark mb-0">Add Member</h2>
        <a href="team.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="full_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Designation <span class="text-danger">*</span></label>
                    <input type="text" name="designation" class="form-control" required>
                </div>
        
                <div class="mb-3">
                    <label class="form-label fw-semibold">Member Type <span class="text-danger">*</span></label>
                    <select name="member_type" class="form-select" required>
                        <option value="" disabled selected>Select Type</option>
                        <option value="founder">Founder</option>
                        <option value="board member">Board Member</option>
                        <option value="staff">Staff</option>
                        <option value="advisor">Advisor</option>
                        <option value="volunteer">Volunteer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Photo <span class="text-danger">*</span></label>
                    <input type="file" name="photo" class="form-control" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>


                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Description</label>
                    <?php
                    $editorFolder = 'teammembers'; // This matches the folder name where the editor.php is located
                    $editorName = 'full_description'; // This matches the name used in the query
                    $editorContent = '<p>Write detailed description about the member...</p>';
                    include '../editor/editor.php';
                    ?>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" name="save_member" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>Save Member
                    </button>
                    <a href="team.php" class="btn btn-outline-secondary">
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

<?php

include '../../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_member'])) {
    $name = mysqli_real_escape_string($con, $_POST['full_name']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $type = mysqli_real_escape_string($con, $_POST['member_type']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $full_description = mysqli_real_escape_string($con, $_POST['full_description']);


    $imgName = $_FILES['photo']['name'];
    $imgTmp = $_FILES['photo']['tmp_name'];
    $uploadDir = '../uploads/teammembers/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $finalImageName = time() . '_' . basename($imgName);
    
    if (move_uploaded_file($imgTmp, $uploadDir . $finalImageName)) {
        $insertQuery = "INSERT INTO teammember (name, designation, member_type, img, email, phone, full_description) 
                        VALUES ('$name', '$designation', '$type', '$finalImageName', '$email', '$phone', '$full_description')";

        if (mysqli_query($con, $insertQuery)) {
            echo "<script>alert('Member added successfully!'); window.location.href='teammembers.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Failed to upload image.');</script>";
    }
}
?>