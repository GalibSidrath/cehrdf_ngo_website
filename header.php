<!-- Header Section Start -->
<div class="top-bar text-white py-2 d-none d-md-block" style="background-color: #17252A;">
    <div class="container-xl d-flex justify-content-between align-items-center">
        <div class="small">
            <i class="fas fa-envelope me-2"></i>info@cehrdf.org
            <span class="mx-3 text-secondary">|</span>
            <i class="fas fa-phone-alt me-2"></i>+880 1XXX-XXXXXX
            <span class="mx-3 text-secondary">|</span>
            <i class="fas fa-map-marker-alt me-2"></i>Cox's Bazar, Bangladesh
        </div>
        <div>
            <a href="#" class="text-white me-3 text-decoration-none"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-3 text-decoration-none"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white me-3 text-decoration-none"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="text-white text-decoration-none"><i class="fab fa-youtube"></i></a>
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
    <div class="d-none d-md-block">
        <div class="container-xl d-flex align-items-center border-bottom">
            <a class="navbar-brand fs-1 fw-bold mb-0 text-dark text-decoration-none" href="<?= $basePath ?>index.php">
                <img src="<?= $basePath ?>images/logo.png" alt="logo" height="110" width="85">
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
                                    href="<?= $basePath ?>about.php#who-we-are">Who We
                                    Are</a></li>
                            <li><a class="dropdown-item fw-semibold text-muted"
                                    href="<?= $basePath ?>about.php#mission-vision-values">Mission & Vision</a></li>
                            <li><a class="dropdown-item fw-semibold text-muted"
                                    href="<?= $basePath ?>about.php#objectives">Objectives</a></li>
                            <li><a class="dropdown-item fw-semibold text-muted"
                                    href="<?= $basePath ?>about.php#our-founding-members">Founding Members</a></li>
                            <li><a class="dropdown-item fw-semibold text-muted"
                                    href="<?= $basePath ?>about.php#our-inspiration">Our Inspiration</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link fw-semibold text-dark text-nowrap"
                            href="<?= $basePath ?>programandproject.php">Programs & Projects</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold text-dark text-nowrap"
                            href="<?= $basePath ?>resources.php">Resources</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold text-dark text-nowrap"
                            href="<?= $basePath ?>media.php">Media</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold text-dark text-nowrap"
                            href="<?= $basePath ?>contact/contact.php">Contact & Career</a></li>
                </ul>
                <a href="<?= $basePath ?>donate.php" target="_blank"
                    class="btn btn-donate text-white fw-bold px-4 rounded-pill text-nowrap">Donate Now</a>
            </nav>
        </div>
    </div>

    <div class="d-flex d-md-none align-items-center justify-content-between px-3 mobile-header-bar">
        <button class="btn border-0 p-0 fs-3 text-dark" id="mobileMenuBtn">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand fs-2 fw-bold text-dark text-decoration-none" href="<?= $basePath ?>index.php">CEHRDF.</a>
        <a href="<?= $basePath ?>donate.php"
            class="btn btn-donate btn-sm text-white fw-bold px-3 rounded-pill">Donate</a>
    </div>
</header>
<div class="mobile-sidebar bg-white shadow" id="mobileSidebar">
    <ul class="list-unstyled p-3">
        <li class="mb-2"><a href="<?= $basePath ?>index.php"
                class="d-block py-2 fw-semibold text-dark text-decoration-none border-bottom">Home</a></li>

        <li class="mb-2">
            <a href="#aboutMenu" data-bs-toggle="collapse" aria-expanded="false"
                class="d-flex justify-content-between align-items-center py-2 fw-semibold text-dark text-decoration-none border-bottom">
                Who We Are <i class="fas fa-chevron-down small"></i>
            </a>
            <ul class="dropdown-menu border-0 shadow-sm rounded-3 mt-1" aria-labelledby="whoWeAreDropdown">
                <li><a class="dropdown-item fw-semibold text-muted" href="about.php#who-we-are">Who We
                        Are</a></li>
                <li><a class="dropdown-item fw-semibold text-muted"
                        href="<?= $basePath ?>about.php#mission-vision-values">Mission
                        & Vision</a></li>
                <li><a class="dropdown-item fw-semibold text-muted"
                        href="<?= $basePath ?>about.php#objectives">Objectives</a></li>
                <li><a class="dropdown-item fw-semibold text-muted"
                        href="<?= $basePath ?>about.php#our-founding-members">Founding
                        Members</a></li>
                <li><a class="dropdown-item fw-semibold text-muted" href="<?= $basePath ?>about.php#our-inspiration">Our
                        Inspiration</a></li>
            </ul>
        </li>

        <li class="mb-2"><a href="<?= $basePath ?>programandproject.php"
                class="d-block py-2 fw-semibold text-dark text-decoration-none border-bottom">Programs &
                Projects</a></li>
        <li class="mb-2"><a href="<?= $basePath ?>resources.php"
                class="d-block py-2 fw-semibold text-dark text-decoration-none border-bottom">Resources</a></li>
        <li class="mb-2"><a href="<?= $basePath ?>media.php"
                class="d-block py-2 fw-semibold text-dark text-decoration-none border-bottom">Media</a></li>
        <li class="mb-2"><a href="<?= $basePath ?>careercontact.php"
                class="d-block py-2 fw-semibold text-dark text-decoration-none">Contact & Career</a></li>
    </ul>
</div>
<!-- Header Section End -->