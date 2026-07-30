<?php
// Include the database connection
include '../config/connection.php';

// Get the article ID from the URL and validate it
$article_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query to fetch the specific article
$query = "SELECT id, title, short_des, category, img, author, pub_date, feature, content FROM news WHERE id = $article_id";
$result = mysqli_query($con, $query);

// Check if the article exists
if ($result && mysqli_num_rows($result) > 0) {
    $news = mysqli_fetch_assoc($result);
} else {
    // Redirect back to the news page if ID is invalid or not found
    header("Location: mediaandnews.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($news['title']); ?> | CEHRDF</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>
<body class="bg-light">

    <?php include '../header.php'; ?>

    <section class="py-5 bg-white">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    
                    <div class="article-header mb-4">
                        <span class="badge bg-primary-custom mb-3 px-3 py-2 rounded-pill shadow-sm">
                            <?php echo htmlspecialchars($news['category']); ?>
                        </span>
                        <h1 class="fw-bold text-dark mb-3 lh-sm"><?php echo htmlspecialchars($news['title']); ?></h1>
                        
                        <div class="d-flex align-items-center text-muted small border-top border-bottom py-2 mt-3">
                            <span class="me-3"><i class="far fa-calendar-alt me-1"></i> <?php echo date("M d, Y", strtotime($news['pub_date'])); ?></span>
                            <span class="me-3"><i class="far fa-user me-1"></i> <?php echo htmlspecialchars($news['author']); ?></span>
                        </div>
                    </div>

                    <div class="article-featured-image mb-5">
                        <img src="../admin-area/uploads/news-feature-img/<?php echo htmlspecialchars($news['img']); ?>" 
                             class="img-fluid rounded-4 shadow-sm w-100" 
                             alt="<?php echo htmlspecialchars($news['title']); ?>"
                             onerror="this.src='https://via.placeholder.com/1200x600'">
                    </div>

                    <div class="article-body fs-6 lh-lg text-dark">
                        <?php echo $news['content']; ?>
                    </div>

                    <div class="article-footer border-top pt-4 mt-5 d-flex flex-wrap justify-content-between align-items-center gap-3">
                        <div class="tags">
                            <span class="fw-bold text-dark me-2 small">Category:</span>
                            <span class="badge bg-light text-dark border"><?php echo htmlspecialchars($news['category']); ?></span>
                        </div>
                        
                        <div class="social-share">
                            <span class="fw-bold text-dark me-2 small">Share:</span>
                            <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle px-2 py-1 me-1"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle px-2 py-1 me-1"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle px-2 py-1"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php include '../footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuBtn = document.getElementById("mobileMenuBtn");
            const sidebar = document.getElementById("mobileSidebar");
            if(menuBtn && sidebar) {
                menuBtn.addEventListener("click", function() {
                    sidebar.classList.toggle("active");
                    const icon = menuBtn.querySelector("i");
                    icon.classList.toggle("fa-bars");
                    icon.classList.toggle("fa-times");
                });
            }
        });
    </script>
</body>
</html>