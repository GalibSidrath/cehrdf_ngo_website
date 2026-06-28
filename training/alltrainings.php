<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Trainings | CEHRDF</title>
    
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
         TRAININGS PAGE BANNER START
         ========================================= -->
    <!-- SECTION START: text-center text-white py-5 -->
    <section class="text-center text-white py-5" style="background: linear-gradient(rgba(23, 37, 42, 0.8), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 80px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Our Trainings</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Empowering volunteers, youth leaders, and community members with the skills needed to drive sustainable change.</p>
        </div>
    </section>
<!-- SECTION END -->
    <!-- =========================================
         TRAININGS PAGE BANNER END
         ========================================= -->


    <!-- =========================================
         TRAININGS LIST SECTION START
         ========================================= -->
    <!-- SECTION START: py-5 bg-light -->
    <section class="py-5 bg-light">
        <div class="container py-3">
            

            <!-- Training Cards Wrapper (1 Column, Centered for better UI) -->
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <!-- Training Card 1 (Upcoming) -->
                    <div class="card border-0 shadow-sm mb-4 training-card overflow-hidden rounded-4">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4 h-100">
                                <img src="https://images.unsplash.com/photo-1529156069898-49953eb1b5b1?auto=format&fit=crop&w=600&q=80" class="img-fluid h-100 object-fit-cover w-100" alt="Training Image" style="min-height: 220px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-warning text-dark border px-3 py-2 rounded-pill">Upcoming</span>
                                        <span class="text-muted fw-bold small"><i class="far fa-calendar-alt me-1"></i> July 15-17, 2026</span>
                                    </div>
                                    <h4 class="fw-bold mb-2 text-dark">Youth Leadership & DRR Bootcamp</h4>
                                    <p class="text-muted mb-4 lh-lg">An intensive 3-day bootcamp focused on Disaster Risk Reduction (DRR) strategies, community organizing, and emergency response planning for coastal youth leaders.</p>
                                    <a href="singletraining.php" class="btn btn-outline-primary-custom px-4 fw-bold rounded-pill">View Full Details <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Training Card 2 (Ongoing) -->
                    <div class="card border-0 shadow-sm mb-4 training-card overflow-hidden rounded-4">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4 h-100">
                                <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=600&q=80" class="img-fluid h-100 object-fit-cover w-100" alt="Training Image" style="min-height: 220px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-success border px-3 py-2 rounded-pill">Ongoing</span>
                                        <span class="text-muted fw-bold small"><i class="far fa-calendar-alt me-1"></i> June 01-30, 2026</span>
                                    </div>
                                    <h4 class="fw-bold mb-2 text-dark">Field Research Methodology & Data Collection</h4>
                                    <p class="text-muted mb-4 lh-lg">Equipping our field volunteers and research assistants with modern data collection techniques, ethical research guidelines, and surveying tools for climate impact studies.</p>
                                    <a href="#" class="btn btn-outline-primary-custom px-4 fw-bold rounded-pill">View Full Details <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Training Card 3 (Finished) -->
                    <div class="card border-0 shadow-sm mb-4 training-card overflow-hidden rounded-4">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4 h-100">
                                <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=600&q=80" class="img-fluid h-100 object-fit-cover w-100" alt="Training Image" style="min-height: 220px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-secondary border px-3 py-2 rounded-pill">Finished</span>
                                        <span class="text-muted fw-bold small"><i class="far fa-calendar-alt me-1"></i> May 10-12, 2026</span>
                                    </div>
                                    <h4 class="fw-bold mb-2 text-dark">First Aid & Emergency Medical Relief</h4>
                                    <p class="text-muted mb-4 lh-lg">A pre-monsoon training program that certified 100+ local volunteers in primary first aid, CPR, and crisis management to handle flood-related emergencies.</p>
                                    <a href="#" class="btn btn-outline-primary-custom px-4 fw-bold rounded-pill">View Full Details <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Training Card 4 (Finished) -->
                    <div class="card border-0 shadow-sm mb-4 training-card overflow-hidden rounded-4">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4 h-100">
                                <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=600&q=80" class="img-fluid h-100 object-fit-cover w-100" alt="Training Image" style="min-height: 220px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-secondary border px-3 py-2 rounded-pill">Finished</span>
                                        <span class="text-muted fw-bold small"><i class="far fa-calendar-alt me-1"></i> April 20-22, 2026</span>
                                    </div>
                                    <h4 class="fw-bold mb-2 text-dark">Women's Rights & Legal Advocacy Workshop</h4>
                                    <p class="text-muted mb-4 lh-lg">Empowering community female leaders with knowledge about fundamental rights, domestic violence laws, and the procedures for seeking free legal consultation.</p>
                                    <a href="#" class="btn btn-outline-primary-custom px-4 fw-bold rounded-pill">View Full Details <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
<!-- SECTION END -->
    <!-- =========================================
         TRAININGS LIST SECTION END
         ========================================= -->


    <!-- =========================================
         FOOTER SECTION START (Shared Component)
         ========================================= -->
    <!-- Impact Stats -->

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
