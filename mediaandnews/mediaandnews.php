<?php
// Include the database connection file
include '../config/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News & Media | CEHRDF</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../styles.css"> 
</head>
<body class="bg-light">

    <?php include '../header.php'; ?>

    <section class="media-banner text-center text-white py-5">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3 text-shadow">News & Media</h1>
            <p class="lead fs-5 w-100 w-md-75 mx-auto opacity-75">Stay updated with our latest field activities, press releases, and stories of change from the coastal communities of Bangladesh.</p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="row g-4">
                
                <?php
                // Fetch news data from database
                $news_query = "SELECT id, title, short_des, category, img, author, pub_date, feature, content FROM news ORDER BY pub_date DESC";
                $news_result = mysqli_query($con, $news_query);

                if ($news_result && mysqli_num_rows($news_result) > 0) {
                    while ($row = mysqli_fetch_assoc($news_result)) {
                        // Image path definition
                        $img_path = "../admin-area/uploads/news-feature-img/" . $row['img'];
                        $formatted_date = date("M d, Y", strtotime($row['pub_date']));
                ?>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 rounded-4 shadow-sm news-card-vertical overflow-hidden">
                        <div class="position-relative">
                            <img src="<?php echo !empty($row['img']) ? htmlspecialchars($img_path) : 'https://via.placeholder.com/600x400'; ?>" 
                                 class="card-img-top object-fit-cover" 
                                 alt="News Image" 
                                 style="height: 220px;">
                            
                            <span class="badge bg-primary-custom position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill shadow-sm">
                                <?php echo htmlspecialchars($row['category']); ?>
                            </span>
                        </div>
                        
                        <div class="card-body p-4 d-flex flex-column">
                            <p class="text-primary-custom small fw-bold mb-2">
                                <i class="far fa-calendar-alt me-1"></i> <?php echo $formatted_date; ?>
                            </p>
                            
                            <h5 class="card-title fw-bold mb-3">
                                <a href="singledetailarticle.php?id=<?php echo $row['id']; ?>" class="text-dark text-decoration-none news-title-link">
                                    <?php echo htmlspecialchars($row['title']); ?>
                                </a>
                            </h5>
                            
                            <p class="card-text text-muted small mb-4 flex-grow-1">
                                <?php echo htmlspecialchars($row['short_des']); ?>
                            </p>
                            
                            <a href="singledetailarticle.php?id=<?php echo $row['id']; ?>" class="text-decoration-none fw-bold text-primary-custom border-top pt-3 d-inline-block w-100">
                                Read Full Article <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <?php 
                    }
                } else {
                    echo '<div class="col-12 text-center py-5"><p class="text-muted">No news articles found at the moment.</p></div>';
                }
                ?>

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