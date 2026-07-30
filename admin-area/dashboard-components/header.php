<!-- COMPONENT: HEADER -->
<header class="admin-header">
    <div class="admin-header-inner">
        <a href="<?= $basePath ?>admin-area/dashboard.php" class="admin-logo">
            <img src="<?php echo explode('/admin-area/', $_SERVER['REQUEST_URI'])[0]; ?>/images/logo.png" alt="logo" height="80" width="60">
            </a>
            <div class="admin-header-right">
                <span class="admin-username"><i class="fas fa-user-circle me-1"></i> <?php
                echo $_SESSION['admin_username'];
                ?></span>
                <a href="<?php echo explode('/admin-area/', $_SERVER['REQUEST_URI'])[0]; ?>/admin-area/logout.php"
                    class="admin-logout-btn"><i class="fas fa-sign-out-alt me-1"></i> Logout</a>
            </div>
    </div>
</header>