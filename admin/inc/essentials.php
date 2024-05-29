<?php
// Define constants for directory paths and URLs
define('USERS_FOLDER', 'users/');
define('SITE_URL', 'http://localhost/hotel_booking/');
define('ABOUT_IMG_PATH', SITE_URL . 'images/about/');
define('FEATURES_IMG_PATH', SITE_URL . 'images/features/');
define('ROOMS_IMG_PATH', SITE_URL . 'images/rooms/');
define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/hotel_booking/images/');
define('ABOUT_FOLDER', 'about/');
define('FEATURES_FOLDER', 'features/');
define('ROOMS_FOLDER', 'rooms/');

// Function to check if the admin is logged in
function adminLogin()
{
    session_start();
    // If the admin is not logged in, redirect to the login page
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        echo "<script>
                window.location.href='index.php';
              </script>";
        exit;
    }
}

// Function to redirect to a specified URL
function redirect($url)
{
    echo "<script>
            window.location.href='$url';
          </script>";
    exit;
}

// Function to display an alert message
function alert($type, $msg)
{
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<<alert
        <div class="alert $bs_class alert-dismissible fade show custom-alert mt-4" role="alert">
            <strong class="me-3">$msg</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    alert;
}


// Function to upload an SVG image
function uploadSVGImage($image, $folder)
{
    $valid_mime = ['image/svg+xml'];
    $img_mime = $image['type'];

    // Check if the image MIME type is valid
    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img';
    } 
    // Check if the image size is less than 1 MB
    else if ($image['size'] / (1024 * 1024) > 1) {
        return 'inv_size';
    } else {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";

        $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;

        // Move the uploaded SVG image to the target directory
        if (move_uploaded_file($image['tmp_name'], $img_path)) {
            return $rname;
        } else {
            return 'upd_failed';
        }
    }
}

// Function to upload an image (JPEG, PNG, WEBP)
function uploadImage($image, $folder)
{
    $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
    $img_mime = $image['type'];

    // Check if the image MIME type is valid
    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img';
    } 
    // Check if the image size is less than 2 MB
    else if ($image['size'] / (1024 * 1024) > 2) {
        return 'inv_size';
    } else {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_' . random_int(11111, 99999) . ".jpeg";

        $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;

        // Move the uploaded image to the target directory
        if (move_uploaded_file($image['tmp_name'], $img_path)) {
            return $rname;
        } else {
            return 'upd_failed';
        }
    }
}

// Function to delete an image
function deleteImage($image, $folder)
{
    // Attempt to delete the image file from the server
    if (unlink(UPLOAD_IMAGE_PATH . $folder . $image)) {
        return true;
    } else {
        return false;
    }
}
?>
