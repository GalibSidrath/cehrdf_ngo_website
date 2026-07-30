<?php 
    include '../session_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Members | CEHRDF Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

    <?php include '../dashboard-components/header.php'; ?>
    <?php include '../dashboard-components/sidebar.php'; ?>

    <main class="admin-main">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark mb-0">Team Members</h2>
            <a href="addmember.php" class="btn btn-success">
                <i class="fas fa-plus me-2"></i>Add Member
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <table class="table table-hover align-middle mb-0" id="teamTable">
                    <thead class="table-light">
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Member Type</th>
                            <th>Contact</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../../config/connection.php';
                        $query = "SELECT * FROM teammember ORDER BY id DESC";
                        $result = mysqli_query($con, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $imagePath = "../uploads/teammembers/" . $row['img'];
                                echo "<tr>
                                    <td><img src='$imagePath' class='rounded-circle' style='width: 50px; height: 50px; object-fit: cover;'></td>
                                    <td class='fw-semibold'>".htmlspecialchars($row['name'])."</td>
                                    <td>".htmlspecialchars($row['designation'])."</td>
                                    <td><span class='badge bg-secondary text-capitalize'>".htmlspecialchars($row['member_type'])."</span></td>
                                    <td>
                                        <div class='small text-muted'>".htmlspecialchars($row['email'])."</div>
                                        <div class='small text-muted'>".htmlspecialchars($row['phone'])."</div>
                                    </td>
                                    <td class='text-center'>
                                        <a href='team_edit.php?id=".$row['id']."' class='btn btn-sm btn-outline-primary'><i class='fas fa-edit'></i></a>
                                    </td>
                                    <td class='text-center'>
                                        <a href='team_delete.php?id=".$row['id']."' class='btn btn-sm btn-outline-danger' onclick='return confirm(\"Are you sure?\")'><i class='fas fa-trash'></i></a>
                                    </td>
                                </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTables
            $('#teamTable').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "searching": true, // Enables Search Feature
                "columnDefs": [
                    { "orderable": false, "targets": [0, 5, 6] } // Disable sorting for Photo, Edit, Delete columns
                ]
            });
        });
    </script>
</body>
</html>