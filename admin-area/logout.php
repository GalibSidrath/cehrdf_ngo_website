<?php
// Start the session to access the current session variables
session_start();

// Unset all of the session variables to clear the stored data
session_unset();

// Destroy the session completely from the server
session_destroy();

// Redirect the user back to the login page
echo "<script>window.location.href = 'index.php';</script>";

// Stop the script execution after redirection
exit();
?>

