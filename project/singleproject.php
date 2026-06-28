<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details | CEHRDF</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../styles.css">

</head>

<body class="bg-light">

    <?php include '../header.php'; ?>
    <section class="py-5 bg-white">
        <div class="container py-3">
            
            

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    
                    <div class="text-center mb-5">
                        <div class="d-flex justify-content-center gap-2 mb-3">
                            <span class="badge bg-success border px-3 py-2 rounded-pill shadow-sm">Ongoing</span>
                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill shadow-sm"><i class="fas fa-map-marker-alt text-danger me-1"></i> Teknaf, Cox's Bazar</span>
                        </div>
                        <h1 class="fw-bold text-dark lh-sm mb-3 display-5">Coastal Reforestation Initiative</h1>
                        <p class="fs-5 text-muted w-md-75 mx-auto">A mass planting campaign of mangrove saplings to protect vulnerable shorelines from soil erosion and cyclonic storm surges.</p>
                    </div>

                    <div class="mb-5">
                        <img src="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?auto=format&fit=crop&w=1200&q=80" class="img-fluid rounded-4 shadow w-100 object-fit-cover" alt="Project Cover" style="max-height: 500px;">
                    </div>

                    <div class="fs-5 lh-lg text-dark bg-white p-4 p-md-5 rounded-4 shadow-sm border">
                        
                        <h3 class="fw-bold mb-3 border-start border-4 border-primary ps-3" style="border-color: #2b7a78 !important;">Project Overview</h3>
                        <p>The coastal regions of Bangladesh are at the forefront of climate change impacts. Rising sea levels and frequent cyclones pose a severe threat to local communities. The <strong>Coastal Reforestation Initiative</strong> was launched to create a natural green belt along the vulnerable shorelines of Teknaf.</p>
                        
                        <p>By planting thousands of mangrove saplings, this project not only aims to prevent soil erosion but also restores the natural habitat for marine and coastal wildlife.</p>

                        <h4 class="fw-bold mt-5 mb-3">Key Objectives</h4>
                        <ul class="mb-4">
                            <li><strong>Ecological Restoration:</strong> Plant and nurture 50,000 mangrove trees over a span of two years.</li>
                            <li><strong>Community Empowerment:</strong> Engage local youth and women in the nursery management and plantation process, providing them with an alternative livelihood.</li>
                            <li><strong>Disaster Resilience:</strong> Create a natural barrier that absorbs the impact of storm surges and cyclones.</li>
                        </ul>

                        <div class="row my-5 g-4">
                            <div class="col-md-6">
                                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-3 shadow-sm w-100" alt="Plantation Work">
                            </div>
                            <div class="col-md-6">
                                <img src="https://images.unsplash.com/photo-1516934824559-00f77e69d7bb?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-3 shadow-sm w-100" alt="Community Engagement">
                            </div>
                        </div>

                        <h4 class="fw-bold mt-5 mb-3">Impact & Results (So Far)</h4>
                        <p>Since its inception, the project has seen active participation from over 300 local volunteers. We have successfully completed the first phase by planting 20,000 saplings. The local biodiversity is slowly recovering, and the community is now more aware of the importance of coastal ecosystems.</p>

                    </div>
                    

                </div>
            </div>

        </div>
    </section>
    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuBtn = document.getElementById("mobileMenuBtn");
            const sidebar = document.getElementById("mobileSidebar");
            
            if(menuBtn && sidebar) {
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
            }
        });
    </script>
</body>
</html>