<?php 
    include '../session_check.php';
?>
<?php
// Include the database connection file
include '../../config/connection.php';

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);

    $query = "SELECT resume FROM job_applications WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $cvFileName = $row['resume'];

        
        $deleteQuery = "DELETE FROM job_applications WHERE id = '$id'";

        if (mysqli_query($con, $deleteQuery)) {
            
            if (!empty($cvFileName)) {
                $filePath = "../uploads/job-applicants-resume/" . $cvFileName;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            echo "<script>
                    alert('Application deleted successfully!');
                    window.location.href='application.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error: Could not delete application.');
                    window.location.href='application.php';
                  </script>";
        }
    } else {
        
        header("Location: application.php");
        exit();
    }
} else {
    
    header("Location: application.php");
    exit();
}
?>