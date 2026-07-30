<?php

include '../config/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Meetings | CEHRDF</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../styles.css">
</head>

<body class="bg-light">

    <?php include '../header.php'; ?>

    <section class="text-center text-white py-5"
        style="background: linear-gradient(rgba(23, 37, 42, 0.8), rgba(23, 37, 42, 0.9)), url('https://images.unsplash.com/photo-1515187029135-18ee286d815b?auto=format&fit=crop&w=1920&q=80') center/cover; padding: 80px 0;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Meetings & Minutes</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Keep track of our organizational decisions, community
                forums, executive board meetings, and official resolutions.</p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <?php
                    
                    $query = "SELECT id, title, presented_by, date, time, location, meeting_type, content FROM meetings ORDER BY date DESC";
                    $result = mysqli_query($con, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            
                            $short_content = strlen($row['content']) > 100 ? substr($row['content'], 0, 100) . '...' : $row['content'];
                            ?>
                            <div class="card border-0 shadow-sm mb-4 hover-lift"
                                style="border-left: 4px solid #2b7a78 !important; background-color: #ffffff;">
                                <a href="singlemeeting.php?id=<?php echo $row['id']; ?>" class="text-decoration-none">
                                    <div class="card-body p-4 d-flex flex-column flex-md-row align-items-md-center gap-3">
                                        <div class="text-muted fw-bold d-flex align-items-center" style="min-width: 160px;">
                                            <i class="far fa-calendar-alt me-2 text-primary-custom fs-5"></i>
                                            <?php echo htmlspecialchars(date("M d, Y", strtotime($row['date']))); ?>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($row['title']); ?>
                                            </h5>
                                        </div>
                                        <div class="text-end text-primary-custom">
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                        }
                    } else {
                        echo '<div class="text-center py-5 text-muted">No meetings found at the moment.</div>';
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