<?php
require('inc/db_config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = mysqli_real_escape_string($con, $_POST['editUserId']);
    $new_name = mysqli_real_escape_string($conn, $_POST['editUserName']);

    $query = "UPDATE user SET name = '$new_name' WHERE sr_no = '$user_id'";

    if (mysqli_query($con, $query)) {
        // You can send a success response if needed
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
