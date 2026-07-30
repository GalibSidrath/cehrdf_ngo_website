<?php 
    include '../session_check.php';
?>
<?php
include '../../config/connection.php';

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);

    $query = "SELECT img FROM news WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if($row) {
        $imgPath = "../uploads/news-feature-img/" . $row['img'];

        if(file_exists($imgPath) && !empty($row['img'])) {
            unlink($imgPath);
        }

        $delQuery = "DELETE FROM news WHERE id = '$id'";
        
        if(mysqli_query($con, $delQuery)) {
            echo "<script>alert('News deleted successfully!'); window.location.href='newsandmedia.php';</script>";
        } else {
            echo "<script>alert('Error deleting record: " . mysqli_error($con) . "'); window.location.href='newsandmedia.php';</script>";
        }
    } else {
        echo "<script>alert('News not found!'); window.location.href='newsandmedia.php';</script>";
    }
} else {
    header("Location: newsandmedia.php");
    exit();
}
?>