<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEHRDF | Core Foundation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

    <style>
        @media (max-width: 767.98px) {
            .mobile-header-bar {
                min-height: 70px;
                /* হেডারের নির্দিষ্ট উচ্চতা সেট করা হলো */
            }

            #mobileSidebar {
                top: 70px !important;
                /* মেন্যু ঠিক হেডারের নিচ থেকে শুরু হবে */
                height: calc(100vh - 70px) !important;
                /* মেন্যুর উচ্চতা স্ক্রিনের সাথে এডজাস্ট হবে */
                z-index: 1010 !important;
                /* হেডারের নিচে থাকার জন্য */
            }
        }

        html {
            scroll-behavior: smooth;
        }

        /* ড্রপডাউনে ক্লিক করলে সেকশনটি হেডারের নিচে যেন ঢাকা না পড়ে */
        section[id],
        div[id] {
            scroll-margin-top: 120px;
        }

        /* Desktop Dropdown Hover */
        @media (min-width: 768px) {
            .dropdown:hover .dropdown-menu {
                display: block;
                margin-top: 0;
            }
        }
    </style>
</head>

<body class="bg-light">
    <?php include 'header.php'; ?>
    <!-- Main Section Start -->
    <?php include 'home/hero.php'; ?>
    <section class="py-5">
        <div class="container-xl py-3">
            <div class="row g-5">
                <div class="col-md-8">

                    <?php include 'home/welcome.php'; ?>
                    <?php include 'home/programs.php'; ?>
                    <?php include 'home/news.php'; ?>
                    <?php include 'home/featured_projects.php'; ?>
                    <?php include 'home/trainings.php'; ?>
                    <?php include 'home/meetings.php'; ?>
                    <?php include 'home/career.php'; ?>
                    <?php include 'home/partners.php'; ?>
                </div>
                <!-- Aside Section Start -->
                <?php include 'home/aside.php'; ?>
                <!-- Aside Section End -->
            </div>
        </div>
    </section>
    <?php include 'home/stats.php'; ?>
    <!-- Main Section End -->
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuBtn = document.getElementById("mobileMenuBtn");
            const sidebar = document.getElementById("mobileSidebar");

            menuBtn.addEventListener("click", function () {
                sidebar.classList.toggle("active");
                const icon = menuBtn.querySelector("i");
                if (sidebar.classList.contains("active")) {
                    icon.classList.remove("fa-bars");
                    icon.classList.add("fa-times");
                } else {
                    icon.classList.remove("fa-times");
                    icon.classList.add("fa-bars");
                }
            });
        });
    </script>
</body>

</html>
