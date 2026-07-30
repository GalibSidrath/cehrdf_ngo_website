<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board | CEHRDF</title>
    <link rel="icon" type="image/png" href="../images/logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>

<body class="bg-light">

    <?php include '../header.php'; ?>

    <!-- Banner Section -->
    <section class="text-center text-white py-5"
        style="background: linear-gradient(rgba(23, 37, 42, 0.85), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 80px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Notice Board</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Stay updated with our official announcements, tender
                calls, job circulars, and administrative notices.</p>
        </div>
    </section>

    <!-- Notice List Section -->
    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="mb-4">
                <h2 class="fw-bold mb-0 text-center">All Notices</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <?php
                    include '../config/connection.php';
                    // Query to fetch all notices sorted by date
                    $notice_query = "SELECT id, title, ref_no, pub_date FROM notice ORDER BY pub_date DESC";
                    $notice_result = mysqli_query($con, $notice_query);

                    if ($notice_result && mysqli_num_rows($notice_result) > 0) {
                        while ($notice = mysqli_fetch_assoc($notice_result)) {
                            $formatted_date = date("M d, Y", strtotime($notice['pub_date']));
                            ?>

                            <!-- Notice Item -->
                            <div class="card border-0 shadow-sm mb-4 hover-lift"
                                style="border-left: 4px solid #2b7a78 !important; background-color: #ffffff; border-radius: 12px;">
                                <a href="singlenotice.php?id=<?php echo $notice['id']; ?>" class="text-decoration-none">
                                    <div
                                        class="card-body p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                                        <div>
                                            <h5 class="fw-bold text-dark mb-2"><?php echo htmlspecialchars($notice['title']); ?>
                                            </h5>
                                            <div class="d-flex gap-3 text-muted small fw-semibold">
                                                <span><i class="far fa-calendar-plus me-1 text-primary-custom"></i> Published:
                                                    <?php echo $formatted_date; ?></span>
                                                <?php if (!empty($notice['ref_no'])): ?>
                                                    <span><i class="fas fa-file-alt me-1 text-primary-custom"></i> Ref:
                                                        <?php echo htmlspecialchars($notice['ref_no']); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="text-md-end mt-3 mt-md-0">
                                            <span class="btn btn-sm btn-outline-primary-custom fw-bold rounded-pill px-4">View
                                                Full Notice <i class="fas fa-arrow-right ms-1"></i></span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <?php
                        }
                    } else {
                        echo '<div class="text-center py-5 text-muted">No notices have been published yet.</div>';
                    }
                    ?>
                </div>
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