<!-- <section class="hero-section">
    <div class="container-xl h-100 d-flex align-items-center">
        <div class="row w-100">
            <div class="col-md-7 text-white z-2">
                <h1 class="display-4 fw-bolder mb-3 text-shadow">Fostering an Inclusive, Non-Discriminatory, Sustainable and Dignity-Driven Future</h1>
                <p class="lead mb-4 fs-5 w-100 w-md-75 text-shadow-sm">We empower communities, protect human rights, and drive evidence-based climate action for a resilient and sustainable world</p>
                <a href="about/about.php" class="btn btn-light btn-lg px-4 me-2 fw-bold text-primary-custom">Learn
                    More</a>
            
            </div>
        </div>
    </div>
    <div class="hero-overlay"></div>
</section> -->

<?php
// Include your database connection
require_once 'config/connection.php';
?>

<section class="hero-section">
    <!-- Overlay -->
    <div class="hero-overlay"></div>

    <!-- Notice Marquee Ticker -->
    <div class="position-absolute top-0 start-0 w-100 z-3" style="background-color: rgba(23, 37, 42, 0.9); border-bottom: 1px solid rgba(255,255,255,0.1);">
        <div class="container-xl d-flex align-items-center py-2">
            <span class="badge rounded-pill me-3 py-2 px-3 fw-bold" style="background-color: #e2136e;">Latest Notice</span>
            <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" class="text-light mb-0 fs-6">
                <?php
                // Fetch the 5 latest notices
                $notice_sql = "SELECT `id`, `title`, `ref_no`, `pub_date` FROM `notice` ORDER BY `pub_date` DESC, `id` DESC LIMIT 5";
                $notice_result = mysqli_query($con, $notice_sql);

                if ($notice_result && mysqli_num_rows($notice_result) > 0) {
                    while ($notice = mysqli_fetch_assoc($notice_result)) {
                    
                        $noticeUrl = "notice/singlenotice.php?id=" . urlencode($notice['id']);
                        $title = htmlspecialchars($notice['title']);
                        
                        // Format the date nicely (e.g., 30 Jul 2026)
                        $date = !empty($notice['pub_date']) ? date("d M Y", strtotime($notice['pub_date'])) : '';

                        echo '<span class="me-5">';
                        echo '<i class="fas fa-bell me-2 text-warning"></i>';
                        // The anchor tag for clicking to read full notice
                        echo '<a href="' . $noticeUrl . '" class="text-white text-decoration-none fw-semibold" style="transition: 0.3s;">';
                        echo $title;
                        if ($date) {
                            echo ' <small class="text-muted ms-1">(' . $date . ')</small>';
                        }
                        echo '</a>';
                        echo '</span>';
                    }
                } else {
                    echo '<span class="text-light">No new notices at the moment.</span>';
                }
                ?>
            </marquee>
        </div>
    </div>

    <!-- Hero Content -->
    <!-- Added pt-5 (padding-top) so the content doesn't hide behind the top marquee -->
    <div class="container-xl h-100 d-flex align-items-center pt-5">
        <div class="row w-100">
            <div class="col-md-7 text-white z-2">
                <h1 class="display-4 fw-bolder mb-3 text-shadow">Fostering an Inclusive, Non-Discriminatory, Sustainable and Dignity-Driven Future</h1>
                <p class="lead mb-4 fs-5 w-100 w-md-75 text-shadow-sm">We empower communities, protect human rights, and drive evidence-based climate action for a resilient and sustainable world</p>
                <a href="about/about.php" class="btn btn-light btn-lg px-4 me-2 fw-bold text-primary-custom">Learn More</a>
            </div>
        </div>
    </div>
</section>