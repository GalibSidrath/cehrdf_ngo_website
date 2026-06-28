<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Details | CEHRDF</title>
    
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
         SINGLE NOTICE SECTION START
         ========================================= -->
    <!-- SECTION START: py-5 bg-light -->
    <section class="py-5 bg-light">
        <div class="container py-3">
            
            <!-- Document Format Layout -->
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        
                        <!-- Notice Header Info -->
                        <div class="card-header bg-white border-bottom p-4 p-md-5">
                            
                            <!-- Action Buttons (Print/Download) -->
                            <div class="d-flex justify-content-end mb-4 gap-2">
                                <button class="btn btn-sm btn-outline-secondary" onclick="window.print()"><i class="fas fa-print me-1"></i> Print</button>
                            </div>

                            <!-- Official Info -->
                            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                                <div>
                                    <span class="text-muted fw-bold small">Ref No: CEHRDF/2026/TN-45</span>
                                </div>
                                <div>
                                    <span class="text-muted fw-bold small"><i class="far fa-calendar-alt me-1"></i> Date: May 28, 2026</span>
                                </div>
                            </div>

                            <h3 class="fw-bold text-dark lh-sm">Call for Quotation: Solar Panels for Offshore Islands</h3>
                        </div>

                        <!-- Notice Body (CMS Content Goes Here) -->
                        <div class="card-body p-4 p-md-5 fs-6 lh-lg text-dark">
                            
                            <!-- Notice Subject line (Optional) -->
                            <p class="fw-bold mb-4">Subject: Request for Quotation (RFQ) for the supply and installation of Solar Home Systems.</p>

                            <!-- Dynamic Text -->
                            <p>The Centre for Environment, Human Rights & Development Forum (CEHRDF) invites sealed quotations from eligible and registered suppliers for the procurement and installation of Solar Home Systems (SHS) for vulnerable off-grid families in Kutubdia and Moheshkhali upazilas.</p>

                            <p>This initiative is part of our ongoing "Coastal Resilience and Off-Grid Empowerment" project funded by our donor members and partner organizations.</p>

                            <h5 class="fw-bold mt-4 mb-3 text-dark">Scope of Work:</h5>
                            <ul class="text-muted mb-4">
                                <li>Supply of 500 units of 50Wp Solar Panels with required accessories.</li>
                                <li>Supply of Deep Cycle Batteries (12V, 30Ah).</li>
                                <li>Installation at selected beneficiary households.</li>
                                <li>Providing basic operational training to the beneficiaries.</li>
                            </ul>

                            <h5 class="fw-bold mt-4 mb-3 text-dark">Submission Guidelines:</h5>
                            <p>Interested suppliers must submit their quotations along with the following documents:</p>
                            <ol class="text-muted mb-4">
                                <li>Updated Trade License.</li>
                                <li>TIN Certificate and VAT Registration.</li>
                                <li>Bank Solvency Certificate.</li>
                                <li>Experience certificate of similar previous work.</li>
                            </ol>

                            <!-- Notice Footer/Signoff -->
                            <div class="mt-5 pt-4">
                                <p class="mb-0">The deadline for submission is <strong>June 15, 2026, by 03:00 PM</strong>. Quotations must be dropped in the Tender Box kept at the CEHRDF Head Office.</p>
                                
                                <!-- Signature Area -->
                                <div class="mt-5 pt-4">
                                    <p class="fw-bold text-dark mb-0">Md. Ilias Miah</p>
                                    <p class="small text-muted mb-0">Founder & Chief Executive</p>
                                    <p class="small text-muted">CEHRDF</p>
                                </div>
                            </div>
                            
                        </div>
                        <!-- END OF CMS CONTENT -->
                        
                    </div>

                </div>
            </div>
            
        </div>
    </section>
<!-- SECTION END -->
    <!-- =========================================
         SINGLE NOTICE SECTION END
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
