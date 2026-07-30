<?php 
    include '../session_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notices | CEHRDF Admin</title>
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

        <!-- SECTION: PAGE TITLE BAR -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-1">Notices</h2>
            </div>
            <a href="add-notice.php" class="btn btn-success">
                <i class="fas fa-plus me-2"></i>Add Notice
            </a>
        </div>

        <!-- SECTION: NOTICES TABLE -->
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">#</th>
                                <th>Date</th>
                                <th>Ref No</th>
                                <th>Title</th>
                                <th>Notice Text</th>
                                <th class="text-end pe-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../../config/connection.php';

                            $query = "SELECT * FROM notice ORDER BY id DESC";
                            $result = mysqli_query($con, $query);
                            $count = 1;

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $title = htmlspecialchars($row['title']);
                                    $ref_no = htmlspecialchars($row['ref_no']);

                                    $pub_date = date('d/m/Y', strtotime($row['pub_date']));

                                    $content = strip_tags($row['content']);
                                    ?>
                                    <tr>
                                        <td class="ps-4"><?= $count ?></td>
                                        <td><?= $pub_date ?></td>
                                        <td>
                                            <?php if (!empty($ref_no)): ?>
                                                <span class="badge bg-secondary"><?= $ref_no ?></span>
                                            <?php else: ?>
                                                <span class="text-muted">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="fw-semibold"><?= $title ?></td>
                                        <td class="text-muted text-truncate" style="max-width: 250px;">
                                            <?= $content ?>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="editnotice.php?id=<?= $id ?>" class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="deletenotice.php?id=<?= $id ?>" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure you want to delete this notice?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    $count++; 
                                } 
                            } else {
                                echo '<tr><td colspan="6" class="text-center py-4 text-muted">No notices found.</td></tr>';
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