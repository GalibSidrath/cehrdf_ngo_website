<?php 
    include '../session_check.php';
?>
<?php
// Include the database connection
include '../../config/connection.php';

// Check if an ID is provided via the URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // 1. Fetch the logo file name from the database to delete the physical file
    $query = "SELECT logo FROM partner WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $logoName = $row['logo'];

        // 2. Delete the record from the database
        $deleteQuery = "DELETE FROM partner WHERE id = '$id'";

        if (mysqli_query($con, $deleteQuery)) {
            // 3. If record is deleted, remove the file from the server
            $filePath = "../uploads/partners/" . $logoName;
            
            if (!empty($logoName) && file_exists($filePath)) {
                unlink($filePath); // Deletes the file
            }

            echo "<script>
                    alert('Partner deleted successfully!'); 
                    window.location.href='partner.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error: Could not delete record.'); 
                    window.location.href='partner.php';
                  </script>";
        }
    } else {
        // If ID does not exist, redirect back
        header("Location: partner.php");
        exit();
    }
} else {
    // If no ID is passed, redirect back
    header("Location: partner.php");
    exit();
}
?>