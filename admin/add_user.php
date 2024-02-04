<?php
require('inc/db_config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $query = "INSERT INTO user (name, email) VALUES ('$name', '$email')";

    if (mysqli_query($con, $query)) {
        header("Location: user.php"); // Redirect back to the main page
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>