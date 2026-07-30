<?php 
    include '../session_check.php';
?>
<?php
// Include database connection
include '../../config/connection.php';

// Check if ID is provided via URL
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // Delete the record from the database
    $deleteQuery = "DELETE FROM videos WHERE id = '$id'";

    if(mysqli_query($con, $deleteQuery)) {
        echo "<script>alert('Video deleted successfully!'); window.location.href='videos.php';</script>";
    } else {
        // Handle database error
        echo "<script>alert('Error deleting video: " . mysqli_error($con) . "'); window.location.href='videos.php';</script>";
    }
} else {
    // Redirect if no ID is passed
    header("Location: videos.php");
    exit();
}
