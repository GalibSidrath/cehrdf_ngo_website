<?php 
    include '../session_check.php';
?>
<?php
// Include the database connection file
include '../../config/connection.php';

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // SQL query to delete the admin
    $query = "DELETE FROM admin WHERE id = '$id'";

    if (mysqli_query($con, $query)) {
        // If deletion is successful, show a success message and redirect
        echo "<script>
                alert('Admin deleted successfully!');
                window.location.href='admins.php'; 
              </script>";
    } else {
        // If an error occurs, show an error message and redirect
        echo "<script>
                alert('Error: Could not delete admin. " . mysqli_error($con) . "');
                window.location.href='admins.php';
              </script>";
    }
} else {
    // If no ID is passed, redirect back to the admin list page
    header("Location: admins.php");
    exit();
}
?>