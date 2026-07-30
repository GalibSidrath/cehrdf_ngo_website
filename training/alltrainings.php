<?php
// Include database connection
include '../config/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Trainings | CEHRDF</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles.css">
</head>

<body class="bg-light">

    <?php include '../header.php'; ?>

    <!-- TRAININGS PAGE BANNER -->
    <section class="text-center text-white py-5"
        style="background: linear-gradient(rgba(23, 37, 42, 0.8), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 80px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Our Trainings</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Empowering volunteers, youth leaders, and community
                members with the skills needed to drive sustainable change.</p>
        </div>
    </section>

    <!-- TRAININGS LIST SECTION -->
    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <?php
                    // Fetch trainings from database
                    $query = "SELECT * FROM training ORDER BY id DESC";
                    $result = mysqli_query($con, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $img_path = "../admin-area/uploads/training-feature-img/" . $row['img'];
                            // Determine badge color
                            $badge_class = ($row['status'] == 'Upcoming') ? 'bg-warning text-dark' : 'bg-secondary text-white';
                            ?>

                            <!-- Training Card -->
                            <div class="card border-0 shadow-sm mb-4 training-card overflow-hidden rounded-4">
                                <div class="row g-0 align-items-center">
                                    <div class="col-md-4 h-100">
                                        <img src="<?php echo !empty($row['img']) ? htmlspecialchars($img_path) : 'https://via.placeholder.com/600x400'; ?>"
                                            class="img-fluid h-100 object-fit-cover w-100"
                                            alt="<?php echo htmlspecialchars($row['title']); ?>" style="min-height: 220px;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span
                                                    class="badge <?php echo $badge_class; ?> border px-3 py-2 rounded-pill"><?php echo htmlspecialchars($row['status']); ?></span>
                                                <span class="text-muted fw-bold small"><i class="far fa-clock me-1"></i>
                                                    <?php echo htmlspecialchars($row['duration']); ?></span>
                                            </div>
                                            <h4 class="fw-bold mb-2 text-dark"><?php echo htmlspecialchars($row['title']); ?>
                                            </h4>
                                            <p class="text-muted mb-4 lh-lg"><?php echo htmlspecialchars($row['short_des']); ?>
                                            </p>

                                            <div class="d-flex gap-3 mb-3 small fw-semibold text-dark">
                                                <span><i class="fas fa-map-marker-alt me-1 text-danger"></i>
                                                    <?php echo htmlspecialchars($row['location']); ?></span>
                                                <span><i class="fas fa-users me-1 text-primary"></i> Seats:
                                                    <?php echo htmlspecialchars($row['seats']); ?></span>
                                            </div>

                                            <a href="singletraining.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-outline-primary-custom px-4 fw-bold rounded-pill">View Full
                                                Details <i class="fas fa-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                    } else {
                        echo '<div class="text-center py-5"><p class="text-muted">No training sessions found at the moment.</p></div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>

    <?php include '../footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
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