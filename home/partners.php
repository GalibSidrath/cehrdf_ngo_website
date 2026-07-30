<div class="mb-5 pb-4 border-bottom">
    <h3 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3"
        style="border-color: #2b7a78 !important;">Whom We Are Associated With</h3>

    <div id="partnerSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner px-5 py-3">
            
            <?php
            // Fetch all partners from the database
            $partner_query = "SELECT id, name, logo FROM partner";
            $partner_result = mysqli_query($con, $partner_query);
            $partners = [];

            if ($partner_result && mysqli_num_rows($partner_result) > 0) {
                while ($row = mysqli_fetch_assoc($partner_result)) {
                    $partners[] = $row;
                }

                // Chunk the array into groups of 4 for the carousel
                $chunks = array_chunk($partners, 4);
                $is_first = true;

                foreach ($chunks as $slide_partners) {
                    ?>
                    <div class="carousel-item <?php echo $is_first ? 'active' : ''; ?>">
                        <div class="row g-4 justify-content-center text-center">
                            
                            <?php foreach ($slide_partners as $partner) {
                                $logo_path = "admin-area/uploads/partners/" . $partner['logo'];
                            ?>
                                <div class="col-6 col-md-3">
                                    <div class="bg-white border shadow-sm rounded-4 d-flex align-items-center justify-content-center mx-auto mb-3"
                                        style="width: 110px; height: 110px; padding: 10px;">
                                        <img src="<?php echo htmlspecialchars($logo_path); ?>"
                                            alt="<?php echo htmlspecialchars($partner['name']); ?>" 
                                            class="img-fluid object-fit-contain"
                                            style="max-height: 100%; max-width: 100%;"
                                            onerror="this.src='https://via.placeholder.com/100/ffffff/999999?text=Logo'">
                                    </div>
                                    <h6 class="fw-bold text-muted small mb-0"><?php echo htmlspecialchars($partner['name']); ?></h6>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <?php
                    $is_first = false;
                }
            } else {
                echo '<p class="text-center text-muted">No partners found.</p>';
            }
            ?>
        </div>

        <!-- Slider Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#partnerSlider"
            data-bs-slide="prev" style="width: 5%; filter: invert(100%);">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#partnerSlider"
            data-bs-slide="next" style="width: 5%; filter: invert(100%);">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>