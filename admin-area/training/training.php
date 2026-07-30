<?php 
    include '../session_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainings | CEHRDF Admin</title>
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
            <h2 class="fw-bold text-dark mb-0">Trainings</h2>

            <div>
                <a href="viewreg.php" class="btn btn-primary">
                    View Registration List
                </a>
                <a href="addtraining.php" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>Add New Training
                </a>
            </div>

        </div>

        <!-- SECTION: TRAININGS TABLE -->
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
                                <th class="ps-4">Title</th>
                                <th>Short Description</th>
                                <th>Status</th>
                                <th>Duration</th>
                                <th>Location</th>
                                <th>Available Seats</th>
                                <th>Registration Fee</th>
                                <th class="text-center" style="width: 100px;">Edit</th>
                                <th class="text-center pe-4" style="width: 100px;">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Fetch all training records ordered by newest
                            $query = "SELECT * FROM training ORDER BY id DESC";
                            $result = mysqli_query($con, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                                    // Assign explicit dynamic badge colors based on the setup status
                                    $status = strtolower($row['status']);
                                    if ($status === 'upcoming') {
                                        $statusBadge = 'bg-warning text-dark';
                                    } elseif ($status === 'ongoing') {
                                        $statusBadge = 'bg-success';
                                    } else {
                                        $statusBadge = 'bg-secondary'; // For 'completed' or 'finished'
                                    }
                                    ?>
                                    <tr>
                                        <td class="ps-4 fw-semibold"><?php echo htmlspecialchars($row['title']); ?></td>
                                        <td class="text-muted small" style="max-width: 200px;">
                                            <?php echo htmlspecialchars($row['short_des']); ?></td>
                                        <td>
                                            <span
                                                class="badge <?php echo $statusBadge; ?>"><?php echo ucfirst($row['status']); ?></span>
                                        </td>
                                        <td><span class="badge bg-dark"><?php echo htmlspecialchars($row['duration']); ?></span>
                                        </td>
                                        <td><span class="badge bg-dark"><?php echo htmlspecialchars($row['location']); ?></span>
                                        </td>
                                        <td><span class="badge bg-success"><?php echo htmlspecialchars($row['seats']); ?>
                                                Seats</span></td>
                                        <td>
                                            <?php if ($row['reg_fee'] == 0): ?>
                                                <span class="badge bg-primary">Free</span>
                                            <?php else: ?>
                                                <span class="badge bg-primary"><?php echo htmlspecialchars($row['reg_fee']); ?>
                                                    BDT</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="edittraining.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="text-center pe-4">
                                            <a href="deletetraining.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure you want to delete this training record?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                // Display clean message fallback if table rows return zero records
                                echo "<tr><td colspan='9' class='text-center py-4 text-muted'>No training sessions found.</td></tr>";
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