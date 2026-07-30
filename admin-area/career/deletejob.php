<?php 
    include '../session_check.php';
?>
<?php
// Include the database connection file
include '../../config/connection.php';

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    // Sanitize the ID to prevent SQL Injection
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // Delete the record from the career table
    $deleteQuery = "DELETE FROM career WHERE id = '$id'";

    if (mysqli_query($con, $deleteQuery)) {
        // Show success message and redirect
        echo "<script>
                alert('Job deleted successfully!');
                window.location.href='jobs.php';
              </script>";
    } else {
        // Show error message if query fails
        echo "<script>
                alert('Error: Could not delete job. " . mysqli_error($con) . "');
                window.location.href='jobs.php';
              </script>";
    }
} else {
    // If no ID is passed in the URL, redirect back to the list page
    header("Location: jobs.php");
    exit();
}
?>