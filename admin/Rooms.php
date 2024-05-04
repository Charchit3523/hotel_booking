<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data
    $roomName = mysqli_real_escape_string($con, $_POST['room_name']);

    // Insert new room into the database
    $insertQuery = "INSERT INTO rooms (room_name) VALUES ('$roomName')";
    $insertResult = mysqli_query($con, $insertQuery);

    if (!$insertResult) {
        echo "Error adding room: " . mysqli_error($con);
    } else {
        header("Location: admin_settings.php"); // Redirect to the settings page after successful addition
        exit();
    }
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Similar HTML structure as your previous file -->

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Rooms</h3>

                <!-- Add Room Form -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="mb-3">Add New Room</h4>
                        <form action="add_room.php" method="post">
                            <div class="mb-3">
                                <label for="room_name" class="form-label">Room Name:</label>
                                <input type="text" class="form-control" id="room_name" name="room_name" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Room</button>
                        </form>
                    </div>
                </div>

                <!-- Display Rooms -->
                <!-- Similar HTML structure as your previous file -->

            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
</body>

</html>