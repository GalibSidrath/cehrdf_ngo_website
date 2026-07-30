<div class="mb-5 pb-4 border-bottom">
    <h3 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3"
        style="border-color: #2b7a78 !important;">Our Trainings</h3>

    <?php
    $training_query = "SELECT id, title, short_des, img, status FROM training ORDER BY id DESC LIMIT 5";
    $training_result = mysqli_query($con, $training_query);

    if ($training_result && mysqli_num_rows($training_result) > 0) {
        
        while ($training_row = mysqli_fetch_assoc($training_result)) {
            
            $training_img = !empty($training_row['img']) ? "admin-area/uploads/training-feature-img/" . $training_row['img'] : "https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=300&q=80";
            
            $status_raw = strtolower(trim($training_row['status']));
            $status_text = ucfirst($training_row['status']);
            $badge_class = "bg-primary text-white"; 

            if ($status_raw == 'upcoming') {
                $badge_class = "bg-warning text-dark";
            } elseif ($status_raw == 'ongoing') {
                $badge_class = "bg-success text-white";
            } elseif ($status_raw == 'finished' || $status_raw == 'completed') {
                $badge_class = "bg-secondary text-white";
            }
            ?>
            
            <div class="card border-0 shadow-sm mb-3 training-card">
                <div class="row g-0 align-items-center">
                    <div class="col-md-3">
                        <img src="<?php echo htmlspecialchars($training_img); ?>"
                            class="img-fluid rounded-start h-100 object-fit-cover" alt="Training Thumbnail"
                            style="min-height: 130px;"
                            onerror="this.src='https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=300&q=80'">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body py-3">
                            <h5 class="fw-bold mb-1 text-dark">
                                <?php echo htmlspecialchars($training_row['title']); ?>
                            </h5>
                            <p class="text-muted small mb-2">
                                <?php echo htmlspecialchars($training_row['short_des']); ?>
                            </p>
                            <?php if(!empty($status_text)): ?>
                                <span class="badge <?php echo $badge_class; ?> border">
                                    <?php echo htmlspecialchars($status_text); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-3 text-md-end text-start px-3 pb-3 pb-md-0">
                        <a href="training/singletraining.php?id=<?php echo $training_row['id']; ?>" 
                           class="text-decoration-none fw-bold text-primary-custom small">View Full Details <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <?php
        }
    } else {
        echo '<div class="text-center text-muted p-4 border rounded bg-light mb-3">No trainings available at the moment.</div>';
    }
    ?>

    <div class="mt-3">
        <a href="training/alltrainings.php" target="_blank"
            class="fw-bold text-primary-custom text-decoration-none">View All Trainings <i
                class="fas fa-arrow-right ms-1"></i>
        </a>
    </div>
</div>