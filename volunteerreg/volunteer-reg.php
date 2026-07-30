<?php
// Include the database connection file
include '../config/connection.php';

// Initialize message variable
$message = "";

// Check if the form is submitted
if (isset($_POST['submit_registration'])) {
    
    // Sanitize and escape form inputs to prevent SQL injection
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $occupation = mysqli_real_escape_string($con, $_POST['occupation']);
    $institute = mysqli_real_escape_string($con, $_POST['institute']);
    $availability = mysqli_real_escape_string($con, $_POST['availability']);
    $experience = mysqli_real_escape_string($con, $_POST['experience']);
    $about_volunteer = mysqli_real_escape_string($con, $_POST['about_volunteer']);

    // Prepare the insert query (id is omitted assuming it is AUTO_INCREMENT)
    $insert_query = "INSERT INTO volunteerreg (fullname, email, phone, dob, address, occupation, institute, availability, experience, about_volunteer) 
                     VALUES ('$fullname', '$email', '$phone', '$dob', '$address', '$occupation', '$institute', '$availability', '$experience', '$about_volunteer')";

    if (mysqli_query($con, $insert_query)) {
        $message = '<div class="alert alert-success">Registration successful! Thank you for joining us.</div>';
    } else {
        $message = '<div class="alert alert-danger">Registration failed. Please try again later.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a Volunteer | CEHRDF</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css"> 
</head>
<body class="bg-light">

    <?php include '../header.php'; ?>

    <section class="text-center text-white py-5" style="background: linear-gradient(rgba(23, 37, 42, 0.85), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1593113563332-e14b51139dce?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 60px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Become a Volunteer</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Join our network of passionate changemakers. Dedicate your time and skills to protect the environment and empower coastal communities.</p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    
                    <?php echo $message; // Display success/error message here ?>

                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                        <form method="POST">
                            
                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3" style="border-color: #2b7a78 !important;">Personal Information</h5>
                            <div class="row g-3 mb-5">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="fullname" placeholder="E.g. Hasan Ahmed" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" placeholder="youremail@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="phone" placeholder="+880 1XXXXXXXXX" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="dob" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Current Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address" placeholder="123 Street, City, District" required>
                                </div>
                            </div>

                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3" style="border-color: #2b7a78 !important;">Background</h5>
                            <div class="row g-3 mb-5">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Current Occupation <span class="text-danger">*</span></label>
                                    <select class="form-select" name="occupation" required>
                                        <option value="" selected disabled>Select your occupation...</option>
                                        <option value="student">Student</option>
                                        <option value="employed">Employed Professional</option>
                                        <option value="freelancer">Freelancer / Self-Employed</option>
                                        <option value="unemployed">Currently Unemployed</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Institution / Organization</label>
                                    <input type="text" class="form-control" name="institute" placeholder="University or Company Name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Availability <span class="text-danger">*</span></label>
                                    <select class="form-select" name="availability" required>
                                        <option value="" selected disabled>How often can you volunteer?</option>
                                        <option value="weekends">Only Weekends</option>
                                        <option value="weekdays">Weekdays (Part-time)</option>
                                        <option value="remote">Remote / Online Only</option>
                                        <option value="flexible">Flexible / Project Basis</option>
                                    </select>
                                </div>
                            </div>

                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3 mt-4" style="border-color: #2b7a78 !important;">Tell Us More</h5>
                            <div class="row g-3 mb-5">
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Previous Experience (Optional)</label>
                                    <textarea class="form-control" name="experience" rows="3" placeholder="Briefly describe your past experience, if any..."></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <label class="form-label fw-semibold">Why do you want to join CEHRDF? <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="about_volunteer" rows="4" placeholder="Share your motivation..." required></textarea>
                                </div>
                            </div>

                            <div class="d-grid mt-2">
                                <button type="submit" name="submit_registration" class="btn btn-primary-custom py-3 fw-bold fs-5 rounded-pill shadow-sm">Submit Registration</button>
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