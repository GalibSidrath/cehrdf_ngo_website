<?php 
    include 'session_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | CEHRDF Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>



        <!--HEADER SECTION(TOPBAR)-->
        <?php include 'dashboard-components/header.php'; ?>


        <!--SIDEBAR-->

        <?php include 'dashboard-components/sidebar.php'; ?>


        <!--MAIN COMPONENT-->

        <main class="admin-main">
            <?php include 'dashboard-components/maincontent.php'; ?>
        </main>












<!-- COMPONENT: MOBILE OVERLAY -->
<div class="admin-sidebar-overlay" id="sidebarOverlay"></div>

<!-- COMPONENT: MOBILE TOGGLE -->
<button class="admin-mobile-toggle" id="mobileToggle"><i class="fas fa-bars"></i></button>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- SECTION: SIDEBAR TOGGLE SCRIPT -->
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