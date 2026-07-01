<!-- COMPONENT: SIDEBAR -->
<aside class="admin-sidebar" id="adminSidebar">
    <div class="admin-sidebar-header"><i class="fas fa-cogs me-2"></i> Admin Menu</div>
    <nav class="admin-sidebar-nav">
        <?php
        // Get current filename for active state
        $current = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

        // Base path for admin-area folder
        $base = '/cehrdf/admin-area/';
        ?>

        <a href="<?= $base ?>dashboard.php" class="admin-nav-link <?= $current == 'dashboard.php' ? 'active' : '' ?>">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>

        <a href="<?= $base ?>notice/notices.php" class="admin-nav-link <?= $current == 'notices.php' ? 'active' : '' ?>">
            <i class="fas fa-bell"></i>
            <span>Notices</span>
        </a>

        <a href="<?= $base ?>newsandmedia/newsandmedia.php" class="admin-nav-link <?= $current == 'newsandmedia.php' ? 'active' : '' ?>">
            <i class="fas fa-newspaper"></i>
            <span>News & Media</span>
        </a>

        <a href="<?= $base ?>videos/videos.php" class="admin-nav-link <?= $current == 'videos.php' ? 'active' : '' ?>">
            <i class="fas fa-video"></i>
            <span>Videos</span>
        </a>

        <a href="<?= $base ?>programsandprojects/programsandprojects.php" class="admin-nav-link <?= $current == 'programsandprojects.php' ? 'active' : '' ?>">
            <i class="fas fa-hands-helping"></i>
            <span>Programs and Projects</span>
        </a>


        <a href="<?= $base ?>training/training.php" class="admin-nav-link <?= $current == 'training.php' ? 'active' : '' ?>">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Trainings</span>
        </a>

        <a href="<?= $base ?>meeting/meetings.php" class="admin-nav-link <?= $current == 'meetings.php' ? 'active' : '' ?>">
            <i class="fas fa-users"></i>
            <span>Meetings</span>
        </a>

        <a href="<?= $base ?>career/jobs.php" class="admin-nav-link <?= $current == 'jobs.php' ? 'active' : '' ?>">
            <i class="fas fa-briefcase"></i>
            <span>Careers</span>
        </a>

        <a href="<?= $base ?>application/application.php" class="admin-nav-link <?= $current == 'application.php' ? 'active' : '' ?>">
            <i class="fas fa-file-alt"></i>
            <span>Applications</span>
        </a>

        <a href="<?= $base ?>teammembers/teammembers.php" class="admin-nav-link <?= $current == 'teammembers.php' ? 'active' : '' ?>">
            <i class="fas fa-user-tie"></i>
            <span>Team Members</span>
        </a>

        <a href="<?= $base ?>partner/partner.php" class="admin-nav-link <?= $current == 'partner.php' ? 'active' : '' ?>">
            <i class="fas fa-handshake"></i>
            <span>Partners</span>
        </a>

        <a href="<?= $base ?>volunteers/volunteers.php" class="admin-nav-link <?= $current == 'volunteers.php' ? 'active' : '' ?>">
            <i class="fas fa-hand-holding-heart"></i>
            <span>Volunteers</span>
        </a>

        <a href="<?= $base ?>messages/messages.php" class="admin-nav-link <?= $current == 'messages.php' ? 'active' : '' ?>">
            <i class="fas fa-envelope"></i>
            <span>Messages</span>
        </a>


        <a href="<?= $base ?>admins/admins.php" class="admin-nav-link <?= $current == 'admins.php' ? 'active' : '' ?>">
            <i class="fas fa-user-shield"></i>
            <span>Admin Users</span>
        </a>
    </nav>
</aside>