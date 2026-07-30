<?php
// Include the database connection file
include '../config/connection.php';

// Get the notice ID from the URL
$notice_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query to fetch the specific notice
$query = "SELECT title, ref_no, pub_date, content FROM notice WHERE id = $notice_id";
$result = mysqli_query($con, $query);

// Check if the notice exists
if ($result && mysqli_num_rows($result) > 0) {
    $notice = mysqli_fetch_assoc($result);
} else {
    header("Location: notices.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($notice['title']); ?> | CEHRDF</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css"> 

    <style>
        @media print {
            /* Hide elements that shouldn't be printed */
            header, footer, .btn, .navbar, #mobileSidebar {
                display: none !important;
            }
            /* Ensure the card takes full width and looks clean */
            body { background: white !important; }
            .card {
                border: none !important;
                box-shadow: none !important;
            }
            .container { width: 100% !important; max-width: 100% !important; }
        }
    </style>
</head>
<body class="bg-light">

    <?php include '../header.php'; ?>

    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    
                    <div id="printable-notice" class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        
                        <div class="card-header bg-white border-bottom p-4 p-md-5">
                            <div class="d-flex justify-content-end mb-4 gap-2">
                                <button class="btn btn-sm btn-outline-secondary" onclick="window.print()">
                                    <i class="fas fa-print me-1"></i> Print
                                </button>
                            </div>

                            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                                <div>
                                    <span class="text-muted fw-bold small">Ref No: <?php echo htmlspecialchars($notice['ref_no']); ?></span>
                                </div>
                                <div>
                                    <span class="text-muted fw-bold small"><i class="far fa-calendar-alt me-1"></i> Date: <?php echo date("M d, Y", strtotime($notice['pub_date'])); ?></span>
                                </div>
                            </div>

                            <h3 class="fw-bold text-dark lh-sm"><?php echo htmlspecialchars($notice['title']); ?></h3>
                        </div>

                        <div class="card-body p-4 p-md-5 fs-6 lh-lg text-dark">
                            <?php echo $notice['content']; ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>