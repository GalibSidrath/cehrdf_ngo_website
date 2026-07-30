<?php
session_start();

// If the session variable is not set or is false, the user is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect them back to the login page
    header("Location: " . explode('/admin-area/', $_SERVER['REQUEST_URI'])[0] . "/admin-area/index.php");
    exit();
}
?>