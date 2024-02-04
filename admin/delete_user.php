<?php
require('inc/db_config.php');

if (isset($_GET['id'])) {
    $user_id = mysqli_real_escape_string($con, $_GET['id']);
    
    $query = "DELETE FROM user WHERE sr_no = '$user_id'";
    
    if (mysqli_query($con, $query)) {
        header("Location: user.php"); // Redirect back to the main page
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>