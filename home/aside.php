<div class="col-md-4">
    <div class="position-sticky" style="top: 100px;">
        <!-- NOTICE BOARD -->
        <div class="card border-0 shadow-sm mb-4 sidebar-card">
            <div class="card-header text-white fw-bold py-3" style="background-color: #17252A;">
                <i class="fas fa-thumbtack me-2" style="color: #ff6b5b;"></i> Notice Board
            </div>
            <div class="card-body p-0">
                <div class="notice-scroll-area p-3">

                    <?php

                    $notice_query = "SELECT id, title, pub_date FROM notice ORDER BY pub_date DESC LIMIT 5";
                    $notice_result = mysqli_query($con, $notice_query);

                    if ($notice_result && mysqli_num_rows($notice_result) > 0) {

                        while ($notice_row = mysqli_fetch_assoc($notice_result)) {

                            $formatted_date = date("d M, Y", strtotime($notice_row['pub_date']));
                            ?>

                            <div class="notice-item pb-3 mb-3 border-bottom">
                                <span class="badge bg-secondary mb-2">Notice</span>

                                <a href="notice_details.php?id=<?php echo $notice_row['id']; ?>"
                                    class="d-block fw-semibold text-dark text-decoration-none notice-link">
                                    <?php echo htmlspecialchars($notice_row['title']); ?>
                                </a>

                                <small class="text-muted">
                                    <i class="far fa-clock me-1"></i> Published: <?php echo $formatted_date; ?>
                                </small>
                            </div>

                            <?php
                        }
                    } else {
                        echo '<div class="text-center text-muted p-3">No notices available right now.</div>';
                    }
                    ?>

                </div>
            </div>
            <div class="card-footer bg-white text-center py-2 border-top-0">
                <a href="notice/allnotice.php" target="_blank"
                    class="text-decoration-none small fw-bold text-primary-custom">View All Notices</a>
            </div>
        </div>



        <!-- VIDEOS & DOCUMENTARIES -->
        <div class="card border-0 shadow-sm mb-4 sidebar-card">
            <div class="card-header text-white fw-bold py-3" style="background-color: #2b7a78;">
                <i class="fas fa-video me-2"></i> Videos & Documentaries
            </div>
            <div class="card-body p-3">

                <?php
                // Query to fetch the latest 5 videos from the database
                $video_query = "SELECT id, title, url, vid FROM videos ORDER BY pub_date DESC LIMIT 5";
                $video_result = mysqli_query($con, $video_query);

                // Check if query is successful and returns data
                if ($video_result && mysqli_num_rows($video_result) > 0) {

                    // Loop through the fetched videos
                    while ($video_row = mysqli_fetch_assoc($video_result)) {

                        // Fetch YouTube thumbnail dynamically using the 'vid' field
                        $yt_thumbnail_backup = "https://img.youtube.com/vi/" . $video_row['vid'] . "/hqdefault.jpg";

                        ?>
                        <div class="d-flex mb-3 align-items-center sidebar-video-item border-bottom pb-3">

                            <div class="position-relative me-3 rounded overflow-hidden"
                                style="width: 100px; height: 70px; flex-shrink: 0;">

                                <img src="<?php echo $yt_thumbnail_backup; ?>" class="img-fluid w-100 h-100 object-fit-cover"
                                    alt="Video Thumbnail"
                                    onerror="this.src='https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&fit=crop&w=200&q=80'">

                                <div class="position-absolute top-50 start-50 translate-middle text-white">
                                    <i class="fas fa-play-circle fs-4 text-shadow"></i>
                                </div>
                            </div>

                            <div>
                                <h6 class="fw-bold mb-1 lh-sm">
                                    <a href="<?php echo htmlspecialchars($video_row['url']); ?>" target="_blank"
                                        class="text-dark text-decoration-none video-link-title">
                                        <?php echo htmlspecialchars($video_row['title']); ?>
                                    </a>
                                </h6>

                                <p class="text-muted mb-1" style="font-size: 0.75rem;">CEHRDF Video</p>

                                <a href="<?php echo htmlspecialchars($video_row['url']); ?>" target="_blank"
                                    class="text-decoration-none text-primary-custom fw-bold" style="font-size: 0.8rem;">Watch
                                    Video <i class="fas fa-external-link-alt ms-1" style="font-size: 0.7rem;"></i>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    // Fallback message if no videos exist in the database
                    echo '<div class="text-center text-muted p-3">No videos available right now.</div>';
                }
                ?>

            </div>

            <div class="card-footer bg-white text-center py-2 border-top-0">
                <a href="videos/allvideos.php" target="_blank"
                    class="text-decoration-none small fw-bold text-primary-custom">View All Videos & Documentaries</a>
            </div>
        </div>



        <!-- VOUCHER FOR DONATION AND VOLUNTEERING -->
        <div class="card border-0 shadow-sm p-4 text-center rounded-4"
            style="background-color: #f8f9fa; border-top: 4px solid #ff6b5b !important;">
            <h5 class="fw-bold text-dark mb-3">Be The Change</h5>
            <p class="text-muted small mb-4">Your support helps us expand our field operations.</p>
            <a href="donate/donate.php" target="_blank" class="btn text-white fw-bold w-100 mb-2 rounded-pill"
                style="background-color: #ff6b5b;">Donate Now</a>
            <a href="volunteerreg/volunteer-reg.php" target="_blank"
                class="btn btn-outline-dark fw-bold w-100 rounded-pill">Become a Volunteer</a>
        </div>
    </div>
</div>