<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages | CEHRDF Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- DataTables Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="../styles.css">
    <style>
        .table th, .table td {
            padding: 12px 15px !important;
        }
        /* মেসেজ কলামটি যেন অতিরিক্ত লম্বা না হয়ে সুন্দরভাবে নিচে নামে */
        .msg-cell {
            min-width: 250px;
            max-width: 400px;
            white-space: normal !important;
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
        <h2 class="fw-bold text-dark mb-0">Messages</h2>
    </div>

    <!-- SECTION: MESSAGES TABLE -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="messageTable" class="table table-hover align-middle mb-0" style="width:100%">
                    <thead class="table-light">
                    <tr>
                        <th style="width: 20%;">Name</th>
                        <th style="width: 20%;">Email Address</th>
                        <th style="width: 45%;">Message</th>
                        <th class="text-center" style="width: 15%;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- ডামি ডাটা ১ -->
                    <tr>
                        <td class="fw-semibold">Kamrul Hasan</td>
                        <td>kamrul@example.com</td>
                        <td class="msg-cell">I want to collaborate with CEHRDF for an upcoming youth development project in Cox's Bazar. Please let me know the procedure.</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="message_view.php?id=1" class="btn btn-sm btn-outline-info" title="View Message">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="message_delete.php?id=1" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this message?')" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <!-- ডামি ডাটা ২ -->
                    <tr>
                        <td class="fw-semibold">Nusrat Jahan</td>
                        <td>nusrat@example.com</td>
                        <td class="msg-cell">Hello, is there any upcoming training program for rural women? I would like to register as an instructor. Thank you!</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="message_view.php?id=2" class="btn btn-sm btn-outline-info" title="View Message">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="message_delete.php?id=2" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this message?')" title="Delete">
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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- SIDEBAR & DATATABLE INITIALIZATION SCRIPT -->
<script>
    $(document).ready(function() {
        // মেসেজ টেবিল ডেটাটেবিল ইনিশিয়ালাইজেশন
        $('#messageTable').DataTable({
            "responsive": true,
            "order": [], // ডিফল্ট কোনো সর্টিং না রেখে ডাটাবেজের ক্রমানুসারে দেখাবে
            "language": {
                "search": "Search Message:",
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
</html>s
