<?php 
    include '../session_check.php';
?>s
<?php
// Include the database connection file
include '../../config/connection.php';

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // Delete the record from the database
    $deleteQuery = "DELETE FROM meetings WHERE id = '$id'";

    if (mysqli_query($con, $deleteQuery)) {
        // Show success message and redirect
        echo "<script>alert('Meeting deleted successfully!'); window.location.href='meetings.php';</script>";
    } else {
        // Show error message if query fails
        echo "<script>alert('Error: Could not delete meeting. " . mysqli_error($con) . "'); window.location.href='meetings.php';</script>";
    }
} else {
    // If no ID is passed in the URL, redirect back to the list page
    header("Location: meetings.php");
    exit();
}
?>