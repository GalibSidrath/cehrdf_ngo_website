<?php 
    include '../session_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs & Projects | CEHRDF Admin</title>
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
            <h2 class="fw-bold text-dark mb-0">Programs & Projects</h2>
            <a href="addnewprogandproj.php" class="btn btn-success">
                <i class="fas fa-plus me-2"></i>Add New
            </a>
        </div>

        <!-- SECTION: PROGRAMS TABLE -->
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <?php
                    // Include the database connection file
                    include '../../config/connection.php';
                    ?>

                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4" style="width: 80px;">Image</th>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th>Location</th>
                                <th>Slogan</th>
                                <th>Duration</th>
                                <th>Status</th>
                                <th>Feature</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Fetch all programs from the database ordered by latest
                            $query = "SELECT * FROM program ORDER BY id DESC";
                            $result = mysqli_query($con, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Determine badge color based on status
                                    $statusClass = ($row['status'] == 'ongoing') ? 'bg-success' : (($row['status'] == 'upcoming') ? 'bg-warning text-dark' : 'bg-secondary');

                                    // Format the duration string
                                    $duration = $row['start_date'] . " to " . ($row['end_date'] ? $row['end_date'] : 'Present');
                                    ?>
                                    <tr>
                                        <td class="ps-4">
                                            <img src="../uploads/project-feature-img/<?php echo $row['img']; ?>" alt="Program"
                                                class="rounded" style="width: 60px; height: 45px; object-fit: cover;">
                                        </td>
                                        <td class="fw-semibold"><?php echo htmlspecialchars($row['title']); ?></td>
                                        <td class="text-muted small" style="max-width: 200px;">
                                            <?php echo htmlspecialchars($row['short_des']); ?></td>
                                        <td><?php echo htmlspecialchars($row['location']); ?></td>
                                        <td><span
                                                class="badge bg-info bg-opacity-10 text-info"><?php echo htmlspecialchars($row['slogan']); ?></span>
                                        </td>
                                        <td><?php echo $duration; ?></td>
                                        <td><span
                                                class="badge <?php echo $statusClass; ?>"><?php echo ucfirst($row['status']); ?></span>
                                        </td>
                                        <td>
                                            <?php if ($row['feature'] == 1): ?>
                                                <span class="badge bg-success">Yes</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">No</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="editprogramandproject.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="text-center pe-4">
                                            <a href="deleteprojectandprogram.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure you want to delete this program?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                // Handle empty state
                                echo "<tr><td colspan='9' class='text-center py-4'>No programs found.</td></tr>";
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