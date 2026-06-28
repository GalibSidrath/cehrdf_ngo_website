<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Minutes | CEHRDF</title>
    
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
         MEETING DETAILS SECTION START
         ========================================= -->
    <!-- SECTION START: py-5 bg-light -->
    <section class="py-5 bg-light">
        <div class="container py-3">
            
            <!-- Centered Layout for Document Style -->
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    

                    <!-- Formal Document Wrapper -->
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        
                        <!-- Document Header -->
                        <div class="card-header bg-white border-bottom p-4 p-md-5">
                            <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
                                <div>
                                    <span class="badge bg-secondary mb-2">Executive Board</span>
                                    <h2 class="fw-bold text-dark mb-0 lh-sm">Executive Board Meeting Q2</h2>
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-outline-secondary btn-sm" onclick="window.print()"><i class="fas fa-print me-1"></i> Print</button>
                                </div>
                            </div>

                            <div class="row g-3 bg-light p-3 rounded-3 border">
                                <div class="col-md-4 col-sm-6">
                                    <small class="text-muted d-block fw-semibold mb-1">Date & Time</small>
                                    <span class="fw-bold text-dark"><i class="far fa-calendar-alt me-1 text-primary-custom"></i> May 10, 2026</span><br>
                                    <span class="small text-muted">10:00 AM - 01:30 PM</span>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <small class="text-muted d-block fw-semibold mb-1">Location</small>
                                    <span class="fw-bold text-dark"><i class="fas fa-map-marker-alt me-1 text-primary-custom"></i> CEHRDF Head Office</span><br>
                                    <span class="small text-muted">Conference Room A</span>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <small class="text-muted d-block fw-semibold mb-1">Presided By</small>
                                    <span class="fw-bold text-dark"><i class="far fa-user me-1 text-primary-custom"></i> Md. Ilias Miah</span><br>
                                    <span class="small text-muted">Founder & Chief Executive</span>
                                </div>
                            </div>
                        </div>

                        <!-- Document Body (CMS Content Goes Here) -->
                        <div class="card-body p-4 p-md-5 fs-6 lh-lg text-dark">
                            
                            <h4 class="fw-bold mb-3 text-primary-custom">1. Meeting Agenda</h4>
                            <ul class="mb-5 text-muted">
                                <li>Review of Q1 financial reports and project milestones.</li>
                                <li>Planning for the upcoming Coastal Reforestation Phase 2 in Teknaf.</li>
                                <li>Approval of budget for the Youth Leadership Bootcamp.</li>
                                <li>Miscellaneous issues and open floor discussion.</li>
                            </ul>

                            <h4 class="fw-bold mb-3 text-primary-custom">2. Key Discussions</h4>
                            <p>The meeting commenced at 10:00 AM with welcoming remarks from the Chief Executive. The board reviewed the progress of the Women's Legal Aid Campaign, noting a 30% increase in outreach compared to the previous quarter. </p>
                            
                            <p>Significant time was dedicated to discussing the logistics of the Coastal Reforestation Phase 2. The Head of Field Operations presented a risk assessment regarding the upcoming monsoon season and suggested accelerating the sapling plantation process by two weeks.</p>

                            <blockquote class="border-start border-4 border-warning ps-4 py-2 my-4 bg-light rounded text-muted fst-italic">
                                "We must ensure that the coastal communities are fully integrated into the reforestation process to guarantee long-term maintenance of the mangroves." - Field Operations Note
                            </blockquote>

                            <h4 class="fw-bold mt-5 mb-3 text-primary-custom">3. Official Resolutions & Decisions</h4>
                            <div class="table-responsive mb-4">
                                <table class="table table-bordered border-secondary align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 15%;">Resolution No.</th>
                                            <th>Decision Details</th>
                                            <th style="width: 20%;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold text-center">RES-26/05</td>
                                            <td>Approved the advancement of the Coastal Reforestation Phase 2 start date to May 25, 2026.</td>
                                            <td><span class="badge bg-success">Passed</span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-center">RES-26/06</td>
                                            <td>Allocated an additional fund of BDT 50,000 for emergency medical supplies for the Youth Bootcamp.</td>
                                            <td><span class="badge bg-success">Passed</span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-center">RES-26/07</td>
                                            <td>Proposal to expand the Legal Aid Campaign to Noakhali district.</td>
                                            <td><span class="badge bg-warning text-dark">Pending Review</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h4 class="fw-bold mt-5 mb-3 text-primary-custom">4. Next Meeting Schedule</h4>
                            <p>The next Executive Board Meeting is tentatively scheduled for <strong>August 15, 2026</strong>. The formal notice will be published on the notice board 15 days prior to the meeting.</p>
                            
                        </div>
                        <!-- END OF CMS CONTENT -->

                        <!-- Document Footer -->
                        <div class="card-footer bg-light border-top p-4 text-center">
                            <p class="small text-muted mb-0">These minutes are system generated and officially recorded by the CEHRDF administration.</p>
                        </div>
                        
                    </div>

                </div>
            </div>
            
        </div>
    </section>
<!-- SECTION END -->
    <!-- =========================================
         MEETING DETAILS SECTION END
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
