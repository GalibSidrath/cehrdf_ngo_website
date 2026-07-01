<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partners | CEHRDF Admin</title>
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
        <h2 class="fw-bold text-dark mb-0">Partners</h2>
        <a href="addnewpartner.php" class="btn btn-success">
            <i class="fas fa-plus me-2"></i>Add Partner
        </a>
    </div>

    <!-- SECTION: PARTNERS TABLE -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 100px;">Logo</th>
                        <th>Partner Name</th>
                        <th>Agreement Date</th>
                        <th class="text-center" style="width: 100px;">Edit</th>
                        <th class="text-center pe-4" style="width: 100px;">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="ps-4">
                            <img src="../uploads/partners/unicef.png" alt="UNICEF" class="rounded" style="width: 80px; height: 50px; object-fit: contain; background: #f8f9fa; padding: 5px;">
                        </td>
                        <td class="fw-semibold">UNICEF Bangladesh</td>
                        <td>Jan 15, 2025</td>
                        <td class="text-center">
                            <a href="partner_edit.php?id=1" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td class="text-center pe-4">
                            <a href="partner_delete.php?id=1" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                            <img src="../uploads/partners/brac.png" alt="BRAC" class="rounded" style="width: 80px; height: 50px; object-fit: contain; background: #f8f9fa; padding: 5px;">
                        </td>
                        <td class="fw-semibold">BRAC</td>
                        <td>Mar 22, 2025</td>
                        <td class="text-center">
                            <a href="partner_edit.php?id=2" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td class="text-center pe-4">
                            <a href="partner_delete.php?id=2" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                            <img src="../uploads/partners/undp.png" alt="UNDP" class="rounded" style="width: 80px; height: 50px; object-fit: contain; background: #f8f9fa; padding: 5px;">
                        </td>
                        <td class="fw-semibold">UNDP Bangladesh</td>
                        <td>Jun 10, 2025</td>
                        <td class="text-center">
                            <a href="partner_edit.php?id=3" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td class="text-center pe-4">
                            <a href="partner_delete.php?id=3" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </a>
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
