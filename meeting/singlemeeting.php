<?php

include '../config/connection.php';


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;


$query = "SELECT * FROM meetings WHERE id = $id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);


if (!$row) {
    echo "<script>alert('Meeting not found!'); window.location.href='allmeetings.php';</script>";
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
    <link rel="stylesheet" href="../styles.css"> 

    <style>
        /* Print Styles: Only Print the Section Content */
        @media print {
            /* Hide header, footer, mobile sidebar, and print button */
            header, 
            footer, 
            .mobile-sidebar, 
            .btn-outline-secondary,
            .top-bar {
                display: none !important;
            }

            /* Reset background and padding for clean print layout */
            body {
                background-color: #fff !important;
                color: #000 !important;
            }

            section {
                padding: 0 !important;
                background-color: transparent !important;
            }

            .card {
                border: none !important;
                box-shadow: none !important;
            }

            /* Ensure main container takes full width when printing */
            .container, .col-lg-9 {
                width: 100% !important;
                max-width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
            }
        }
    </style>
</head>
<body class="bg-light">

    <?php include '../header.php'; ?>

    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        
                        <div class="card-header bg-white border-bottom p-4 p-md-5">
                            <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
                                <div>
                                    <span class="badge bg-secondary mb-2"><?php echo htmlspecialchars($row['meeting_type']); ?></span>
                                    <h2 class="fw-bold text-dark mb-0 lh-sm"><?php echo htmlspecialchars($row['title']); ?></h2>
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-outline-secondary btn-sm" onclick="window.print()"><i class="fas fa-print me-1"></i> Print</button>
                                </div>
                            </div>

                            <div class="row g-3 bg-light p-3 rounded-3 border">
                                <div class="col-md-4 col-sm-6">
                                    <small class="text-muted d-block fw-semibold mb-1">Date & Time</small>
                                    <span class="fw-bold text-dark"><i class="far fa-calendar-alt me-1 text-primary-custom"></i> <?php echo date("M d, Y", strtotime($row['date'])); ?></span><br>
                                    <span class="small text-muted"><?php echo htmlspecialchars($row['time']); ?></span>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <small class="text-muted d-block fw-semibold mb-1">Location</small>
                                    <span class="fw-bold text-dark"><i class="fas fa-map-marker-alt me-1 text-primary-custom"></i> <?php echo htmlspecialchars($row['location']); ?></span>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <small class="text-muted d-block fw-semibold mb-1">Presided By</small>
                                    <span class="fw-bold text-dark"><i class="far fa-user me-1 text-primary-custom"></i> <?php echo htmlspecialchars($row['presented_by']); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-4 p-md-5 fs-6 lh-lg text-dark">
                            <?php echo $row['content']; ?>
                        </div>

                        <div class="card-footer bg-light border-top p-4 text-center">
                            <p class="small text-muted mb-0">These minutes are system generated and officially recorded by the CEHRDF administration.</p>
                        </div>
                        
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