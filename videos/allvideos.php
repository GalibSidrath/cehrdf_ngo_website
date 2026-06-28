<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentaries & Videos | CEHRDF</title>
    
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
         VIDEOS PAGE BANNER START
         ========================================= -->
    <!-- SECTION START: text-center text-white py-5 -->
    <section class="text-center text-white py-5" style="background: linear-gradient(rgba(23, 37, 42, 0.85), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1601506521937-0121a7fc2a6b?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 80px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Our Documentaries</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Watch the untold stories of resilience, climate adaptation, and community empowerment from the coastal regions of Bangladesh.</p>
        </div>
    </section>
<!-- SECTION END -->
    <!-- =========================================
         VIDEOS PAGE BANNER END
         ========================================= -->


    <!-- =========================================
         VIDEOS GRID SECTION START
         ========================================= -->
    <!-- SECTION START: py-5 bg-light -->
    <section class="py-5 bg-light">
        <div class="container py-3">
            

            <div class="row g-4">
                
                <!-- Video Card 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 rounded-4 shadow-sm hover-lift overflow-hidden">
                        <a href="#" class="text-decoration-none d-block position-relative">
                            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=600&q=80" class="card-img-top object-fit-cover" alt="Video Thumbnail" style="height: 220px;">
                            
                            <!-- Play Button Overlay -->
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <div class="bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center shadow-lg" style="width: 60px; height: 60px; opacity: 0.9;">
                                    <i class="fas fa-play fs-4 ms-1"></i>
                                </div>
                            </div>
                            
                            <!-- Video Duration Badge (Optional but looks professional) -->
                            <div class="position-absolute bottom-0 end-0 m-2">
                                <span class="badge bg-dark opacity-75 px-2 py-1">12:45</span>
                            </div>
                        </a>
                        <div class="card-body p-4 d-flex flex-column">
                            <p class="text-primary-custom small fw-bold mb-2"><i class="far fa-calendar-alt me-1"></i> May 15, 2026</p>
                            <h5 class="card-title fw-bold text-dark mb-3">The Resilient Coast: Voices of the South</h5>
                            <p class="card-text text-muted small mb-4 flex-grow-1">A short documentary highlighting how marginalized fishermen communities are adapting to the rising sea levels in Cox's Bazar.</p>
                            <a href="#" class="text-decoration-none fw-bold text-primary-custom border-top pt-3 d-inline-block w-100">Watch Now <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Video Card 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 rounded-4 shadow-sm hover-lift overflow-hidden">
                        <a href="#" class="text-decoration-none d-block position-relative">
                            <img src="https://images.unsplash.com/photo-1529156069898-49953eb1b5b1?auto=format&fit=crop&w=600&q=80" class="card-img-top object-fit-cover" alt="Video Thumbnail" style="height: 220px;">
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <div class="bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center shadow-lg" style="width: 60px; height: 60px; opacity: 0.9;">
                                    <i class="fas fa-play fs-4 ms-1"></i>
                                </div>
                            </div>
                            <div class="position-absolute bottom-0 end-0 m-2">
                                <span class="badge bg-dark opacity-75 px-2 py-1">08:20</span>
                            </div>
                        </a>
                        <div class="card-body p-4 d-flex flex-column">
                            <p class="text-primary-custom small fw-bold mb-2"><i class="far fa-calendar-alt me-1"></i> April 22, 2026</p>
                            <h5 class="card-title fw-bold text-dark mb-3">Youth Action in Climate Crisis</h5>
                            <p class="card-text text-muted small mb-4 flex-grow-1">Watch our youth volunteers undergo rigorous training for disaster risk reduction and emergency response.</p>
                            <a href="#" class="text-decoration-none fw-bold text-primary-custom border-top pt-3 d-inline-block w-100">Watch Now <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Video Card 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 rounded-4 shadow-sm hover-lift overflow-hidden">
                        <a href="#" class="text-decoration-none d-block position-relative">
                            <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=600&q=80" class="card-img-top object-fit-cover" alt="Video Thumbnail" style="height: 220px;">
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <div class="bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center shadow-lg" style="width: 60px; height: 60px; opacity: 0.9;">
                                    <i class="fas fa-play fs-4 ms-1"></i>
                                </div>
                            </div>
                            <div class="position-absolute bottom-0 end-0 m-2">
                                <span class="badge bg-dark opacity-75 px-2 py-1">15:10</span>
                            </div>
                        </a>
                        <div class="card-body p-4 d-flex flex-column">
                            <p class="text-primary-custom small fw-bold mb-2"><i class="far fa-calendar-alt me-1"></i> March 08, 2026</p>
                            <h5 class="card-title fw-bold text-dark mb-3">Empowering Rural Women: Legal Rights Campaign</h5>
                            <p class="card-text text-muted small mb-4 flex-grow-1">A profound look into our nationwide campaign educating women on fundamental laws and protecting them from domestic violence.</p>
                            <a href="#" class="text-decoration-none fw-bold text-primary-custom border-top pt-3 d-inline-block w-100">Watch Now <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Video Card 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 rounded-4 shadow-sm hover-lift overflow-hidden">
                        <a href="#" class="text-decoration-none d-block position-relative">
                            <img src="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?auto=format&fit=crop&w=600&q=80" class="card-img-top object-fit-cover" alt="Video Thumbnail" style="height: 220px;">
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <div class="bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center shadow-lg" style="width: 60px; height: 60px; opacity: 0.9;">
                                    <i class="fas fa-play fs-4 ms-1"></i>
                                </div>
                            </div>
                            <div class="position-absolute bottom-0 end-0 m-2">
                                <span class="badge bg-dark opacity-75 px-2 py-1">05:45</span>
                            </div>
                        </a>
                        <div class="card-body p-4 d-flex flex-column">
                            <p class="text-primary-custom small fw-bold mb-2"><i class="far fa-calendar-alt me-1"></i> February 10, 2026</p>
                            <h5 class="card-title fw-bold text-dark mb-3">Reforestation Impact: Greening the Bay</h5>
                            <p class="card-text text-muted small mb-4 flex-grow-1">Visualizing the incredible effort of our volunteers planting over 50,000 mangrove saplings to protect the shoreline.</p>
                            <a href="#" class="text-decoration-none fw-bold text-primary-custom border-top pt-3 d-inline-block w-100">Watch Now <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Video Card 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 rounded-4 shadow-sm hover-lift overflow-hidden">
                        <a href="#" class="text-decoration-none d-block position-relative">
                            <img src="https://images.unsplash.com/photo-1594708767771-a7502209ff51?auto=format&fit=crop&w=600&q=80" class="card-img-top object-fit-cover" alt="Video Thumbnail" style="height: 220px;">
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <div class="bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center shadow-lg" style="width: 60px; height: 60px; opacity: 0.9;">
                                    <i class="fas fa-play fs-4 ms-1"></i>
                                </div>
                            </div>
                            <div class="position-absolute bottom-0 end-0 m-2">
                                <span class="badge bg-dark opacity-75 px-2 py-1">09:30</span>
                            </div>
                        </a>
                        <div class="card-body p-4 d-flex flex-column">
                            <p class="text-primary-custom small fw-bold mb-2"><i class="far fa-calendar-alt me-1"></i> January 05, 2026</p>
                            <h5 class="card-title fw-bold text-dark mb-3">Lighting Up Maheshkhali</h5>
                            <p class="card-text text-muted small mb-4 flex-grow-1">A story of transformation as we installed 500 off-grid solar panels in the remote villages of Maheshkhali Island.</p>
                            <a href="#" class="text-decoration-none fw-bold text-primary-custom border-top pt-3 d-inline-block w-100">Watch Now <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Video Card 6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 rounded-4 shadow-sm hover-lift overflow-hidden">
                        <a href="#" class="text-decoration-none d-block position-relative">
                            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=600&q=80" class="card-img-top object-fit-cover" alt="Video Thumbnail" style="height: 220px;">
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <div class="bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center shadow-lg" style="width: 60px; height: 60px; opacity: 0.9;">
                                    <i class="fas fa-play fs-4 ms-1"></i>
                                </div>
                            </div>
                            <div class="position-absolute bottom-0 end-0 m-2">
                                <span class="badge bg-dark opacity-75 px-2 py-1">04:15</span>
                            </div>
                        </a>
                        <div class="card-body p-4 d-flex flex-column">
                            <p class="text-primary-custom small fw-bold mb-2"><i class="far fa-calendar-alt me-1"></i> December 20, 2025</p>
                            <h5 class="card-title fw-bold text-dark mb-3">Year in Review: 2025 Impact Journey</h5>
                            <p class="card-text text-muted small mb-4 flex-grow-1">A quick retrospective of CEHRDF's projects, milestones, and the communities we touched throughout the year.</p>
                            <a href="#" class="text-decoration-none fw-bold text-primary-custom border-top pt-3 d-inline-block w-100">Watch Now <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
<!-- SECTION END -->
    <!-- =========================================
         VIDEOS GRID SECTION END
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
