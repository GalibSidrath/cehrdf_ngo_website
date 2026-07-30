<?php 
    include '../session_check.php';
?>
<?php
// Include the database connection
include '../../config/connection.php';

// Check if ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: partner.php");
    exit();
}

$id = mysqli_real_escape_string($con, $_GET['id']);

// Fetch existing data for the selected partner
$query = "SELECT * FROM partner WHERE id = '$id'";
$result = mysqli_query($con, $query);
$partner = mysqli_fetch_assoc($result);

// If no partner found with this ID
if (!$partner) {
    header("Location: partner.php");
    exit();
}

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_partner'])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $agreement_date = mysqli_real_escape_string($con, $_POST['agreement_date']);

    $finalLogoName = $partner['logo']; // Default to old logo

    // Check if a new file is uploaded
    if (!empty($_FILES['logo']['name'])) {
        $logoName = $_FILES['logo']['name'];
        $logoTmp = $_FILES['logo']['tmp_name'];
        $uploadDir = '../uploads/partners/';
        $finalLogoName = time() . '_' . basename($logoName);

        // Move new file
        if (move_uploaded_file($logoTmp, $uploadDir . $finalLogoName)) {
            // Delete old file from server if it exists
            if (!empty($partner['logo']) && file_exists($uploadDir . $partner['logo'])) {
                unlink($uploadDir . $partner['logo']);
            }
        }
    }

    // Update query
    $updateQuery = "UPDATE partner SET 
                    name = '$name', 
                    logo = '$finalLogoName', 
                    agreement_date = '$agreement_date' 
                    WHERE id = '$id'";

    if (mysqli_query($con, $updateQuery)) {
        echo "<script>
                alert('Partner updated successfully!');
                window.location.href='partner.php';
              </script>";
    } else {
        echo "<script>alert('Update failed!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Partner | CEHRDF Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../styles.css">
</head>

<body>

    <?php include '../dashboard-components/header.php'; ?>
    <?php include '../dashboard-components/sidebar.php'; ?>

    <main class="admin-main">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark mb-0">Edit Partner</h2>
            <a href="partner.php" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">

                <form method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Partner Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control"
                            value="<?php echo htmlspecialchars($partner['name']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Current Logo</label><br>
                        <img src="../uploads/partners/<?php echo $partner['logo']; ?>"
                            style="width: 100px; height: 60px; object-fit: contain; margin-bottom: 10px; border: 1px solid #ddd; padding: 5px;">
                        <input type="file" name="logo" class="form-control" accept="image/*">
                        <div class="form-text">Leave blank to keep the current logo.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Agreement Date <span class="text-danger">*</span></label>
                        <input type="date" name="agreement_date" class="form-control"
                            value="<?php echo $partner['agreement_date']; ?>" required>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" name="update_partner" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Partner
                        </button>
                        <a href="partners.php" class="btn btn-outline-secondary">
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