<?php
// Include database connection
include '../config/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentaries & Videos | CEHRDF</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../styles.css">
</head>

<body class="bg-light">

    <?php include '../header.php'; ?>

    <section class="text-center text-white py-5"
        style="background: linear-gradient(rgba(23, 37, 42, 0.85), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1601506521937-0121a7fc2a6b?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 80px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Our Documentaries</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Watch the untold stories of resilience, climate
                adaptation, and community empowerment from the coastal regions of Bangladesh.</p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="row g-4">

                <?php
                // Query to fetch videos
                $video_query = "SELECT * FROM videos ORDER BY pub_date DESC";
                $video_result = mysqli_query($con, $video_query);

                if ($video_result && mysqli_num_rows($video_result) > 0) {
                    while ($row = mysqli_fetch_assoc($video_result)) {
                        // Generate thumbnail URL from YouTube ID (vid)
                        $thumbnail = "https://img.youtube.com/vi/" . htmlspecialchars($row['vid']) . "/maxresdefault.jpg";
                        $formatted_date = date("M d, Y", strtotime($row['pub_date']));
                        ?>

                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100 border-0 rounded-4 shadow-sm hover-lift overflow-hidden">
                                <a href="<?php echo htmlspecialchars($row['url']); ?>" target="_blank"
                                    class="text-decoration-none d-block position-relative">
                                    <img src="<?php echo $thumbnail; ?>" class="card-img-top object-fit-cover"
                                        alt="<?php echo htmlspecialchars($row['title']); ?>" style="height: 220px;"
                                        onerror="this.src='https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=600&q=80'">

                                    <div class="position-absolute top-50 start-50 translate-middle">
                                        <div class="bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center shadow-lg"
                                            style="width: 60px; height: 60px; opacity: 0.9;">
                                            <i class="fas fa-play fs-4 ms-1"></i>
                                        </div>
                                    </div>

                                    <?php if ($row['feature'] == 1): ?>
                                        <div class="position-absolute top-0 start-0 m-2">
                                            <span class="badge bg-danger px-2 py-1">Featured</span>
                                        </div>
                                    <?php endif; ?>
                                </a>

                                <div class="card-body p-4 d-flex flex-column">
                                    <p class="text-primary-custom small fw-bold mb-2">
                                        <i class="far fa-calendar-alt me-1"></i> <?php echo $formatted_date; ?>
                                    </p>
                                    <h5 class="card-title fw-bold text-dark mb-3">
                                        <?php echo htmlspecialchars($row['title']); ?>
                                    </h5>
                                    <a href="<?php echo htmlspecialchars($row['url']); ?>" target="_blank"
                                        class="text-decoration-none fw-bold text-primary-custom border-top pt-3 d-inline-block w-100 mt-auto">
                                        Watch Now <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                } else {
                    echo '<div class="col-12 text-center py-5"><p class="text-muted">No videos found at the moment.</p></div>';
                }
                ?>

            </div>
        </div>
    </section>

    <?php include '../footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuBtn = document.getElementById("mobileMenuBtn");
            const sidebar = document.getElementById("mobileSidebar");

            if (menuBtn && sidebar) {
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