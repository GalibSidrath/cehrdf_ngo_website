<!-- Header Section Start -->
<div class="top-bar text-white py-2 d-none d-md-block" style="background-color: #17252A;">
    <div class="container-xl d-flex justify-content-between align-items-center">
        <div class="small">
            <i class="fas fa-envelope me-2"></i>cehrdf.org@gmail.com
            <span class="mx-3 text-secondary">|</span>
            <i class="fas fa-phone-alt me-2"></i>01876-044999 | 01827-823531 | 01886-475216
            <span class="mx-3 text-secondary">|</span>
            <i class="fas fa-map-marker-alt me-2"></i>Cox's Bazar, Bangladesh
        </div>
    </div>
</div>

<?php
$basePath = './';
$headerDir = str_replace('\\', '/', dirname(__FILE__));
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_FILENAME']));
if (strpos($scriptDir, $headerDir) === 0 && $headerDir !== $scriptDir) {
    $subPath = trim(substr($scriptDir, strlen($headerDir)), '/');
    $basePath = str_repeat('../', substr_count($subPath, '/') + 1);
}
?>
<header class="sticky-top bg-white shadow-sm header-wrapper">
    <!-- Desktop Navbar -->
    <div class="d-none d-md-block">
        <div class="container-xl d-flex align-items-center border-bottom">
            <a class="navbar-brand fs-1 fw-bold mb-0 text-dark text-decoration-none" href="<?= $basePath ?>index.php">
                <img src="<?= $basePath ?>images/logo.png" alt="logo" height="90" width="90" class="me-2">
            </a>
            <div class="vertical-divider mx-4"></div>
            <h1 class="fs-5 fw-semibold text-muted mb-0 lh-sm">
                Centre for Environment, Human Rights <br> & Development Forum
            </h1>
        </div>
        <div class="container-xl">
            <nav class="navbar navbar-expand-md py-1">
                <ul class="navbar-nav me-auto gap-1 gap-lg-3">
                    <li class="nav-item"><a class="nav-link fw-semibold text-dark text-nowrap"
                            href="<?= $basePath ?>index.php">Home</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link fw-semibold text-dark text-nowrap dropdown-toggle" href="#"
                            id="whoWeAreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Who We Are
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm rounded-3 mt-1" aria-labelledby="whoWeAreDropdown">
                            <li><a class="dropdown-item fw-semibold text-muted"
                                    href="<?= $basePath ?>about/about.php#who-we-are">Who We Are</a></li>
                            <li><a class="dropdown-item fw-semibold text-muted"
                                    href="<?= $basePath ?>about/about.php#mission">Our Core Mission</a></li>
                            <li><a class="dropdown-item fw-semibold text-muted"
                                    href="<?= $basePath ?>about/about.php#vision">Vision 2031</a></li>
                            <li><a class="dropdown-item fw-semibold text-muted"
                                    href="<?= $basePath ?>about/about.php#objectives">Our Core Values</a></li>
                            <li><a class="dropdown-item fw-semibold text-muted"
                                    href="<?= $basePath ?>about/about.php#founder-statement">Founder Statement</a></li>
                            <li><a class="dropdown-item fw-semibold text-muted"
                                    href="<?= $basePath ?>about/about.php#how-we-do">How We Do</a></li>
                            <li><a class="dropdown-item fw-semibold text-muted"
                                    href="<?= $basePath ?>about/about.php#our-board-members">Board Members</a></li>
                            <li><a class="dropdown-item fw-semibold text-muted"
                                    href="<?= $basePath ?>about/about.php#our-inspiration">Our Inspiration</a></li>
                            <li><a class="dropdown-item fw-semibold text-muted"
                                    href="<?= $basePath ?>about/about.php#partners">Partners & Networks</a></li>
                            <li><a class="dropdown-item fw-semibold text-muted"
                                    href="<?= $basePath ?>about/about.php#where-we-work">Where We Work</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link fw-semibold text-dark text-nowrap"
                            href="<?= $basePath ?>mediaandnews/mediaandnews.php">News & Highlights</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold text-dark text-nowrap"
                            href="<?= $basePath ?>project/projects.php">Program & Projects</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold text-dark text-nowrap"
                            href="<?= $basePath ?>training/alltrainings.php">Trainings</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold text-dark text-nowrap"
                            href="<?= $basePath ?>meeting/allmeetings.php">Meetings & Minutes</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold text-dark text-nowrap"
                            href="<?= $basePath ?>job/alljobs.php">Careers</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold text-dark text-nowrap"
                            href="<?= $basePath ?>contact/contact.php">Contact Us</a></li>
                </ul>
                <a href="<?= $basePath ?>donate.php" target="_blank"
                    class="btn btn-donate text-white fw-bold px-4 rounded-pill text-nowrap">Donate Now</a>
            </nav>
        </div>
    </div>

    <!-- Mobile Header Bar -->
    <div class="d-flex d-md-none align-items-center justify-content-between px-3 mobile-header-bar">
        <button class="btn border-0 p-0 fs-3 text-dark" id="mobileMenuBtn">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand fs-2 fw-bold text-dark text-decoration-none" href="<?= $basePath ?>index.php">CEHRDF.</a>
        <a href="<?= $basePath ?>donate.php"
            class="btn btn-donate btn-sm text-white fw-bold px-3 rounded-pill">Donate</a>
    </div>
