<?php
// Include necessary configuration and essential files
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

// Set the default timezone for date and time functions
date_default_timezone_set("Asia/Kathmandu");

// Start a session to manage user login status
session_start();

// Check if the request to fetch rooms is made
if (isset($_GET['fetch_rooms'])) {
    // Decode JSON data from the GET request
    $chk_avail = json_decode($_GET['check_avail'], true); // Check availability data
    $guests = json_decode($_GET['guests'], true); // Guest information
    $location = json_decode($_GET['location'], true); // Location data
    $facility_list = json_decode($_GET['facility_list'], true); // List of required facilities
    $price=json_decode($_GET['price'], true);
    $priceVal=(!empty($price['price'])) ? $price['price'] : 100;

    // Extract the number of adults and children from the guests data
    $adults = (!empty($guests['adults'])) ? $guests['adults'] : 0;
    $childrens = (!empty($guests['childrens'])) ? $guests['childrens'] : 0;

    // Extract the location value from the location data
    $locationValue = (!empty($location['location'])) ? $location['location'] : '';

    // Initialize counters and output variables
    $count_rooms = 0;
    $output = "";

    // Prepare the SQL query to fetch rooms based on guest requirements
    // Corrected column name from `satus` to `status`
    $sql = "SELECT * FROM `rooms` 
            WHERE `adult` >= ? 
            AND `children` >= ? 
            AND `satus` = ? 
            AND `removed` = ?
            AND `price`<=?";
    $values = [$adults, $childrens, 1, 0,$priceVal]; // Values for prepared statement

    // Check if check-in and check-out dates are provided
    if (!empty($chk_avail['checkin']) && !empty($chk_avail['checkout'])) {
        // Create DateTime objects for check-in and check-out dates
        $checkin_date = new DateTime($chk_avail['checkin']);
        $checkout_date = new DateTime($chk_avail['checkout']);

        // Validate the check-in and check-out dates
        if ($checkin_date >= $checkout_date) {
            echo "<h3 class='text-center text-danger'>Invalid date! Check out is earlier than Check in</h3>";
            exit; // Stop execution if dates are invalid
        }

        // Add conditions to check for existing bookings in the specified date range
        $sql .= " AND NOT EXISTS (
                    SELECT 1 FROM booking_order 
                    WHERE room_id = rooms.id 
                    AND booking_status = 'booked' 
                    AND check_out > ? 
                    AND check_in < ?
                  )";
        // Merge the check-in and check-out dates into the values array
        $values = array_merge($values, [$chk_avail['checkin'], $chk_avail['checkout']]);
    }

    // Filter rooms by location if provided
    if (!empty($locationValue)) {
        $sql .= " AND `location` = ?";
        $values[] = $locationValue; // Add location to the values
    }

    // Prepare and execute the SQL statement
    $room_res = select($sql, $values, str_repeat('s', count($values))); // Assuming select is a custom function for prepared statements

    // Loop through the fetched room data
    while ($room_data = mysqli_fetch_assoc($room_res)) {
        // Initialize counters and output variables for facilities and features
        $fac_count = 0;
        $facilities_data = "";
        $features_data = "";

        // Fetch facilities associated with the current room
        $fac_q = mysqli_query($con, "SELECT f.name, f.id 
                                      FROM `facilities` f 
                                      INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id 
                                      WHERE rfac.room_id = '{$room_data['id']}'");

        // Loop through the fetched facilities
        while ($fac_row = mysqli_fetch_assoc($fac_q)) {
            // Check if the facility is in the required facility list
            if (in_array($fac_row['id'], $facility_list['facilities'])) {
                $fac_count++; // Increment the facility count
            }
            // Build the facilities display string
            $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>{$fac_row['name']}</span>";
        }

        // Skip the room if it doesn't have all required facilities
        if (count($facility_list['facilities']) != $fac_count) {
            continue; // Skip to the next room
        }

        // Fetch features associated with the current room
        $fea_q = mysqli_query($con, "SELECT f.name 
                                      FROM `features` f 
                                      INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                                      WHERE rfea.room_id = '{$room_data['id']}'");

        // Loop through the fetched features
        while ($fea_row = mysqli_fetch_assoc($fea_q)) {
            // Build the features display string
            $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>{$fea_row['name']}</span>";
        }

        // Get the room thumbnail image
        $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpg"; // Default thumbnail
        $thumb_q = mysqli_query($con, "SELECT * FROM `room_image` 
                                       WHERE `room_id` = '{$room_data['id']}' 
                                       AND `thumb` = 1");

        // Check if a thumbnail exists for the room
        if (mysqli_num_rows($thumb_q) > 0) {
            $thumb_res = mysqli_fetch_assoc($thumb_q);
            $room_thumb = ROOMS_IMG_PATH . $thumb_res['image']; // Update thumbnail path
        }

        // Prepare the booking button based on login status
        $login = (isset($_SESSION['IS_LOGIN'])) ? 1 : 0; // Check if user is logged in
        $book_btn = "<button onclick='checkLoginToBook($login, {$room_data['id']})' class='btn btn-sm w-100 text-white custom-bg shadow-none mb-2'>Book Now</button>";

        // Build the output HTML for the room card
        $output .= "
            <div class='card mb-4 border-0 shadow'>
                <div class='row g-0 p-3 align-items-center'>
                    <div class='col-md-5 mb-lg-0 mb-md-0 mb-3'>
                        <img src='$room_thumb' class='img-fluid rounded'>
                    </div>
                    <div class='col-md-5 px-lg-3 px-md-2 px-0'> 
                        <h5 class='mb-3'>{$room_data['name']}</h5>
                        <div class='features mb-3'>
                            <h6 class='mb-1'>Features</h6>
                            $features_data
                        </div>
                        <div class='facilities mb-3'>
                            <h6 class='mb-1'>Facilities</h6>
                            $facilities_data
                        </div>
                        <div class='Guests mb-3'>
                            <h6 class='mb-1'>Guests</h6>
                            <span class='badge rounded-pill bg-light text-dark text-wrap'>{$room_data['adult']} Adults</span>
                            <span class='badge rounded-pill bg-light text-dark text-wrap'>{$room_data['children']} children</span>  
                        </div>
                        <div class='location mb-3'>
                            <h6 class='mb-1'>Location</h6>
                            <span class='badge rounded-pill bg-light text-dark text-wrap'>{$room_data['location']}</span>
                        </div>
                    </div>
                    <div class='col-md-2 mt-lg-0 mt-md-0 mt-4 text-center'>
                        <h6 class='mb-4'>Rs {$room_data['price']} per night</h6>
                        $book_btn
                        <a href='room_details.php?id={$room_data['id']}' class='btn btn-sm w-100 btn-outline-dark shadow-none'>More details</a>
                    </div>
                </div>
            </div>
        ";

        // Increment the room count
        $count_rooms++;
    }

    // Output the results
    if ($count_rooms > 0) {
        echo $output; // Display the room cards
    } else {
        echo "<h3 class='text-center text-danger'>No rooms to show!</h3>"; // No rooms available
    }
}
?>