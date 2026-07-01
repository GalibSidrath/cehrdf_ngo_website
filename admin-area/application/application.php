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
                <tr>
                    <td class="ps-4">1</td>
                    <td class="fw-semibold">Rahim Uddin</td>
                    <td>rahim@gmail.com</td>
                    <td>+880 1712-345678</td>
                    <td><span class="badge bg-primary">Program Officer</span></td>
                    <td>Jun 25, 2026</td>
                    <td>
                        <a href="../uploads/cv/cv_rahim.pdf" target="_blank" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-file-pdf me-1"></i>View
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="application_view.php?id=1" class="btn btn-sm btn-outline-primary me-1" title="View Details">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="application_delete.php?id=1" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')" title="Delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="ps-4">2</td>
                    <td class="fw-semibold">Fatima Begum</td>
                    <td>fatima@yahoo.com</td>
                    <td>+880 1819-876543</td>
                    <td><span class="badge bg-primary">Program Officer</span></td>
                    <td>Jun 24, 2026</td>
                    <td>
                        <a href="../uploads/cv/cv_fatima.pdf" target="_blank" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-file-pdf me-1"></i>View
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="application_view.php?id=2" class="btn btn-sm btn-outline-primary me-1" title="View Details">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="application_delete.php?id=2" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')" title="Delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="ps-4">3</td>
                    <td class="fw-semibold">Karim Hossain</td>
                    <td>karim@hotmail.com</td>
                    <td>+880 1911-223344</td>
                    <td><span class="badge bg-warning text-dark">Field Coordinator</span></td>
                    <td>Jun 23, 2026</td>
                    <td>
                        <a href="../uploads/cv/cv_karim.pdf" target="_blank" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-file-pdf me-1"></i>View
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="application_view.php?id=3" class="btn btn-sm btn-outline-primary me-1" title="View Details">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="application_delete.php?id=3" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')" title="Delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="ps-4">4</td>
                    <td class="fw-semibold">Ayesha Siddika</td>
                    <td>ayesha@gmail.com</td>
                    <td>+880 1612-334455</td>
                    <td><span class="badge bg-info">Finance Assistant</span></td>
                    <td>Jun 22, 2026</td>
                    <td>
                        <a href="../uploads/cv/cv_ayesha.pdf" target="_blank" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-file-pdf me-1"></i>View
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="application_view.php?id=4" class="btn btn-sm btn-outline-primary me-1" title="View Details">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="application_delete.php?id=4" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')" title="Delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="ps-4">5</td>
                    <td class="fw-semibold">Mohammad Ali</td>
                    <td>ali@outlook.com</td>
                    <td>+880 1713-445566</td>
                    <td><span class="badge bg-warning text-dark">Field Coordinator</span></td>
                    <td>Jun 21, 2026</td>
                    <td>
                        <a href="../uploads/cv/cv_ali.pdf" target="_blank" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-file-pdf me-1"></i>View
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="application_view.php?id=5" class="btn btn-sm btn-outline-primary me-1" title="View Details">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="application_delete.php?id=5" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')" title="Delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
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
    $(document).ready(function() {
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