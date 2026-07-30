<?php 
    include '../session_check.php';
?>
<?php
// Include the database connection
include '../../config/connection.php';

// 1. Fetch team member data based on ID from URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM teammember WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Member not found!'); window.location.href='teammembers.php';</script>";
        exit;
    }
} else {
    header("Location: teammembers.php");
    exit;
}

// 2. Handle form submission to update member data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_member'])) {
    
    $name = mysqli_real_escape_string($con, $_POST['full_name']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $type = mysqli_real_escape_string($con, $_POST['member_type']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    // Check if a new image is uploaded
    if (!empty($_FILES['photo']['name'])) {
        $imgName = $_FILES['photo']['name'];
        $imgTmp = $_FILES['photo']['tmp_name'];
        $uploadDir = '../uploads/teamembers/';
        $finalImageName = time() . '_' . basename($imgName);
        
        if (move_uploaded_file($imgTmp, $uploadDir . $finalImageName)) {
            // Delete old image if it exists
            if (!empty($row['img']) && file_exists($uploadDir . $row['img'])) {
                unlink($uploadDir . $row['img']);
            }
        }
    } else {
        // Keep the old image if no new file is uploaded
        $finalImageName = $row['img'];
    }

    // Update Query
    $updateQuery = "UPDATE teammember SET 
                    name='$name', 
                    designation='$designation', 
                    member_type='$type', 
                    img='$finalImageName', 
                    email='$email', 
                    phone='$phone' 
                    WHERE id='$id'";

    if (mysqli_query($con, $updateQuery)) {
        echo "<script>alert('Member updated successfully!'); window.location.href='teammembers.php';</script>";
    } else {
        echo "<script>alert('Update failed: " . mysqli_error($con) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member | CEHRDF Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<?php include '../dashboard-components/header.php'; ?>
<?php include '../dashboard-components/sidebar.php'; ?>

<main class="admin-main">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark mb-0">Edit Member</h2>
        <a href="team.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="full_name" class="form-control" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Designation <span class="text-danger">*</span></label>
                    <input type="text" name="designation" class="form-control" value="<?php echo htmlspecialchars($row['designation']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Member Type <span class="text-danger">*</span></label>
                    <select name="member_type" class="form-select" required>
                        <option value="founder" <?php if($row['member_type'] == 'founder') echo 'selected'; ?>>Founder</option>
                        <option value="board" <?php if($row['member_type'] == 'board') echo 'selected'; ?>>Board Member</option>
                        <option value="staff" <?php if($row['member_type'] == 'staff') echo 'selected'; ?>>Staff</option>
                        <option value="advisor" <?php if($row['member_type'] == 'advisor') echo 'selected'; ?>>Advisor</option>
                        <option value="volunteer" <?php if($row['member_type'] == 'volunteer') echo 'selected'; ?>>Volunteer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Current Photo</label><br>
                    <img src="../uploads/teamembers/<?php echo $row['img']; ?>" style="width: 100px; height: 100px; object-fit: cover;" class="mb-2">
                    <input type="file" name="photo" class="form-control" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($row['email']); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($row['phone']); ?>">
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" name="update_member" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Member
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