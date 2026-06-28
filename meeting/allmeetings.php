<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Meetings | CEHRDF</title>
    
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
         MEETINGS PAGE BANNER START
         ========================================= -->
    <!-- SECTION START: text-center text-white py-5 -->
    <section class="text-center text-white py-5" style="background: linear-gradient(rgba(23, 37, 42, 0.8), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1515187029135-18ee286d815b?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 80px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Meetings & Minutes</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Keep track of our organizational decisions, community forums, executive board meetings, and official resolutions.</p>
        </div>
    </section>
<!-- SECTION END -->
    <!-- =========================================
         MEETINGS PAGE BANNER END
         ========================================= -->


    <!-- =========================================
         MEETINGS LIST SECTION START
         ========================================= -->
    <!-- SECTION START: py-5 bg-light -->
    <section class="py-5 bg-light">
        <div class="container py-3">
            
            <!-- Meetings List Wrapper (Centered, 1 Column) -->
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <!-- Meeting Item 1 -->
                    <div class="card border-0 shadow-sm mb-4 hover-lift" style="border-left: 4px solid #2b7a78 !important; background-color: #ffffff;">
                        <a href="singlemeeting.php" class="text-decoration-none">
                            <div class="card-body p-4 d-flex flex-column flex-md-row align-items-md-center gap-3">
                                <div class="text-muted fw-bold d-flex align-items-center" style="min-width: 160px;">
                                    <i class="far fa-calendar-alt me-2 text-primary-custom fs-5"></i> May 10, 2026
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold text-dark mb-1">Executive Board Meeting Q2</h5>
                                    <p class="text-muted small mb-0">Quarterly review of ongoing projects and financial planning.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Meeting Item 2 -->
                    <div class="card border-0 shadow-sm mb-4 hover-lift" style="border-left: 4px solid #2b7a78 !important; background-color: #ffffff;">
                        <a href="#" class="text-decoration-none">
                            <div class="card-body p-4 d-flex flex-column flex-md-row align-items-md-center gap-3">
                                <div class="text-muted fw-bold d-flex align-items-center" style="min-width: 160px;">
                                    <i class="far fa-calendar-alt me-2 text-primary-custom fs-5"></i> Apr 05, 2026
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold text-dark mb-1">Community Stakeholder Forum</h5>
                                    <p class="text-muted small mb-0">Discussion on establishing new coastal resilience committees.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Meeting Item 3 -->
                    <div class="card border-0 shadow-sm mb-4 hover-lift" style="border-left: 4px solid #2b7a78 !important; background-color: #ffffff;">
                        <a href="#" class="text-decoration-none">
                            <div class="card-body p-4 d-flex flex-column flex-md-row align-items-md-center gap-3">
                                <div class="text-muted fw-bold d-flex align-items-center" style="min-width: 160px;">
                                    <i class="far fa-calendar-alt me-2 text-primary-custom fs-5"></i> Mar 15, 2026
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold text-dark mb-1">Annual General Meeting (AGM) 2025-2026</h5>
                                    <p class="text-muted small mb-0">Yearly impact review, financial audits, and election of new board members.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Meeting Item 4 -->
                    <div class="card border-0 shadow-sm mb-4 hover-lift" style="border-left: 4px solid #2b7a78 !important; background-color: #ffffff;">
                        <a href="#" class="text-decoration-none">
                            <div class="card-body p-4 d-flex flex-column flex-md-row align-items-md-center gap-3">
                                <div class="text-muted fw-bold d-flex align-items-center" style="min-width: 160px;">
                                    <i class="far fa-calendar-alt me-2 text-primary-custom fs-5"></i> Feb 22, 2026
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold text-dark mb-1">Emergency Humanitarian Response Planning</h5>
                                    <p class="text-muted small mb-0">Special meeting to coordinate relief efforts for the early monsoon floods.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Meeting Item 5 -->
                    <div class="card border-0 shadow-sm mb-4 hover-lift" style="border-left: 4px solid #2b7a78 !important; background-color: #ffffff;">
                        <a href="#" class="text-decoration-none">
                            <div class="card-body p-4 d-flex flex-column flex-md-row align-items-md-center gap-3">
                                <div class="text-muted fw-bold d-flex align-items-center" style="min-width: 160px;">
                                    <i class="far fa-calendar-alt me-2 text-primary-custom fs-5"></i> Jan 10, 2026
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold text-dark mb-1">Executive Board Meeting Q1</h5>
                                    <p class="text-muted small mb-0">Setting organizational goals and budget allocation for the new calendar year.</p>
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
         MEETINGS LIST SECTION END
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
