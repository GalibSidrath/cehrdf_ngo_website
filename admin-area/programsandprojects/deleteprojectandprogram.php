<?php 
    include '../session_check.php';
?>
<?php
// Include the database connection file
include '../../config/connection.php';

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // 1. Get the image filename before deleting the record
    $selectQuery = "SELECT img FROM program WHERE id = '$id'";
    $result = mysqli_query($con, $selectQuery);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $imagePath = '../uploads/project-feature-img/' . $row['img'];

        // If the file exists on the server, delete it
        if (!empty($row['img']) && file_exists($imagePath)) {
            unlink($imagePath);
        }

        // 2. Delete the record from the database
        $deleteQuery = "DELETE FROM program WHERE id = '$id'";

        if (mysqli_query($con, $deleteQuery)) {
            echo "<script>alert('Program deleted successfully!'); window.location.href='programs.php';</script>";
        } else {
            echo "<script>alert('Error: Could not delete record. " . mysqli_error($con) . "'); window.location.href='programs.php';</script>";
        }
    } else {
        // If ID does not exist in the database
        echo "<script>alert('Program not found!'); window.location.href='programsandprojects.php';</script>";
    }
} else {
    // If no ID is passed, redirect back to the list
    header("Location: programsandprojects.php");
    exit();
}
?>