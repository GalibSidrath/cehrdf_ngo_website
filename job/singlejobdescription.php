<?php

include '../config/connection.php';


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;


$query = "SELECT * FROM career WHERE id = $id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);


if (!$row) {
    header("Location: career.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['title']); ?> | CEHRDF</title>
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
                
                <div class="col-lg-12 card border-0 shadow-sm rounded-4 overflow-hidden p-4 p-md-5">
                    
                    <div class="mb-5 border-bottom pb-4">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="badge bg-primary-custom px-3 py-2 rounded-pill shadow-sm"><?php echo htmlspecialchars($row['type']); ?></span>
                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill"><?php echo htmlspecialchars($row['dpt']); ?></span>
                            <span class="badge bg-warning text-dark border px-3 py-2 rounded-pill">Vacancies: <?php echo htmlspecialchars($row['num_of_vac']); ?></span>
                        </div>
                        <h1 class="fw-bold text-dark lh-sm mb-3"><?php echo htmlspecialchars($row['title']); ?></h1>
                        <p class="text-muted fs-5 mb-0"><?php echo htmlspecialchars($row['short_des']); ?></p>
                        <p class="text-muted mt-2"><i class="fas fa-map-marker-alt me-1 text-danger"></i> Location: <?php echo htmlspecialchars($row['location']); ?> | <strong>Deadline:</strong> <?php echo htmlspecialchars($row['deadline']); ?></p>
                    </div>

                    <div class="fs-6 lh-lg text-dark">
                        <?php echo $row['content']; ?>
                    </div>

                    <a href="jobapplicationform.php?id=<?php echo $row['id']; ?>" class="btn btn-primary-custom w-100 py-3 fw-bold fs-5 rounded-pill shadow-sm mt-5">Apply Now</a>
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
            if(menuBtn) {
                menuBtn.addEventListener("click", function() {
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