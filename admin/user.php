<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

// Fetch users data
$query = "SELECT sr_no, name, email, verification_status FROM user";
$result = mysqli_query($con, $query);

if (!$result) {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Settings</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Rooms</h3>

                <!-- Add User Form -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="mb-3">Add New User</h4>
                        <form action="add_user.php" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add User</button>
                        </form>
                    </div>
                </div>

                <!-- Display Users -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover border text-center" style="min-width:1300px">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="users-data">
                                    <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>{$row['sr_no']}</td>";
                                            echo "<td>{$row['name']}</td>";
                                            echo "<td>{$row['email']}</td>";
                                            echo "<td>{$row['verification_status']}</td>";

                                            echo "<td>";
                                            echo "<a href='delete_user.php?id={$row['sr_no']}' class='btn btn-danger'>Delete</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require('inc/scripts.php'); ?>
</body>

</html>
