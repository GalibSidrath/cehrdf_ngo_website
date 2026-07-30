<?php
// Include database connection
include '../config/connection.php';

// Get ID from URL and sanitize
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch training details
$query = "SELECT id, title, short_des, duration, seats, reg_fee, location, img, status, content FROM training WHERE id = $id";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $training = mysqli_fetch_assoc($result);
} else {
    // Redirect if no training found
    header("Location: alltrainings.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($training['title']); ?> | CEHRDF</title>
    <link rel="icon" type="image/png" href="../images/logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>

<body class="bg-light">

    <?php include '../header.php'; ?>

    <section class="py-5 bg-white">
        <div class="container py-3">
            <div class="row g-5">

                <div class="col-lg-8">
                    <div class="mb-4">
                        <span
                            class="badge <?php echo ($training['status'] == 'Upcoming') ? 'bg-warning text-dark' : 'bg-secondary'; ?> border px-3 py-2 rounded-pill mb-3">
                            <?php echo htmlspecialchars($training['status']); ?>
                        </span>
                        <h1 class="fw-bold text-dark lh-sm mb-3"><?php echo htmlspecialchars($training['title']); ?>
                        </h1>
                        <p class="fs-5 text-muted"><?php echo htmlspecialchars($training['short_des']); ?></p>
                    </div>

                    <div class="mb-5">
                        <img src="../admin-area/uploads/training-feature-img/<?php echo htmlspecialchars($training['img']); ?>"
                            class="img-fluid rounded-4 shadow-sm w-100"
                            alt="<?php echo htmlspecialchars($training['title']); ?>"
                            onerror="this.src='https://via.placeholder.com/1200x500'">
                    </div>

                    <div class="fs-6 lh-lg text-dark">
                        <?php echo $training['content']; ?>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="position-sticky" style="top: 100px;">

                        <div class="card border-0 shadow rounded-4 overflow-hidden mb-4">
                            <div class="bg-primary-custom text-white p-4 text-center">
                                <h4 class="fw-bold mb-0">Training Overview</h4>
                            </div>

                            <div class="card-body p-4 bg-light">
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex mb-3 border-bottom pb-3">
                                        <div class="me-3 text-primary-custom"><i class="far fa-clock fs-5"></i></div>
                                        <div>
                                            <small class="text-muted d-block fw-semibold">Duration</small>
                                            <span
                                                class="fw-bold text-dark"><?php echo htmlspecialchars($training['duration']); ?></span>
                                        </div>
                                    </li>
                                    <li class="d-flex mb-3 border-bottom pb-3">
                                        <div class="me-3 text-primary-custom"><i class="fas fa-map-marker-alt fs-5"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block fw-semibold">Location</small>
                                            <span
                                                class="fw-bold text-dark"><?php echo htmlspecialchars($training['location']); ?></span>
                                        </div>
                                    </li>
                                    <li class="d-flex mb-3 border-bottom pb-3">
                                        <div class="me-3 text-primary-custom"><i class="fas fa-users fs-5"></i></div>
                                        <div>
                                            <small class="text-muted d-block fw-semibold">Total Seats</small>
                                            <span
                                                class="fw-bold text-dark"><?php echo htmlspecialchars($training['seats']); ?>
                                                Participants</span>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="me-3 text-primary-custom"><i
                                                class="fas fa-money-bill-wave fs-5"></i></div>
                                        <div>
                                            <small class="text-muted d-block fw-semibold">Registration Fee</small>
                                            <span
                                                class="fw-bold text-dark"><?php echo htmlspecialchars($training['reg_fee']); ?></span>
                                        </div>
                                    </li>
                                </ul>

                                <a href="applytrainingform.php?id=<?php echo $training['id']; ?>"
                                    class="btn btn-primary-custom w-100 py-3 fw-bold fs-5 rounded-pill shadow-sm">Apply
                                    Now</a>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm rounded-4 p-4 text-center"
                            style="background-color: #f8f9fa;">
                            <i class="fas fa-headset fa-2x text-muted mb-2"></i>
                            <h6 class="fw-bold text-dark">Have Questions?</h6>
                            <p class="small text-muted mb-3">Contact our training coordinator for any queries.</p>
                            <a href="mailto:training@cehrdf.org"
                                class="text-decoration-none fw-bold text-primary-custom">training@cehrdf.org</a>
                        </div>
                    </div>
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
                });
            }
        });
    </script>
</body>

</html>