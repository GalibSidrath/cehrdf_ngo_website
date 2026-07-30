<div class="mb-5 pb-4 border-bottom">
    <h3 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3"
        style="border-color: #2b7a78 !important;">Meetings & Minutes</h3>

    <?php
    $meeting_query = "SELECT id, title, date FROM meetings ORDER BY date DESC LIMIT 5";
    $meeting_result = mysqli_query($con, $meeting_query);

    if ($meeting_result && mysqli_num_rows($meeting_result) > 0) {
        
        while ($meeting_row = mysqli_fetch_assoc($meeting_result)) {
            
            $formatted_date = date("M d, Y", strtotime($meeting_row['date']));
            ?>
            
            <div class="card border-0 shadow-sm mb-3 hover-lift"
                style="border-left: 4px solid #2b7a78 !important; background-color: #f8f9fa;">
                <div class="card-body p-3 d-flex flex-column flex-md-row align-items-md-center gap-3">
                    
                    <div class="text-muted fw-bold small d-flex align-items-center" style="min-width: 150px;">
                        <i class="far fa-calendar-alt me-2 text-primary-custom"></i> <?php echo $formatted_date; ?>
                    </div>

                    <div class="flex-grow-1">
                        <h6 class="fw-bold text-dark mb-0">
                            <?php echo htmlspecialchars($meeting_row['title']); ?>
                        </h6>
                    </div>

                    <div class="text-md-end mt-2 mt-md-0">
                        <a href="meeting/singlemeeting.php?id=<?php echo $meeting_row['id']; ?>" target="_blank"
                            class="btn btn-sm btn-outline-primary-custom fw-bold rounded-pill px-3">
                            View Full Meeting Minutes <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                    
                </div>
            </div>

            <?php
        }
    } else {
        echo '<div class="text-center text-muted p-4 border rounded bg-light mb-3">No meetings available at the moment.</div>';
    }
    ?>

    <div class="mt-4">
        <a href="meeting/allmeetings.php" target="_blank"
            class="fw-bold text-primary-custom text-decoration-none">View All Meetings <i
                class="fas fa-arrow-right ms-1"></i></a>
    </div>
</div>