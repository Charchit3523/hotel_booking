<?php
require('inc/essentials.php');
adminLogin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel-Dashboard</title>
    <?php
        require('inc/links.php');
    ?>
</head>
<body class="bg-light">
    
    <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between">
        <h3 class=mb-0 h-font">Admin Pannel</h3>
        <a href="logout.php"class="btn btn-light btn-sm">Log out</a>
    </div>
    <div class="col-lg-2 bg-dark border-top border-3 border-secondary">
    
    </div>
    <?php
        require('inc/scripts.php');
    ?>
</body>
</html>