<?php 
    include '../session_check.php';
?>
<?php

include '../../config/connection.php';


if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);

    $query = "DELETE FROM volunteerreg WHERE id = '$id'";

    if (mysqli_query($con, $query)) {

        echo "<script>
                alert('Volunteer deleted successfully!');
                window.location.href='volunteer.php'; 
              </script>";
    } else {

        echo "<script>
                alert('Error: Could not delete record.');
                window.location.href='volunteer.php';
              </script>";
    }
} else {

    header("Location: volunteer.php");
    exit();
}
?>