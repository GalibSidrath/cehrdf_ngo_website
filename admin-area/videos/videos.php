<?php 
    include '../session_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos | CEHRDF Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>

<body>

    <!-- HEADER SECTION (TOPBAR) -->
    <?php include '../dashboard-components/header.php'; ?>

    <!-- SIDEBAR -->
    <?php include '../dashboard-components/sidebar.php'; ?>

    <!-- MAIN COMPONENT -->
    <main class="admin-main">

        <!-- SECTION: PAGE TITLE + ADD BUTTON -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark mb-0">Videos</h2>
            <a href="addvideos.php" class="btn btn-success">
                <i class="fas fa-plus me-2"></i>Add Video
            </a>
        </div>

        <!-- SECTION: VIDEOS TABLE -->
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <?php
                  
                    include '../../config/connection.php';
                    ?>

                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4" style="width: 140px;">Thumbnail</th>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Feature</th>
                                <th class="text-center" style="width: 100px;">Edit</th>
                                <th class="text-center pe-4" style="width: 100px;">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $query = "SELECT * FROM videos ORDER BY id DESC";
                            $result = mysqli_query($con, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                   
                                    $thumbnailUrl = "https://img.youtube.com/vi/" . $row['vid'] . "/maxresdefault.jpg";
                                    ?>
                                    <tr>
                                        <td class="ps-4">
                                            <div class="position-relative d-inline-block">
                                                <img src="<?php echo $thumbnailUrl; ?>" alt="Video" class="rounded"
                                                    style="width: 120px; height: 70px; object-fit: cover;">
                                                <div class="position-absolute top-50 start-50 translate-middle bg-dark bg-opacity-75 rounded-circle d-flex align-items-center justify-content-center"
                                                    style="width: 32px; height: 32px;">
                                                    <i class="fas fa-play text-white small"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="fw-semibold"><?php echo htmlspecialchars($row['title']); ?></td>
                                        <td>
                                            <a href="<?php echo $row['url']; ?>" target="_blank"
                                                class="text-decoration-none text-primary">
                                                <i class="fab fa-youtube me-1"></i>Watch
                                            </a>
                                        </td>
                                        <td>
                                            <?php if ($row['feature'] == 1): ?>
                                                <span class="badge bg-success">Yes</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">No</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="editvideo.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="text-center pe-4">
                                            <a href="deletevideo.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                
                                echo "<tr><td colspan='6' class='text-center py-4'>No videos found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>

    <!-- MOBILE OVERLAY -->
    <div class="admin-sidebar-overlay" id="sidebarOverlay"></div>

    <!-- MOBILE TOGGLE -->
    <button class="admin-mobile-toggle" id="mobileToggle"><i class="fas fa-bars"></i></button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SIDEBAR TOGGLE SCRIPT -->
    <script>
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggle = document.getElementById('mobileToggle');
        toggle.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        });
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
    </script>

</body>

</html>