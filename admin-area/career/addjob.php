<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job | CEHRDF Admin</title>
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
        <h2 class="fw-bold text-dark mb-0">Add Job</h2>
        <a href="careers.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <!-- SECTION: JOB FORM -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="career_save.php" method="POST">

                <!-- Job Title -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Job Title <span class="text-danger">*</span></label>
                    <input type="text" name="job_title" class="form-control" placeholder="e.g. Program Officer" required>
                </div>

                <!-- Department -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Department</label>
                    <input type="text" name="department" class="form-control" placeholder="e.g. Programs">
                </div>

                <!-- Job Type -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Job Type <span class="text-danger">*</span></label>
                    <select name="job_type" class="form-select" required>
                        <option value="">Select Type</option>
                        <option value="permanent">Permanent</option>
                        <option value="contractual">Contractual</option>
                        <option value="part_time">Part Time</option>
                    </select>
                </div>

                <!-- Location -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Location</label>
                    <input type="text" name="location" class="form-control" value="Cox's Bazar" placeholder="Job location">
                </div>

                <!-- Vacancy -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Number of Vacancies</label>
                    <input type="number" name="vacancy" class="form-control" value="1" min="1" placeholder="Number of positions">
                </div>

                <!-- Salary Range -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Salary Range</label>
                    <input type="text" name="salary_range" class="form-control" placeholder="e.g. BDT 25,000 - 35,000">
                </div>

                <!-- Deadline -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Application Deadline <span class="text-danger">*</span></label>
                    <input type="date" name="deadline" class="form-control" required>
                </div>

                <!-- Short Description -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="2" placeholder="Brief summary of the job (2-3 lines)"></textarea>
                </div>

                <!-- Full Details (Editor) -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Job Details</label>
                    <?php
                    $editorFolder = 'careers';
                    $editorName = 'full_details';
                    $editorContent = '<p>Write detailed job description here...</p>';
                    include '../editor/editor.php';
                    ?>
                </div>

                <!-- Submit Buttons -->
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>Save Job
                    </button>
                    <a href="careers.php" class="btn btn-outline-secondary">
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