</header>

<!-- Mobile Sidebar -->
<div class="mobile-sidebar bg-white shadow" id="mobileSidebar">
    <ul class="list-unstyled p-3 mb-0">
        <!-- Home -->
        <li class="mb-2">
            <a href="<?= $basePath ?>index.php"
                class="d-block py-2 fw-semibold text-dark text-decoration-none border-bottom">Home</a>
        </li>

        <!-- Who We Are Dropdown -->
        <li class="mb-2">
            <a href="#aboutMenu" data-bs-toggle="collapse" aria-expanded="false"
                class="d-flex justify-content-between align-items-center py-2 fw-semibold text-dark text-decoration-none border-bottom">
                Who We Are <i class="fas fa-chevron-down small"></i>
            </a>
            <ul class="collapse list-unstyled ps-3 mt-1" id="aboutMenu">
                <li><a class="dropdown-item fw-semibold text-muted py-2"
                        href="<?= $basePath ?>about/about.php#who-we-are">Who We Are</a></li>
                <li><a class="dropdown-item fw-semibold text-muted py-2"
                        href="<?= $basePath ?>about/about.php#mission">Our Core Mission</a></li>
                <li><a class="dropdown-item fw-semibold text-muted py-2"
                        href="<?= $basePath ?>about/about.php#vision">Vision 2031</a></li>
                <li><a class="dropdown-item fw-semibold text-muted py-2"
                        href="<?= $basePath ?>about/about.php#objectives">Our Core Values</a></li>
                <li><a class="dropdown-item fw-semibold text-muted py-2"
                        href="<?= $basePath ?>about/about.php#founder-statement">Founder Statement</a></li>
                <li><a class="dropdown-item fw-semibold text-muted py-2"
                        href="<?= $basePath ?>about/about.php#how-we-do">How We Do</a></li>
                <li><a class="dropdown-item fw-semibold text-muted py-2"
                        href="<?= $basePath ?>about/about.php#our-board-members">Board Members</a></li>
                <li><a class="dropdown-item fw-semibold text-muted py-2"
                        href="<?= $basePath ?>about/about.php#our-inspiration">Our Inspiration</a></li>
                <li><a class="dropdown-item fw-semibold text-muted py-2"
                        href="<?= $basePath ?>about/about.php#partners">Partners & Networks</a></li>
                <li><a class="dropdown-item fw-semibold text-muted py-2"
                        href="<?= $basePath ?>about/about.php#where-we-work">Where We Work</a></li>
            </ul>
        </li>

        <!-- News & Highlights -->
        <li class="mb-2">
            <a href="<?= $basePath ?>mediaandnews/mediaandnews.php"
                class="d-block py-2 fw-semibold text-dark text-decoration-none border-bottom">News & Highlights</a>
        </li>

        <!-- Program & Projects -->
        <li class="mb-2">
            <a href="<?= $basePath ?>project/projects.php"
                class="d-block py-2 fw-semibold text-dark text-decoration-none border-bottom">Program & Projects</a>
        </li>

        <!-- Trainings -->
        <li class="mb-2">
            <a href="<?= $basePath ?>training/alltrainings.php"
                class="d-block py-2 fw-semibold text-dark text-decoration-none border-bottom">Trainings</a>
        </li>

        <!-- Meetings & Minutes -->
        <li class="mb-2">
            <a href="<?= $basePath ?>meeting/allmeetings.php"
                class="d-block py-2 fw-semibold text-dark text-decoration-none border-bottom">Meetings & Minutes</a>
        </li>

        <!-- Careers -->
        <li class="mb-2">
            <a href="<?= $basePath ?>job/alljobs.php"
                class="d-block py-2 fw-semibold text-dark text-decoration-none border-bottom">Careers</a>
        </li>

        <!-- Contact Us -->
        <li class="mb-2">
            <a href="<?= $basePath ?>contact/contact.php"
                class="d-block py-2 fw-semibold text-dark text-decoration-none">Contact Us</a>
        </li>
    </ul>
</div>
<!-- Header Section End -->