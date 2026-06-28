<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details | CEHRDF</title>
    
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
         JOB DETAILS SECTION START
         ========================================= -->
    <!-- SECTION START: py-5 bg-white -->
    <section class="py-5 bg-white">
        <div class="container py-3">
            
            <div class="row g-5">
                
                <!-- LEFT COLUMN: Job Description (CMS Content) -->
                <div class="col-lg-12 card border-0 shadow-sm rounded-4 overflow-hidden p-4 p-md-5">
                    
                    <!-- Job Header -->
                    <div class="mb-5 border-bottom pb-4">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="badge bg-primary-custom px-3 py-2 rounded-pill shadow-sm">Full Time</span>
                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">Research Department</span>
                        </div>
                        <h1 class="fw-bold text-dark lh-sm mb-3">Field Research Officer</h1>
                        <p class="text-muted fs-5 mb-0">Join our team to lead grassroots research on climate vulnerability and adaptation strategies in the coastal belt of Bangladesh.</p>
                    </div>

                    <!-- Job Body (CMS Area Start) -->
                    <div class="fs-6 lh-lg text-dark">
                        
                        <h4 class="fw-bold mb-3 text-dark">About the Role</h4>
                        <p>The Centre for Environment, Human Rights & Development Forum (CEHRDF) is seeking a highly motivated and detail-oriented Field Research Officer. In this role, you will be responsible for designing and executing field surveys, collecting primary data from marginalized coastal communities, and assisting in the preparation of impact reports.</p>
                        <p>You will work directly under the Project Manager and coordinate with local government bodies and partner NGOs to ensure data accuracy and community engagement.</p>

                        <h4 class="fw-bold mt-5 mb-3 text-dark">Key Responsibilities</h4>
                        <ul class="mb-4 text-muted">
                            <li class="mb-2">Conduct field surveys and interviews in remote coastal areas (Teknaf, Moheshkhali, Kutubdia).</li>
                            <li class="mb-2">Collect, compile, and analyze qualitative and quantitative data regarding climate change impact.</li>
                            <li class="mb-2">Assist in organizing Focus Group Discussions (FGDs) with local fishermen and farmers.</li>
                            <li class="mb-2">Prepare monthly field reports and assist in drafting the Annual Impact Report.</li>
                            <li class="mb-2">Maintain strong relationships with local stakeholders and community leaders.</li>
                        </ul>

                        <h4 class="fw-bold mt-5 mb-3 text-dark">Requirements & Qualifications</h4>
                        <ul class="mb-4 text-muted">
                            <li class="mb-2">Bachelor’s or Master’s degree in Environmental Science, Sociology, Development Studies, or a related field.</li>
                            <li class="mb-2">Minimum 2 years of proven experience in field research or NGO data collection.</li>
                            <li class="mb-2">Strong understanding of disaster risk reduction (DRR) and climate adaptation strategies.</li>
                            <li class="mb-2">Excellent communication skills in Bengali (local Chittagonian dialect is a strong plus) and English.</li>
                            <li class="mb-2">Willingness to travel frequently to remote and challenging coastal environments.</li>
                        </ul>

                        <h4 class="fw-bold mt-5 mb-3 text-dark">What We Offer</h4>
                        <ul class="mb-4 text-muted">
                            <li class="mb-2">Competitive salary based on experience.</li>
                            <li class="mb-2">Festival bonuses and travel allowances.</li>
                            <li class="mb-2">Opportunities for national and international training/workshops.</li>
                            <li class="mb-2">A highly supportive and impact-driven work environment.</li>
                        </ul>

                    </div>
                    <!-- Job Body (CMS Area End) -->

                     <a href="jobapplicationform.php" target="_blank" class="btn btn-primary-custom w-100 py-3 fw-bold fs-5 rounded-pill shadow-sm">Apply Now</a>

                </div>


            </div>
        </div>
    </section>
<!-- SECTION END -->
    <!-- =========================================
         JOB DETAILS SECTION END
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
