<?php
include '../../config/connection.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    $id = mysqli_real_escape_string($con, $_GET['id']);

    $deleteQuery = "DELETE FROM notice WHERE id = '$id'";

    if (mysqli_query($con, $deleteQuery)) {
        echo "<script>
                alert('Notice deleted successfully!');
                window.location.href='notices.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting notice: " . mysqli_error($con) . "');
                window.location.href='notices.php';
              </script>";
    }

} else {
    header("Location: notices.php");
    exit();
}
