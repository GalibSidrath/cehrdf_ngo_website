<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | CEHRDF</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Custom CSS (আপনার মেইন styles.css ফাইল) -->
    <link rel="stylesheet" href="../styles.css">
</head>

<body class="bg-light">

    <?php include '../header.php'; ?>


    <!-- =========================================
         CONTACT PAGE BANNER START
         ========================================= -->
    <!-- SECTION START: text-center text-white py-5 -->
    <section class="text-center text-white py-5"
        style="background: linear-gradient(rgba(23, 37, 42, 0.85), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1516387938699-a93567ec168e?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 60px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Get In Touch</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Have a question, want to collaborate, or need to learn
                more about our projects? We'd love to hear from you.</p>
        </div>
    </section>
<!-- SECTION END -->
    <!-- =========================================
         CONTACT PAGE BANNER END
         ========================================= -->


    <!-- =========================================
         CONTACT CONTENT SECTION START
         ========================================= -->
    <!-- SECTION START: py-5 bg-light -->
    <section class="py-5 bg-light">
        <div class="container py-3">

            <div class="row g-5 align-items-stretch">

                <!-- LEFT COLUMN: Contact Info & Map -->
                <div class="col-lg-5">

                    <h3 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3"
                        style="border-color: #2b7a78 !important;">Contact Information</h3>

                    <div class="mb-4">
                        <p class="text-muted">Feel free to reach out to us during our working hours. You can also visit
                            our head office for any direct queries.</p>
                    </div>

                    <!-- Address Block -->
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-white text-primary-custom shadow-sm rounded-circle d-flex justify-content-center align-items-center me-3 flex-shrink-0"
                            style="width: 50px; height: 50px;">
                            <i class="fas fa-map-marker-alt fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark mb-1">Head Office</h5>
                            <p class="text-muted mb-0">House #XX, Road #XX,<br>Cox's Bazar Sadar, Chittagong, Bangladesh
                            </p>
                        </div>
                    </div>

                    <!-- Phone Block -->
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-white text-primary-custom shadow-sm rounded-circle d-flex justify-content-center align-items-center me-3 flex-shrink-0"
                            style="width: 50px; height: 50px;">
                            <i class="fas fa-phone-alt fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark mb-1">Phone Number</h5>
                            <p class="text-muted mb-0">+880 1XXX-XXXXXX <br>+880 1YYY-YYYYYY</p>
                        </div>
                    </div>

                    <!-- Email Block -->
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-white text-primary-custom shadow-sm rounded-circle d-flex justify-content-center align-items-center me-3 flex-shrink-0"
                            style="width: 50px; height: 50px;">
                            <i class="fas fa-envelope fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark mb-1">Email Address</h5>
                            <p class="text-muted mb-0">info@cehrdf.org <br>support@cehrdf.org</p>
                        </div>
                    </div>

                    <!-- Google Map Embedded -->
                    <div class="rounded-4 overflow-hidden shadow-sm mt-5"
                        style="height: 250px; border: 4px solid #fff;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118830.37500588661!2d91.90159480397554!3d21.450883656113642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adc7ea2ab928c3%3A0x3b539e0a68970810!2sCox's%20Bazar!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>

                <!-- RIGHT COLUMN: Contact Form -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm rounded-4 h-100" style="background-color: #ffffff;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="fw-bold text-dark mb-4">Send Us a Message</h3>
                            <p class="text-muted mb-5">Fill out the form below and our team will get back to you as soon
                                as possible.</p>

                            <!-- Form Starts Here -->
                            <form action="submit_contact.php" method="POST">

                                <div class="mb-4">
                                    <label for="contactName" class="form-label fw-semibold text-dark">Full Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg bg-light" id="contactName"
                                        name="name" placeholder="John Doe" required>
                                </div>

                                <div class="mb-4">
                                    <label for="contactEmail" class="form-label fw-semibold text-dark">Email Address
                                        <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-lg bg-light" id="contactEmail"
                                        name="email" placeholder="youremail@example.com" required>
                                </div>

                                <div class="mb-4">
                                    <label for="contactMessage" class="form-label fw-semibold text-dark">Message <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control form-control-lg bg-light" id="contactMessage"
                                        name="message" rows="6" placeholder="Write your message here..."
                                        required></textarea>
                                </div>

                                <div class="d-grid mt-5">
                                    <button type="submit"
                                        class="btn btn-primary-custom py-3 fw-bold fs-5 rounded-pill shadow-sm">
                                        Send Message <i class="fas fa-paper-plane ms-2"></i>
                                    </button>
                                </div>

                            </form>
                            <!-- Form Ends Here -->

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
<!-- SECTION END -->
    <!-- =========================================
         CONTACT CONTENT SECTION END
         ========================================= -->


    <!-- =========================================
         FOOTER SECTION START (Shared Component)
         ========================================= -->
    <?php include '../footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Mobile Sidebar Toggle Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuBtn = document.getElementById("mobileMenuBtn");
            const sidebar = document.getElementById("mobileSidebar");

            menuBtn.addEventListener("click", function () {
                sidebar.classList.toggle("active");
                const icon = menuBtn.querySelector("i");
                if (sidebar.classList.contains("active")) {
                    icon.classList.remove("fa-bars");
                    icon.classList.add("fa-times");
                } else {
                    icon.classList.remove("fa-times");
                    icon.classList.add("fa-bars");
                }
            });
        });
    </script>
</body>

</html>
