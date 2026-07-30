<?php
// Include the database connection file
include '../config/connection.php';

// Get job ID from URL
$position_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch job title based on ID
$job_query = mysqli_query($con, "SELECT title FROM career WHERE id = $position_id");
$job_data = mysqli_fetch_assoc($job_query);

// If job not found, redirect to career page
if (!$job_data) {
    header("Location: career.php");
    exit();
}

// Initialize message variable
$message = "";

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Sanitize inputs
    $name = mysqli_real_escape_string($con, $_POST['full_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $degree = mysqli_real_escape_string($con, $_POST['degree']);
    $institution = mysqli_real_escape_string($con, $_POST['institution']);
    $passing_year = mysqli_real_escape_string($con, $_POST['passing_year']);
    $msg = mysqli_real_escape_string($con, $_POST['cover_letter']);
    
    $applying_position = mysqli_real_escape_string($con, $job_data['title']);
    $applying_date = date('Y-m-d'); // Current date

    // Handle File Upload
    if(isset($_FILES['cv_file']) && $_FILES['cv_file']['error'] == 0) {
        $resume = $_FILES['cv_file']['name'];
        $target_dir = "../admin-area/uploads/job-applicants-resume/"; 
        $file_extension = strtolower(pathinfo($resume, PATHINFO_EXTENSION));
        $new_file_name = time() . '_' . rand(1000, 9999) . '.' . $file_extension;
        $target_file = $target_dir . $new_file_name;

        // Check allowed file types
        $allowed_types = ['pdf', 'doc', 'docx'];
        
        if (in_array($file_extension, $allowed_types)) {
            if (move_uploaded_file($_FILES['cv_file']['tmp_name'], $target_file)) {
                
                // Normal mysqli_query for insertion
                $query = "INSERT INTO job_applications (name, email, phone, current_address, edu_qualification, institute_name, passing_year, msg, resume, applying_position, applying_date) 
                          VALUES ('$name', '$email', '$phone', '$address', '$degree', '$institution', '$passing_year', '$msg', '$new_file_name', '$applying_position', '$applying_date')";
                
                if (mysqli_query($con, $query)) {
                    $message = '<div class="alert alert-success">Application submitted successfully!</div>';
                    echo "<script>window.location.href = 'alljobs.php'</script>";
                } else {
                    $message = '<div class="alert alert-danger">Error: ' . mysqli_error($con) . '</div>';
                }
                
            } else {
                $message = '<div class="alert alert-danger">Failed to upload file. Check folder permissions.</div>';
            }
        } else {
            $message = '<div class="alert alert-danger">Invalid file format. Only PDF, DOC, DOCX allowed.</div>';
        }
    } else {
        $message = '<div class="alert alert-danger">Please select a resume file to upload.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for <?php echo htmlspecialchars($job_data['title']); ?> | CEHRDF</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css"> 
</head>
<body class="bg-light">

    <?php include '../header.php'; ?>

    <section class="text-center text-white py-5" style="background: linear-gradient(rgba(23, 37, 42, 0.85), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 60px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Job Application Form</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Take the next step in your career. Fill out the form below to apply for the position.</p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php echo $message; ?>
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                        <form method="POST" enctype="multipart/form-data">
                            
                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3" style="border-color: #2b7a78 !important;">Applying for: <?php echo htmlspecialchars($job_data['title']); ?></h5>
                            
                            <input type="hidden" name="position_id" value="<?php echo $position_id; ?>">

                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3" style="border-color: #2b7a78 !important;">Personal Information</h5>
                            <div class="row g-3 mb-5">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="full_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="phone" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Current Address</label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                            </div>

                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3" style="border-color: #2b7a78 !important;">Educational Background</h5>
                            <div class="row g-3 mb-5">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Highest Degree <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="degree" required>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label fw-semibold">Institution Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="institution" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Passing Year</label>
                                    <input type="number" class="form-control" name="passing_year">
                                </div>
                            </div>

                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3" style="border-color: #2b7a78 !important;">Additional Details</h5>
                            <div class="row g-3 mb-5">
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Cover Letter / Message</label>
                                    <textarea class="form-control" name="cover_letter" rows="5"></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <label class="form-label fw-semibold">Upload CV/Resume <span class="text-danger">*</span></label>
                                    <input class="form-control form-control-lg" type="file" name="cv_file" accept=".pdf,.doc,.docx" required>
                                    <div class="form-text mt-2"><i class="fas fa-info-circle me-1"></i> Accepted formats: PDF, DOC, DOCX. Max file size: 5MB.</div>
                                </div>
                            </div>

                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-primary-custom py-3 fw-bold fs-5 rounded-pill shadow-sm">Submit Application</button>
                            </div>
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