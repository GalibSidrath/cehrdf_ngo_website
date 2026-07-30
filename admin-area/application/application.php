<?php 
    include '../session_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Applications | CEHRDF Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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

        <!-- SECTION: PAGE TITLE -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark mb-0">Job Applications</h2>
        </div>

        <!-- SECTION: APPLICATIONS TABLE -->
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <table class="table table-hover align-middle" id="applicationsTable">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">#</th>
                            <th>Applicant Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Applied For</th>
                            <th>Applied Date</th>
                            <th>CV</th>
                            <th class="text-center" style="width: 120px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Include the database connection file
                        include '../../config/connection.php';

                        // Query to fetch applications. (টেবিলের নাম job_applications ধরে নেওয়া হয়েছে)
                        $query = "SELECT * FROM job_applications ORDER BY id DESC";
                        $result = mysqli_query($con, $query);
                        $serial = 1;

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                                
                                $appliedDate = isset($row['applying_date']) ? date("M d, Y", strtotime($row['applying_date'])) : "N/A";

                                
                                $cvPath = "../uploads/job-applicants-resume/" . htmlspecialchars($row['resume']);

                                ?>
                                <tr>
                                    <td class="ps-4"><?php echo $serial++; ?></td>
                                    <td class="fw-semibold"><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                    <td><span
                                            class="badge bg-primary text-capitalize"><?php echo htmlspecialchars($row['applying_position']); ?></span>
                                    </td>
                                    <td><?php echo $appliedDate; ?></td>
                                    <td>
                                        <?php if (!empty($row['resume'])) { ?>
                                            <a href="<?php echo $cvPath; ?>" target="_blank" class="btn btn-sm btn-outline-info">
                                                <i class="fas fa-file-pdf me-1"></i>View
                                            </a>
                                        <?php } else { ?>
                                            <span class="text-muted small">No CV</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="application_delete.php?id=<?php echo $row['id']; ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure you want to delete this application?')"
                                            title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            // Fallback row if no applications exist yet
                            echo "<tr><td colspan='8' class='text-center py-4 text-muted'>No job applications found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- MOBILE OVERLAY -->
    <div class="admin-sidebar-overlay" id="sidebarOverlay"></div>

    <!-- MOBILE TOGGLE -->
    <button class="admin-mobile-toggle" id="mobileToggle"><i class="fas fa-bars"></i></button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

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

    <!-- DataTables Initialize -->
    <script>
        $(document).ready(function () {
            $('#applicationsTable').DataTable({
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });
        });
    </script>

</body>

</html>