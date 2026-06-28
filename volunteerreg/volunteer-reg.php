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
    <!-- SECTION START: text-center text-white py-5 -->
    <section class="text-center text-white py-5" style="background: linear-gradient(rgba(23, 37, 42, 0.85), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1593113563332-e14b51139dce?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 60px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Become a Volunteer</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Join our network of passionate changemakers. Dedicate your time and skills to protect the environment and empower coastal communities.</p>
        </div>
    </section>
<!-- SECTION END -->
    <!-- SECTION START: py-5 bg-light -->
    <section class="py-5 bg-light">
        <div class="container py-3">

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                        
                        <form action="submit_volunteer.php" method="POST">
                            
                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3" style="border-color: #2b7a78 !important;">Personal Information</h5>
                            <div class="row g-3 mb-5">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label fw-semibold">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" placeholder="E.g. Hasan" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label fw-semibold">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lastName" name="last_name" placeholder="E.g. Mahmud" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="emailAddress" class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="emailAddress" name="email" placeholder="youremail@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phoneNumber" class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="phoneNumber" name="phone" placeholder="+880 1XXXXXXXXX" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="dob" class="form-label fw-semibold">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="dob" name="dob" required>
                                </div>
                                <div class="col-md-8">
                                    <label for="currentAddress" class="form-label fw-semibold">Current Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="currentAddress" name="address" placeholder="123 Street, City, District" required>
                                </div>
                            </div>

                            <h5 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3" style="border-color: #2b7a78 !important;">Background</h5>
                            <div class="row g-3 mb-5">
                                <div class="col-md-6">
                                    <label for="occupation" class="form-label fw-semibold">Current Occupation <span class="text-danger">*</span></label>
                                    <select class="form-select" id="occupation" name="occupation" required>
                                        <option value="" selected disabled>Select your occupation...</option>
                                        <option value="student">Student</option>
                                        <option value="employed">Employed Professional</option>
                                        <option value="freelancer">Freelancer / Self-Employed</option>
                                        <option value="unemployed">Currently Unemployed</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="institution" class="form-label fw-semibold">Institution / Organization</label>
                                    <input type="text" class="form-control" id="institution" name="institution" placeholder="University or Company Name">
                                </div>
                            </div>
                                
                                <div class="col-md-6">
                                    <label for="availability" class="form-label fw-semibold">Availability <span class="text-danger">*</span></label>
                                    <select class="form-select" id="availability" name="availability" required>
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
                                    <label for="experience" class="form-label fw-semibold">Do you have any previous volunteering experience? (Optional)</label>
                                    <textarea class="form-control" id="experience" name="experience" rows="3" placeholder="Briefly describe your past experience, if any..."></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <label for="motivation" class="form-label fw-semibold">Why do you want to join CEHRDF? <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="motivation" name="motivation" rows="4" placeholder="Share your motivation for joining our network..." required></textarea>
                                </div>
                            </div>


                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-primary-custom py-3 fw-bold fs-5 rounded-pill shadow-sm">Submit Registration</button>
                            </div>

                        </form>
                        </div>
                </div>
            </div>

        </div>
    </section>
<!-- SECTION END -->
    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
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
