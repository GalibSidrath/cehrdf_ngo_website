<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Members | CEHRDF Admin</title>
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
        <h2 class="fw-bold text-dark mb-0">Team Members</h2>
        <a href="addmember.php" class="btn btn-success">
            <i class="fas fa-plus me-2"></i>Add Member
        </a>
    </div>

    <!-- SECTION: TEAM MEMBERS TABLE -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 70px;">Photo</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Member Type</th>
                        <th>Contact</th>
                        <th class="text-center" style="width: 100px;">Edit</th>
                        <th class="text-center pe-4" style="width: 100px;">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="ps-4">
                            <img src="../uploads/team/dr_rahim.jpg" alt="Member" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td class="fw-semibold">Dr. Rahim Uddin</td>
                        <td>Executive Director</td>
                        <td>Management</td>
                        <td><span class="badge bg-dark">Founder</span></td>
                        <td>
                            <div class="small text-muted">rahim@cehrdf.org</div>
                            <div class="small text-muted">+880 1712-345678</div>
                        </td>
                        <td class="text-center">
                            <a href="team_edit.php?id=1" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td class="text-center pe-4">
                            <a href="team_delete.php?id=1" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                            <img src="../uploads/team/fatima.jpg" alt="Member" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td class="fw-semibold">Fatima Begum</td>
                        <td>Director of Programs</td>
                        <td>Programs</td>
                        <td><span class="badge bg-primary">Board</span></td>
                        <td>
                            <div class="small text-muted">fatima@cehrdf.org</div>
                            <div class="small text-muted">+880 1819-876543</div>
                        </td>
                        <td class="text-center">
                            <a href="team_edit.php?id=2" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td class="text-center pe-4">
                            <a href="team_delete.php?id=2" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                            <img src="../uploads/team/karim.jpg" alt="Member" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td class="fw-semibold">Karim Hossain</td>
                        <td>Finance Manager</td>
                        <td>Finance</td>
                        <td><span class="badge bg-success">Staff</span></td>
                        <td>
                            <div class="small text-muted">karim@cehrdf.org</div>
                            <div class="small text-muted">+880 1911-223344</div>
                        </td>
                        <td class="text-center">
                            <a href="team_edit.php?id=3" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td class="text-center pe-4">
                            <a href="team_delete.php?id=3" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                            <img src="../uploads/team/ayesha.jpg" alt="Member" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td class="fw-semibold">Ayesha Siddika</td>
                        <td>Program Coordinator</td>
                        <td>Programs</td>
                        <td><span class="badge bg-info">Advisor</span></td>
                        <td>
                            <div class="small text-muted">ayesha@cehrdf.org</div>
                            <div class="small text-muted">+880 1612-334455</div>
                        </td>
                        <td class="text-center">
                            <a href="team_edit.php?id=4" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td class="text-center pe-4">
                            <a href="team_delete.php?id=4" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                            <img src="../uploads/team/ali.jpg" alt="Member" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td class="fw-semibold">Mohammad Ali</td>
                        <td>Field Officer</td>
                        <td>Operations</td>
                        <td><span class="badge bg-warning text-dark">Volunteer</span></td>
                        <td>
                            <div class="small text-muted">ali@cehrdf.org</div>
                            <div class="small text-muted">+880 1713-445566</div>
                        </td>
                        <td class="text-center">
                            <a href="team_edit.php?id=5" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td class="text-center pe-4">
                            <a href="team_delete.php?id=5" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
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