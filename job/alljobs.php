<?php
include '../config/connection.php';

$query = "SELECT * FROM career ORDER BY id DESC";
$result = mysqli_query($con, $query);

$total_jobs = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Opportunities | CEHRDF</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>

<body class="bg-light">

    <?php include '../header.php'; ?>

    <section class="text-center text-white py-5"
        style="background: linear-gradient(rgba(23, 37, 42, 0.85), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 80px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Join Our Team</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Build a meaningful career with CEHRDF. Help us drive
                sustainable development and protect human rights in the most vulnerable coastal regions.</p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-9">

                    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                        <h3 class="fw-bold text-dark mb-0 border-start border-4 border-primary ps-3"
                            style="border-color: #2b7a78 !important;">Current Openings</h3>
                        <span class="badge bg-secondary rounded-pill px-3 py-2"><?php echo $total_jobs; ?> Jobs
                            Found</span>
                    </div>

                    <?php
                    if ($total_jobs > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <a href="singlejobdescription.php?id=<?php echo $row['id']; ?>"
                                class="text-decoration-none d-block mb-4">
                                <div class="card border-0 shadow-sm hover-lift"
                                    style="border-left: 5px solid #2b7a78 !important; border-radius: 12px;">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span
                                                class="badge bg-primary-custom px-3 py-2 rounded-pill shadow-sm"><?php echo htmlspecialchars($row['type']); ?></span>
                                            <span class="text-muted small fw-semibold"><i class="far fa-clock me-1"></i>
                                                Deadline: <?php echo htmlspecialchars($row['deadline']); ?></span>
                                        </div>
                                        <h4 class="fw-bold text-dark mt-3 mb-2"><?php echo htmlspecialchars($row['title']); ?>
                                        </h4>
                                        <p class="text-muted small mb-3"><i class="fas fa-map-marker-alt me-1 text-danger"></i>
                                            <?php echo htmlspecialchars($row['location']); ?></p>
                                        <p class="text-muted mb-0"><?php echo htmlspecialchars($row['short_des']); ?></p>

                                        <div class="mt-4 text-end">
                                            <span class="fw-bold text-primary-custom small">View Job Details <i
                                                    class="fas fa-arrow-right ms-1"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php
                        }
                    } else {
                        echo '<p class="text-center text-muted">Currently, there are no open positions available.</p>';
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
            if (menuBtn) {
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