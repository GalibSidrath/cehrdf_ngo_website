<?php
// Include database connection
include '../config/connection.php';

// Get the project ID from the URL
$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query to fetch the specific project
$query = "SELECT id, title, slogan, short_des, location, img, start_date, end_date, status, feature, content FROM program WHERE id = $project_id";
$result = mysqli_query($con, $query);

// Check if project exists
if ($result && mysqli_num_rows($result) > 0) {
    $project = mysqli_fetch_assoc($result);
} else {
    // Redirect if project not found
    header("Location: projects.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($project['title']); ?> | CEHRDF</title>

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
                            <!-- Dynamic Status Badge -->
                            <span class="badge <?php echo ($project['status'] == 'Ongoing') ? 'bg-success' : 'bg-secondary'; ?> border px-3 py-2 rounded-pill shadow-sm">
                                <?php echo htmlspecialchars($project['status']); ?>
                            </span>
                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill shadow-sm">
                                <i class="fas fa-map-marker-alt text-danger me-1"></i> <?php echo htmlspecialchars($project['location']); ?>
                            </span>
                        </div>
                        <h1 class="fw-bold text-dark lh-sm mb-3 display-5"><?php echo htmlspecialchars($project['title']); ?></h1>
                        <p class="fs-5 text-muted w-md-75 mx-auto"><?php echo htmlspecialchars($project['slogan']); ?></p>
                    </div>

                    <div class="mb-5">
                        <img src="../admin-area/uploads/project-feature-img/<?php echo htmlspecialchars($project['img']); ?>" 
                             class="img-fluid rounded-4 shadow w-100 object-fit-cover" 
                             alt="<?php echo htmlspecialchars($project['title']); ?>" 
                             style="max-height: 500px;"
                             onerror="this.src='https://via.placeholder.com/1200x500'">
                    </div>

                    <div class="fs-5 lh-lg text-dark bg-white p-4 p-md-5 rounded-4 shadow-sm border">
                        
                        <!-- Main Content from Database -->
                        <?php echo $project['content']; ?>
                        
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
                    icon.classList.toggle("fa-bars");
                    icon.classList.toggle("fa-times");
                });
            }
        });
    </script>
</body>
</html>