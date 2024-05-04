<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

if (isset($_GET['id'])) {
    // Get the room ID from the URL parameter
    $roomId = mysqli_real_escape_string($con, $_GET['id']);

    // Delete the room from the database
    $deleteQuery = "DELETE FROM rooms WHERE room_id = '$roomId'";
    $deleteResult = mysqli_query($con, $deleteQuery);

    if (!$deleteResult) {
        echo "Error deleting room: " . mysqli_error($con);
    } else {
        header("Location: admin_settings.php"); // Redirect to the settings page after successful deletion
        exit();
    }
}

mysqli_close($con);
?>