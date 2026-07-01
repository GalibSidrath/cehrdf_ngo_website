<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Meeting | CEHRDF Admin</title>
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
        <h2 class="fw-bold text-dark mb-0">Add Meeting</h2>
        <a href="meetings.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <!-- SECTION: MEETING FORM -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="meeting_save.php" method="POST">

                <!-- Title -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Meeting Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter meeting title" required>
                </div>

                <!-- Presented By -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Presented By <span class="text-danger">*</span></label>
                    <input type="text" name="presented_by" class="form-control" placeholder="e.g. Dr. Rahim Uddin" required>
                </div>

                <!-- Date -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Date <span class="text-danger">*</span></label>
                    <input type="date" name="meeting_date" class="form-control" required>
                </div>

                <!-- Time -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Time <span class="text-danger">*</span></label>
                    <input type="time" name="meeting_time" class="form-control" required>
                </div>

                <!-- Location -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Location</label>
                    <input type="text" name="location" class="form-control" placeholder="e.g. CEHRDF Conference Room">
                </div>

                <!-- Meeting Type -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Meeting Type</label>
                    <select name="meeting_type" class="form-select">
                        <option value="general">General</option>
                        <option value="board">Board Meeting</option>
                        <option value="stakeholder">Stakeholder</option>
                        <option value="workshop">Workshop</option>
                    </select>
                </div>

                <!-- Agenda / Description (Editor) -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Agenda / Description</label>
                    <?php
                    $editorFolder = 'meetings';
                    $editorName = 'agenda';
                    $editorContent = '<p>Write meeting agenda and description here...</p>';
                    include '../editor/editor.php';
                    ?>
                </div>

                <!-- Submit Buttons -->
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>Save Meeting
                    </button>
                    <a href="meetings.php" class="btn btn-outline-secondary">
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