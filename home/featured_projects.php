<div class="mb-5 pb-4 border-bottom">
    <h3 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3"
        style="border-color: #2b7a78 !important;">Featured Projects</h3>
    
    <div class="row g-4">
        <?php
        // Query to fetch the latest 3 projects from the database
        // You can add "WHERE feature = 1" if you only want to show specifically featured items
        $project_query = "SELECT id, title, short_des, location, img FROM program WHERE feature = 1";
        $project_result = mysqli_query($con, $project_query);

        // Check if the query is successful and has data
        if ($project_result && mysqli_num_rows($project_result) > 0) {
            
            // Loop through each project
            while ($project_row = mysqli_fetch_assoc($project_result)) {
                
                // Define the image path dynamically
                // NOTE: Change 'uploads/programs/' to the actual folder where project images are saved
                $project_image = !empty($project_row['img']) ? "admin-area/uploads/project-feature-img/" . $project_row['img'] : "https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?auto=format&fit=crop&w=400&q=80";
                
                ?>
                <div class="col-md-4">
                    <div class="card h-100 border rounded-3 shadow-sm hover-lift overflow-hidden">
                        
                        <img src="<?php echo htmlspecialchars($project_image); ?>"
                            class="card-img-top object-fit-cover" alt="Project Image" style="height: 160px;"
                            onerror="this.src='https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?auto=format&fit=crop&w=400&q=80'">
                        
                        <div class="card-body p-3">
                            
                            <h6 class="fw-bold text-dark mb-1">
                                <a href="project/singleproject.php?id=<?php echo $project_row['id']; ?>" class="text-dark text-decoration-none">
                                    <?php echo htmlspecialchars($project_row['title']); ?>
                                </a>
                            </h6>
                            
                            <p class="text-muted small mb-2">
                                <i class="fas fa-map-marker-alt me-1 text-primary-custom"></i> 
                                <?php echo htmlspecialchars($project_row['location']); ?>
                            </p>
                            
                            <p class="small mb-0 text-muted">
                                <?php echo htmlspecialchars($project_row['short_des']); ?>
                            </p>
                            
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            // Fallback message if no projects exist in the database
            echo '<div class="col-12"><div class="text-center text-muted p-4 border rounded bg-light">No featured projects available right now.</div></div>';
        }
        ?>
    </div>
    
    <div class="mt-4">
        <a href="project/projects.php" target="_blank"
            class="fw-bold text-primary-custom text-decoration-none">View All Projects <i
                class="fas fa-arrow-right ms-1"></i>
        </a>
    </div>
</div>