<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Member | CEHRDF Admin</title>
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
        <h2 class="fw-bold text-dark mb-0">Add Member</h2>
        <a href="team.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <!-- SECTION: MEMBER FORM -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="team_save.php" method="POST" enctype="multipart/form-data">

                <!-- Full Name -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="full_name" class="form-control" placeholder="e.g. Dr. Rahim Uddin" required>
                </div>

                <!-- Designation -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Designation <span class="text-danger">*</span></label>
                    <input type="text" name="designation" class="form-control" placeholder="e.g. Executive Director" required>
                </div>

                <!-- Department -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Department</label>
                    <input type="text" name="department" class="form-control" placeholder="e.g. Management, Programs, Finance">
                </div>

                <!-- Member Type -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Member Type <span class="text-danger">*</span></label>
                    <select name="member_type" class="form-select" required>
                        <option value="">Select Type</option>
                        <option value="founder">Founder</option>
                        <option value="board">Board Member</option>
                        <option value="staff">Staff</option>
                        <option value="advisor">Advisor</option>
                        <option value="volunteer">Volunteer</option>
                    </select>
                </div>

                <!-- Photo -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Photo <span class="text-danger">*</span></label>
                    <input type="file" name="photo" class="form-control" accept="image/*" required>
                    <div class="form-text">Recommended: 400x400 pixels, square image. Max 2MB.</div>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="e.g. rahim@cehrdf.org">
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="e.g. +880 1712-345678">
                </div>

                <!-- Facebook -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Facebook Profile</label>
                    <input type="url" name="facebook" class="form-control" placeholder="https://facebook.com/username">
                </div>

                <!-- LinkedIn -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">LinkedIn Profile</label>
                    <input type="url" name="linkedin" class="form-control" placeholder="https://linkedin.com/in/username">
                </div>

                <!-- Submit Buttons -->
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>Save Member
                    </button>
                    <a href="team.php" class="btn btn-outline-secondary">
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