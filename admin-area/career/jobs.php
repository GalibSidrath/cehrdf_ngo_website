<?php 
    include '../session_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers | CEHRDF Admin</title>
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
            <h2 class="fw-bold text-dark mb-0">Careers</h2>
            <a href="addjob.php" class="btn btn-success">
                <i class="fas fa-plus me-2"></i>Add Job
            </a>
        </div>

        <!-- SECTION: CAREERS TABLE -->
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
                                <th class="ps-4">Job Title</th>
                                <th>Job Type</th>
                                <th>Publish Date</th>
                                <th>Vacancies</th>
                                <th>Location</th>
                                <th>Salary Range</th>
                                <th>Deadline</th>
                                <th>Short Description</th>
                                <th class="text-center" style="width: 100px;">Edit</th>
                                <th class="text-center pe-4" style="width: 100px;">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Fetch all jobs ordered by newest first
                            $query = "SELECT * FROM career ORDER BY id DESC";
                            $result = mysqli_query($con, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                                    // Format deadline date to DD/MM/YYYY (e.g., 10/10/2026)
                                    $formattedDeadline = date("d/m/Y", strtotime($row['deadline']));

                                    // Handle Publish Date (If you have a 'created_at' timestamp column in the database)
                                    $publishDate = isset($row['created_at']) ? date("M d, Y", strtotime($row['created_at'])) : date("M d, Y");

                                    // Dynamic Bootstrap badge color logic based on job type
                                    $badgeClass = 'bg-secondary';
                                    if ($row['type'] === 'permanent') {
                                        $badgeClass = 'bg-primary';
                                    } elseif ($row['type'] === 'contractual') {
                                        $badgeClass = 'bg-warning text-dark';
                                    } elseif ($row['type'] === 'part_time') {
                                        $badgeClass = 'bg-info text-dark';
                                    }

                                    ?>
                                    <tr>
                                        <td class="ps-4 fw-semibold"><?php echo htmlspecialchars($row['title']); ?></td>
                                        <td><span
                                                class="badge <?php echo $badgeClass; ?> text-capitalize"><?php echo htmlspecialchars($row['type']); ?></span>
                                        </td>
                                        <td><?php echo $publishDate; ?></td>
                                        <td><?php echo htmlspecialchars($row['num_of_vac']); ?></td>
                                        <td><?php echo htmlspecialchars($row['location']); ?></td>
                                        <td><?php echo htmlspecialchars($row['salary_range']); ?></td>
                                        <td><?php echo $formattedDeadline; ?></td>
                                        <td class="text-muted small" style="max-width: 250px;">
                                            <?php echo htmlspecialchars($row['short_des']); ?></td>
                                        <td class="text-center">
                                            <a href="editjob.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="text-center pe-4">
                                            <a href="deletejob.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure you want to delete this job post?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                // Fallback row if no job circulars exist in the database
                                echo "<tr><td colspan='10' class='text-center py-4 text-muted'>No job circulars found.</td></tr>";
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