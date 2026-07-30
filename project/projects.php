<?php
// Include database connection
include '../config/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs & Projects | CEHRDF</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- Custom CSS File -->
    <link rel="stylesheet" href="../styles.css">
</head>
<body class="bg-light">

    <?php include '../header.php'; ?>

    <!-- PAGE BANNER / HERO SECTION -->
    <section class="text-center text-white py-5"
        style="background: linear-gradient(rgba(23, 37, 42, 0.85), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 80px 0;">
        <div class="container-xl py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Our Programs & Projects</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Explore our on-ground initiatives driving environmental sustainability, social justice, and community empowerment.</p>
        </div>
    </section>

    <!-- MAIN PROJECTS SECTION -->
    <section class="py-5 bg-light">
        <div class="container-xl py-3">
            <div class="row g-4">

                <?php
                // Fetch projects from database
                $query = "SELECT * FROM program ORDER BY id DESC";
                $result = mysqli_query($con, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $img_path = "../admin-area/uploads/project-feature-img/" . $row['img'];
                        
                        // Set badge color based on status
                        $status_badge = ($row['status'] == 'Ongoing') ? 'bg-success' : 'bg-secondary';
                ?>

                <!-- Project Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden project-card bg-white">
                        <div class="position-relative">
                            <img src="<?php echo !empty($row['img']) ? htmlspecialchars($img_path) : 'https://via.placeholder.com/600x400'; ?>"
                                 class="card-img-top object-fit-cover" alt="<?php echo htmlspecialchars($row['title']); ?>" style="height: 220px;">
                            <span class="badge <?php echo $status_badge; ?> position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill shadow-sm">
                                <?php echo htmlspecialchars($row['status']); ?>
                            </span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <p class="text-primary-custom small fw-bold mb-2">
                                <i class="fas fa-map-marker-alt me-1"></i> <?php echo htmlspecialchars($row['location']); ?>
                            </p>
                            <h5 class="fw-bold text-dark mb-3"><?php echo htmlspecialchars($row['title']); ?></h5>
                            <p class="text-muted small mb-4 flex-grow-1">
                                <?php echo htmlspecialchars($row['short_des']); ?>
                            </p>
                            <a href="singleproject.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary-custom fw-bold w-100 rounded-pill">Read More</a>
                        </div>
                    </div>
                </div>

                <?php 
                    }
                } else {
                    echo '<div class="col-12 text-center py-5"><p class="text-muted">No projects found at this moment.</p></div>';
                }
                ?>

            </div>
        </div>
    </section>

    <?php include '../footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Mobile Sidebar Toggle Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuBtn = document.getElementById("mobileMenuBtn");
            const sidebar = document.getElementById("mobileSidebar");
            if(menuBtn && sidebar) {
                menuBtn.addEventListener("click", function () {
                    sidebar.classList.toggle("active");
                    const icon = menuBtn.querySelector("i");
                    icon.classList.toggle("fa-bars");
                    icon.classList.toggle("fa-times");
                });
            }
        });
    </script>
</body>
</html>