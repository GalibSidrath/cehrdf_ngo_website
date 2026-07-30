<?php
include '../config/connection.php';

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_application'])) {
    $name = mysqli_real_escape_string($con, $_POST['fullName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $edu = mysqli_real_escape_string($con, $_POST['educational_qualification']);
    $training_title = mysqli_real_escape_string($con, $_POST['training_title']);
    $reg_date = date("Y-m-d H:i:s");

    $insert = "INSERT INTO training_reg (name, email, phone, educational_qualification, training_title, reg_date) 
               VALUES ('$name', '$email', '$phone', '$edu', '$training_title', '$reg_date')";
    
    if (mysqli_query($con, $insert)) {
        $message = '<div class="alert alert-success">Registration Done!</div>';
    } else {
        $message = '<div class="alert alert-danger">Something went wrong, please try again.</div>';
    }
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = "SELECT * FROM training WHERE id = $id";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $training = mysqli_fetch_assoc($result);
} else {
    header("Location: alltrainings.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $training['title']; ?> | CEHRDF</title>
    <link rel="icon" type="image/png" href="../images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../styles.css">
</head>
<body class="bg-light">

<?php include '../header.php'; ?>

<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="bg-white p-4 rounded-4 shadow-sm">
                    <span class="badge bg-warning text-dark px-3 py-2 mb-3"><?php echo $training['status']; ?></span>
                    <h1 class="fw-bold"><?php echo $training['title']; ?></h1>
                    <img src="../admin-area/uploads/training-feature-img/<?php echo $training['img']; ?>" class="img-fluid rounded-3 my-3" alt="Image">
                    <div class="mt-4">
                        <?php echo $training['content']; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 sticky-top" style="top: 100px;">
                    <h4 class="fw-bold mb-3">Apply Now</h4>
                    <?php echo $message; // Show success message if applicable ?>
                    
                    <form method="POST">
                        <input type="hidden" name="training_title" value="<?php echo $training['title']; ?>">
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name *</label>
                            <input type="text" name="fullName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Phone *</label>
                            <input type="tel" name="phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Qualification *</label>
                            <input type="text" name="educational_qualification" class="form-control" required>
                        </div>
                        <button type="submit" name="submit_application" class="btn btn-primary w-100 py-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>