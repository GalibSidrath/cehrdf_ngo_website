<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Registration List | CEHRDF Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- DataTables Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="../styles.css">
    <style>
        /* অনেকগুলো কলামের কারণে টেবিল সুন্দর দেখানোর জন্য কিছু কাস্টম স্টাইল */
        .table th, .table td {
            white-space: nowrap;
            padding: 12px 15px !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0px !important;
        }
    </style>
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
        <h2 class="fw-bold text-dark mb-0">Volunteer Registration List</h2>
        <!-- এড বাটনটি সরিয়ে দেওয়া হয়েছে -->
    </div>

    <!-- SECTION: VOLUNTEER TABLE -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="volunteerTable" class="table table-hover align-middle mb-0" style="width:100%">
                    <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Date of Birth</th>
                        <th>Current Address</th>
                        <th>Current Occupation</th>
                        <th>Current Work/Institute</th>
                        <th>Availability</th>
                        <th>Work Experience</th>
                        <th>About Volunteer</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- ডামি ডাটা ১ -->
                    <tr>
                        <td class="fw-semibold">Rahat Khan</td>
                        <td>rahat@example.com</td>
                        <td>01712345678</td>
                        <td>10 May 1998</td>
                        <td>Dhaka, Bangladesh</td>
                        <td>Student</td>
                        <td>Dhaka University</td>
                        <td>Part-Time (Weekends)</td>
                        <td>1 Year in Blood Donation Club</td>
                        <td>Passionate about social work and community development.</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="volunteer_view.php?id=1" class="btn btn-sm btn-outline-info" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="volunteer_delete.php?id=1" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <!-- ডামি ডাটা ২ -->
                    <tr>
                        <td class="fw-semibold">Sadia Rahman</td>
                        <td>sadia@example.com</td>
                        <td>01898765432</td>
                        <td>22 Aug 1995</td>
                        <td>Cox's Bazar</td>
                        <td>Teacher</td>
                        <td>Govt. High School</td>
                        <td>Full-Time (Evening)</td>
                        <td>No prior experience, fresh volunteer</td>
                        <td>Wants to contribute to child education in rural areas.</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="volunteer_view.php?id=2" class="btn btn-sm btn-outline-info" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="volunteer_delete.php?id=2" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
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

<!-- jQuery (DataTables এর জন্য আবশ্যিক) -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- SIDEBAR & DATATABLE INITIALIZATION SCRIPT -->
<script>
    $(document).ready(function() {
        // ডেটাটেবিল ইনিশিয়ালাইজেশন
        $('#volunteerTable').DataTable({
            "responsive": true,
            "language": {
                "search": "Search/Filter:",
                "lengthMenu": "Show _MENU_ entries"
            }
        });
    });

    // সাইডবার স্ক্রিপ্ট
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