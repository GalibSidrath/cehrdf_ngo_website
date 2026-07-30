<?php 
    include '../session_check.php';
?>
<?php
// Include the database connection file
include '../../config/connection.php';

// Check if an ID is provided via the URL
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // SQL query to delete the record from the 'messege' table
    $query = "DELETE FROM messege WHERE id = '$id'";

    if (mysqli_query($con, $query)) {
        // If deletion is successful, show an alert and redirect back to messages page
        echo "<script>
                alert('Message deleted successfully!');
                window.location.href='message.php';
              </script>";
    } else {
        // If an error occurs, show an error alert and redirect
        echo "<script>
                alert('Error: Could not delete the message.');
                window.location.href='message.php';
              </script>";
    }
} else {
    // If no ID is passed in the URL, redirect back to the list
    header("Location: message.php");
    exit();
}
?>