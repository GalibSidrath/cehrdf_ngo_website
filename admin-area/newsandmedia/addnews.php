<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News | CEHRDF Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<!-- HEADER SECTION (TOPBAR) -->
<?php include '../dashboard-components/header.php'; ?>

<!-- SIDEBAR -->
<?php include '../dashboard-components/sidebar.php'; ?>

<!-- MAIN COMPONENT -->
<main class="admin-main">

    <!-- SECTION: PAGE TITLE + BACK BUTTON -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark mb-0">Add News</h2>
    </div>

    <!-- SECTION: NEWS FORM -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="news_save.php" method="POST" enctype="multipart/form-data">

                <!-- Title -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">News Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter news title" required>
                </div>

                <!-- Excerpt -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Short Excerpt</label>
                    <textarea name="excerpt" class="form-control" rows="2" placeholder="Brief summary of the news (2-3 lines)"></textarea>
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                    <select name="category" class="form-select" required>
                        <option value="">Select Category</option>
                        <option value="news">News</option>
                        <option value="press_release">Press Release</option>
                        <option value="success_story">Success Story</option>
                        <option value="blog">Blog</option>
                    </select>
                </div>

                <!-- Featured Image -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Featured Image <span class="text-danger">*</span></label>
                    <input type="file" name="featured_image" class="form-control" accept="image/*" required>
                    <div class="form-text">Recommended size: 800x500 pixels. Max 2MB.</div>
                </div>

                <!-- Author -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Author</label>
                    <input type="text" name="author" class="form-control" value="CEHRDF Team" placeholder="Author name">
                </div>


                <!-- Publish Date -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Publish Date <span class="text-danger">*</span></label>
                    <input type="date" name="published_at" class="form-control" required>
                </div>

                <!-- Feature on Homepage (Radio) -->
                <div class="mb-3">
                    <label class="form-label fw-semibold d-block">Feature on Homepage?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_featured" id="featuredYes" value="1">
                        <label class="form-check-label" for="featuredYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_featured" id="featuredNo" value="0" checked>
                        <label class="form-check-label" for="featuredNo">No</label>
                    </div>
                </div>

                <!-- Full Content (Reusable Editor) -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Content <span class="text-danger">*</span></label>
                    <?php
                    $editorFolder = 'news';
                    $editorName = 'content';
                    $editorContent = '<p>Write your full news article here...</p>';
                    include '../editor/editor.php';
                    ?>
                </div>

                <!-- Submit Buttons -->
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>Save News
                    </button>
                    <a href="news.php" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</main>

<!-- MOBILE OVERLAY -->
<div class="admin-sidebar-overlay" id="sidebarOverlay"></div>

<!-- MOBILE TOGGLE -->
<button class="admin-mobile-toggle" id="mobileToggle"><i class="fas fa-bars"></i></button>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- SIDEBAR TOGGLE SCRIPT -->
<script>
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggle = document.getElementById('mobileToggle');
    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');
    });
    overlay.addEventListener('click', () => {
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
    });
</script>

</body>
</html>