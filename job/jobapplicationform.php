<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Job | CEHRDF</title>
    
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
         APPLY PAGE BANNER START
         ========================================= -->
    <!-- SECTION START: text-center text-white py-5 -->
    <section class="text-center text-white py-5" style="background: linear-gradient(rgba(23, 37, 42, 0.85), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 60px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Job Application Form</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Take the next step in your career. Fill out the form below to apply for an open position at CEHRDF.</p>
        </div>
    </section>
<!-- SECTION END -->
    <!-- =========================================
         APPLY PAGE BANNER END
         ========================================= -->


    <!-- =========================================
         APPLICATION FORM SECTION START
         ========================================= -->
    <!-- SECTION START: py-5 bg-light -->
    <section class="py-5 bg-light">
        <div class="container py-3">
            

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                        
                        <!-- Form Starts Here -->
                        <form action="submit_application.php" method="POST" enctype="multipart/form-data">
                            
                            <!-- 1. Position Selection -->
                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3" style="border-color: #2b7a78 !important;">Select Position</h5>
                            <div class="row g-3 mb-5">
                                <div class="col-12">
                                    <label for="jobPosition" class="form-label fw-semibold">Applying For <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-lg" id="jobPosition" name="position_id" required>
                                        <option value="" selected disabled>Select an open position...</option>
                                        <!-- These options will be populated dynamically from your database -->
                                        <option value="1">Field Research Officer</option>
                                        <option value="2">Project Manager - Coastal Resilience</option>
                                        <option value="3">Legal Aid Coordinator</option>
                                        <option value="4">Emergency Response Volunteer</option>
                                    </select>
                                </div>
                            </div>

                            <!-- 2. Personal Information -->
                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3" style="border-color: #2b7a78 !important;">Personal Information</h5>
                            <div class="row g-3 mb-5">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label fw-semibold">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" placeholder="John" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label fw-semibold">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Doe" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="emailAddress" class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="emailAddress" name="email" placeholder="john.doe@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phoneNumber" class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="phoneNumber" name="phone" placeholder="+880 1XXXXXXXXX" required>
                                </div>
                                <div class="col-12">
                                    <label for="currentAddress" class="form-label fw-semibold">Current Address</label>
                                    <input type="text" class="form-control" id="currentAddress" name="address" placeholder="123 Street, City, District">
                                </div>
                            </div>

                            <!-- 3. Educational Background -->
                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3" style="border-color: #2b7a78 !important;">Educational Background</h5>
                            <div class="row g-3 mb-5">
                                <div class="col-md-4">
                                    <label for="highestDegree" class="form-label fw-semibold">Highest Degree <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="highestDegree" name="degree" placeholder="e.g. BSc in Environmental Science" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="institutionName" class="form-label fw-semibold">Institution Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="institutionName" name="institution" placeholder="University Name" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="passingYear" class="form-label fw-semibold">Passing Year</label>
                                    <input type="number" class="form-control" id="passingYear" name="passing_year" placeholder="e.g. 2024">
                                </div>
                            </div>

                            <!-- 4. Cover Letter & CV Upload -->
                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3" style="border-color: #2b7a78 !important;">Additional Details</h5>
                            <div class="row g-3 mb-5">
                                <div class="col-12">
                                    <label for="coverLetter" class="form-label fw-semibold">Cover Letter / Message</label>
                                    <textarea class="form-control" id="coverLetter" name="cover_letter" rows="5" placeholder="Tell us why you are a great fit for this role..."></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <label for="cvUpload" class="form-label fw-semibold">Upload CV/Resume <span class="text-danger">*</span></label>
                                    <input class="form-control form-control-lg" type="file" id="cvUpload" name="cv_file" accept=".pdf,.doc,.docx" required>
                                    <div class="form-text mt-2"><i class="fas fa-info-circle me-1"></i> Accepted formats: PDF, DOC, DOCX. Max file size: 5MB.</div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-primary-custom py-3 fw-bold fs-5 rounded-pill shadow-sm">Submit Application</button>
                            </div>

                        </form>
                        <!-- Form Ends Here -->

                    </div>
                </div>
            </div>

        </div>
    </section>
<!-- SECTION END -->
    <!-- =========================================
         APPLICATION FORM SECTION END
         ========================================= -->


    <!-- =========================================
         FOOTER SECTION START (Shared Component)
         ========================================= -->

    <?php include '../footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Mobile Sidebar Toggle Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuBtn = document.getElementById("mobileMenuBtn");
            const sidebar = document.getElementById("mobileSidebar");
            
            menuBtn.addEventListener("click", function() {
                sidebar.classList.toggle("active");
                const icon = menuBtn.querySelector("i");
                if(sidebar.classList.contains("active")) {
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
