<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board | CEHRDF</title>
    
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
         NOTICES PAGE BANNER START
         ========================================= -->
    <!-- SECTION START: text-center text-white py-5 -->
    <section class="text-center text-white py-5" style="background: linear-gradient(rgba(23, 37, 42, 0.85), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 80px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Notice Board</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Stay updated with our official announcements, tender calls, job circulars, and administrative notices.</p>
        </div>
    </section>
<!-- SECTION END -->
    <!-- =========================================
         NOTICES PAGE BANNER END
         ========================================= -->


    <!-- =========================================
         NOTICE LIST SECTION START
         ========================================= -->
    <!-- SECTION START: py-5 bg-light -->
    <section class="py-5 bg-light">
        <div class="container py-3">
            
            <div class=" mb-4">
                <h2 class="fw-bold mb-0 text-center">All Notices</h2>
            </div>

            <!-- Notices List Wrapper (Centered, 1 Column) -->
            <div class="row justify-content-center">
                <div class="col-lg-9">

                    <!-- Notice Item 1 -->
                    <div class="card border-0 shadow-sm mb-4 hover-lift" style="border-left: 4px solid #2b7a78 !important; background-color: #ffffff; border-radius: 12px;">
                        <a href="singlenotice.php" target="_blank" class="text-decoration-none">
                            <div class="card-body p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                                <div>
                                    <h5 class="fw-bold text-dark mb-2">Call for Quotation: Solar Panels for Offshore Islands</h5>
                                    <div class="d-flex gap-3 text-muted small fw-semibold">
                                        <span><i class="far fa-calendar-plus me-1 text-primary-custom"></i> Published: May 28, 2026</span>
                                    </div>
                                </div>
                                <div class="text-md-end mt-3 mt-md-0">
                                    <span class="btn btn-sm btn-outline-primary-custom fw-bold rounded-pill px-4">View Full Notice <i class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Notice Item 2 -->
                    <div class="card border-0 shadow-sm mb-4 hover-lift" style="border-left: 4px solid #2b7a78 !important; background-color: #ffffff; border-radius: 12px;">
                        <a href="#" class="text-decoration-none">
                            <div class="card-body p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                                <div>
                                    <h5 class="fw-bold text-dark mb-2">Vacancy Announcement: Field Research Officer</h5>
                                    <div class="d-flex gap-3 text-muted small fw-semibold">
                                        <span><i class="far fa-calendar-plus me-1 text-primary-custom"></i> Published: May 25, 2026</span>
                                    </div>
                                </div>
                                <div class="text-md-end mt-3 mt-md-0">
                                    <span class="btn btn-sm btn-outline-primary-custom fw-bold rounded-pill px-4">View Full Notice <i class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Notice Item 3 -->
                    <div class="card border-0 shadow-sm mb-4 hover-lift" style="border-left: 4px solid #2b7a78 !important; background-color: #ffffff; border-radius: 12px;">
                        <a href="#" class="text-decoration-none">
                            <div class="card-body p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                                <div>
                                    <h5 class="fw-bold text-dark mb-2">Annual General Meeting (AGM) Schedule Published</h5>
                                    <div class="d-flex gap-3 text-muted small fw-semibold">
                                        <span><i class="far fa-calendar-plus me-1 text-primary-custom"></i> Published: May 20, 2026</span>
                                    </div>
                                </div>
                                <div class="text-md-end mt-3 mt-md-0">
                                    <span class="btn btn-sm btn-outline-primary-custom fw-bold rounded-pill px-4">View Full Notice <i class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Notice Item 4 -->
                    <div class="card border-0 shadow-sm mb-4 hover-lift" style="border-left: 4px solid #2b7a78 !important; background-color: #ffffff; border-radius: 12px;">
                        <a href="#" class="text-decoration-none">
                            <div class="card-body p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                                <div>
                                    <h5 class="fw-bold text-dark mb-2">Office Relocation Notice: Chittagong Branch</h5>
                                    <div class="d-flex gap-3 text-muted small fw-semibold">
                                        <span><i class="far fa-calendar-plus me-1 text-primary-custom"></i> Published: May 15, 2026</span>
                                    </div>
                                </div>
                                <div class="text-md-end mt-3 mt-md-0">
                                    <span class="btn btn-sm btn-outline-primary-custom fw-bold rounded-pill px-4">View Full Notice <i class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Notice Item 5 -->
                    <div class="card border-0 shadow-sm mb-4 hover-lift" style="border-left: 4px solid #2b7a78 !important; background-color: #ffffff; border-radius: 12px;">
                        <a href="#" class="text-decoration-none">
                            <div class="card-body p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                                <div>
                                    <h5 class="fw-bold text-dark mb-2">Result: Supply of Mangrove Saplings for Phase 2</h5>
                                    <div class="d-flex gap-3 text-muted small fw-semibold">
                                        <span><i class="far fa-calendar-plus me-1 text-primary-custom"></i> Published: May 10, 2026</span>
                                    </div>
                                </div>
                                <div class="text-md-end mt-3 mt-md-0">
                                    <span class="btn btn-sm btn-outline-primary-custom fw-bold rounded-pill px-4">View Full Notice <i class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </section>
<!-- SECTION END -->
    <!-- =========================================
         NOTICE LIST SECTION END
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
