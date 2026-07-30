<?php 
    include '../session_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News & Media | CEHRDF Admin</title>
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
            <h2 class="fw-bold text-dark mb-0">News & Media</h2>
            <a href="addnews.php" class="btn btn-success">
                <i class="fas fa-plus me-2"></i>Add News
            </a>
        </div>

        <!-- SECTION: NEWS TABLE -->
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4 text-center" style="width: 80px;">Image</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Short Description</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Featured</th>
                                <th class="text-center pe-4" colspan="2" style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../../config/connection.php';
                            $query = "SELECT * FROM news ORDER BY id DESC";
                            $result = mysqli_query($con, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $imgPath = "../uploads/news-feature-img/" . $row['img'];
                                    ?>
                                    <tr>
                                        <td class="ps-4">
                                            <img src="<?php echo $imgPath; ?>" alt="News Image" class="rounded"
                                                style="width: 60px; height: 45px; object-fit: cover;">
                                        </td>
                                        <td class="fw-semibold"><?php echo htmlspecialchars($row['title']); ?></td>
                                        <td class="fw-semibold"><?php echo htmlspecialchars($row['short_des']); ?></td>
                                        <td class="text-center">
                                            <span class="badge bg-info"><?php echo ucfirst($row['category']); ?></span>
                                        </td>
                                        <td class="text-center"><?php echo htmlspecialchars($row['author']); ?></td>
                                        <td class="text-center"><?php echo date('d M, Y', strtotime($row['pub_date'])); ?></td>
                                        <td class="text-center">
                                            <?php echo ($row['feature'] == '1') ? '<span class="text-success"><i class="fas fa-check-circle"></i> Yes</span>' : '<span class="text-danger"><i class="fas fa-times-circle"></i> No</span>'; ?>
                                        </td>
                                        <td class="text-center pe-4">
                                            <a href="editnews.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="text-center pe-4">
                                            <a href="deletenews.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure you want to delete this news?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='8' class='text-center'>No news found.</td></tr>";
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