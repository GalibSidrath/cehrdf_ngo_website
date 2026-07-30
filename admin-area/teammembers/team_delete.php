<?php 
    include '../session_check.php';
?>
<?php
include '../../config/connection.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);

    $query = "SELECT img FROM teammember WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $imageName = $row['img'];

        $deleteQuery = "DELETE FROM teammember WHERE id = '$id'";

        if (mysqli_query($con, $deleteQuery)) {
            if (!empty($imageName)) {
                $filePath = "../uploads/teamembers/" . $imageName;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            echo "<script>
                    alert('Member deleted successfully!');
                    window.location.href='teammembers.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error: Could not delete record.');
                    window.location.href='teammembers.php';
                  </script>";
        }
    } else {
        header("Location: teammembers.php");
        exit();
    }
} else {

    header("Location: teammembers.php");
    exit();
}
?>