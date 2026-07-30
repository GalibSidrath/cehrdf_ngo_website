<div class="mb-5 pb-4 border-bottom">
    <h3 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3"
        style="border-color: #2b7a78 !important;">Recent News & Highlights</h3>

    <?php
    // Query to fetch the latest 5 news items from the database
    // We only select the fields required for this specific section
    $news_query = "SELECT id, title, short_des, img, pub_date FROM news WHERE feature = 1 ORDER BY pub_date DESC LIMIT 5";
    $news_result = mysqli_query($con, $news_query);

    // Check if the query is successful and returns at least one row
    if ($news_result && mysqli_num_rows($news_result) > 0) {
        
        // Loop through the fetched news items
        while ($news_row = mysqli_fetch_assoc($news_result)) {
            
            // Format the publication date (e.g., May 20, 2026)
            $formatted_news_date = date("M d, Y", strtotime($news_row['pub_date']));
            
            // Set the image path or use a default image if none is provided
            $news_image = !empty($news_row['img']) ? "admin-area/uploads/news-feature-img/" . $news_row['img'] : "https://images.unsplash.com/photo-1583212292454-1fe6229603b7?auto=format&fit=crop&w=400&q=80";

            ?>
            <div class="card border-0 shadow-sm mb-3 news-horizontal-card">
                <div class="row g-0 align-items-center">
                    
                    <div class="col-md-4">
                        <img src="<?php echo htmlspecialchars($news_image); ?>"
                            class="img-fluid rounded-start h-100 object-fit-cover" alt="News Image"
                            style="min-height: 150px;"
                            onerror="this.src='https://images.unsplash.com/photo-1583212292454-1fe6229603b7?auto=format&fit=crop&w=400&q=80'">
                    </div>
                    
                    <div class="col-md-8">
                        <div class="card-body">
                            
                            <p class="text-primary-custom small fw-bold mb-1">
                                <i class="far fa-calendar-alt me-1"></i> <?php echo $formatted_news_date; ?>
                            </p>
                            
                            <h5 class="card-title fw-bold">
                                <a href="mediaandnews/singledetailarticle.php?id=<?php echo $news_row['id']; ?>"
                                    class="text-dark text-decoration-none news-title-link">
                                    <?php echo htmlspecialchars($news_row['title']); ?>
                                </a>
                            </h5>
                            
                            <p class="card-text text-muted small mb-0">
                                <?php echo htmlspecialchars($news_row['short_des']); ?>
                            </p>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <?php
        }
    } else {
        // Fallback message if no news exists in the database
        echo '<div class="text-center text-muted p-4 border rounded bg-light mb-3">No recent news available at the moment.</div>';
    }
    ?>

    <div class="mt-3">
        <a href="mediaandnews/mediaandnews.php" target="_blank"
            class="fw-bold text-primary-custom text-decoration-none">Read More News <i
                class="fas fa-arrow-right ms-1"></i>
        </a>
    </div>
</div>