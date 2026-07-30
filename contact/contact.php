<?php
// Include the database connection file
include '../config/connection.php';

// Initialize message variable
$message = "";

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Sanitize inputs to prevent SQL Injection
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $msg = mysqli_real_escape_string($con, $_POST['message']);

    // Insert Query
    $query = "INSERT INTO messege (name, email, msg) VALUES ('$name', '$email', '$msg')";

    if (mysqli_query($con, $query)) {
        $message = '<div class="alert alert-success">Message sent successfully! Thank you for contacting us.</div>';
    } else {
        $message = '<div class="alert alert-danger">Error: Could not send message. Please try again later.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | CEHRDF</title>
    <link rel="icon" type="image/png" href="../images/logo.png">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>

<body class="bg-light">

    <?php include '../header.php'; ?>

    <!-- Banner Section -->
    <section class="text-center text-white py-5"
        style="background: linear-gradient(rgba(23, 37, 42, 0.85), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1516387938699-a93567ec168e?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 60px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Get In Touch</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Have a question, want to collaborate, or need to learn more about our projects? We'd love to hear from you.</p>
        </div>
    </section>

    <!-- Contact Content Section -->
    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="row g-5 align-items-stretch">

                <!-- Left Column -->
                <div class="col-lg-5">
                    <h3 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3" style="border-color: #2b7a78 !important;">Contact Information</h3>
                    <div class="mb-4">
                        <p class="text-muted">Feel free to reach out to us during our working hours. You can also visit our head office for any direct queries.</p>
                    </div>

                    <!-- Contact Details -->
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-white text-primary-custom shadow-sm rounded-circle d-flex justify-content-center align-items-center me-3 flex-shrink-0" style="width: 50px; height: 50px;">
                            <i class="fas fa-map-marker-alt fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark mb-1">Head Office</h5>
                            <p class="text-muted mb-0">House #XX, Road #XX,<br>Cox's Bazar Sadar, Chittagong, Bangladesh</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-white text-primary-custom shadow-sm rounded-circle d-flex justify-content-center align-items-center me-3 flex-shrink-0" style="width: 50px; height: 50px;">
                            <i class="fas fa-phone-alt fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark mb-1">Phone Number</h5>
                            <p class="text-muted mb-0">+880 1XXX-XXXXXX <br>+880 1YYY-YYYYYY</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-white text-primary-custom shadow-sm rounded-circle d-flex justify-content-center align-items-center me-3 flex-shrink-0" style="width: 50px; height: 50px;">
                            <i class="fas fa-envelope fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark mb-1">Email Address</h5>
                            <p class="text-muted mb-0">info@cehrdf.org <br>support@cehrdf.org</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Contact Form -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm rounded-4 h-100" style="background-color: #ffffff;">
                        <div class="card-body p-4 p-md-5">
                            
                            <?php echo $message;  ?>

                            <h3 class="fw-bold text-dark mb-4">Send Us a Message</h3>
                            <form method="POST">
                                <div class="mb-4">
                                    <label for="contactName" class="form-label fw-semibold text-dark">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg bg-light" id="contactName" name="name" placeholder="John Doe" required>
                                </div>
                                <div class="mb-4">
                                    <label for="contactEmail" class="form-label fw-semibold text-dark">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-lg bg-light" id="contactEmail" name="email" placeholder="youremail@example.com" required>
                                </div>
                                <div class="mb-4">
                                    <label for="contactMessage" class="form-label fw-semibold text-dark">Message <span class="text-danger">*</span></label>
                                    <textarea class="form-control form-control-lg bg-light" id="contactMessage" name="message" rows="6" placeholder="Write your message here..." required></textarea>
                                </div>
                                <div class="d-grid mt-5">
                                    <button type="submit" class="btn btn-primary-custom py-3 fw-bold fs-5 rounded-pill shadow-sm">
                                        Send Message <i class="fas fa-paper-plane ms-2"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>