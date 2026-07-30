<?php 
    include '../session_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admins | CEHRDF Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="../styles.css">
    <style>
        .table th,
        .table td {
            padding: 12px 15px !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0px !important;
        }
    </style>
</head>

<body>

    <?php include '../dashboard-components/header.php'; ?>

    <?php include '../dashboard-components/sidebar.php'; ?>

    <main class="admin-main">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark mb-0">Admins</h2>
            <a href="addadmin.php" class="btn btn-success">
                <i class="fas fa-plus me-2"></i>Add New Admin
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table id="adminTable" class="table table-hover align-middle mb-0" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 15%;">Serial No</th>
                                <th style="width: 65%;">Username</th>
                                <th class="text-center" style="width: 20%;">Action Buttons</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Include the database connection
                            include '../../config/connection.php';

                            // Fetch admins from the database
                            $query = "SELECT id, username FROM admin ORDER BY id ASC";
                            $result = mysqli_query($con, $query);

                            $serial = 1; // Initialize serial number counter
                            
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $serial++; ?></td>
                                        <td class="fw-semibold"><?php echo htmlspecialchars($row['username']); ?></td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="admin_delete.php?id=<?php echo $row['id']; ?>"
                                                    class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure you want to delete this admin?')"
                                                    title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                // If no admins are in the database
                                echo "<tr><td colspan='3' class='text-center py-3'>No admins found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>

    <div class="admin-sidebar-overlay" id="sidebarOverlay"></div>

    <button class="admin-mobile-toggle" id="mobileToggle"><i class="fas fa-bars"></i></button>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            // অ্যাডমিন টেবিল ডেটাটেবিল ইনিশিয়ালাইজেশন
            $('#adminTable').DataTable({
                "responsive": true,
                "language": {
                    "search": "Search Admin:",
                    "lengthMenu": "Show _MENU_ entries"
                }
            });
        });

        // সাইডবার মোবাইল টগল স্ক্রিপ্ট
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