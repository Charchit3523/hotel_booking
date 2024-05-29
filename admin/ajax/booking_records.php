<?php
require('../inc/db_config.php'); // Include the database configuration
require('../inc/essentials.php'); // Include essential functions
adminLogin(); // Ensure the admin is logged in

// Check if 'get_bookings' POST request is set
if(isset($_POST['get_bookings'])){
    $frm_data = filteration($_POST); // Filter the input data

    $limit = 10; // Number of records to show per page
    $page = $frm_data['page']; // Current page number
    $start = ($page - 1) * $limit; // Calculate the starting record

    // Query to fetch bookings and their details
    $q = "SELECT bo.*, bd.* FROM `booking_order` bo 
          INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id 
          WHERE ((bo.booking_status = 'booked' AND bo.arival = 0) 
          OR (bo.booking_status = 'cancelled' AND bo.refund = 1)) 
          ORDER BY bo.booking_id DESC";
    
    // Execute the query and get the total results
    $res = mysqli_query($con, $q);
    $limit_q = $q . " LIMIT $start, $limit"; // Query with limit for pagination
    $limit_res = mysqli_query($con, $limit_q);
    $i = $start + 1; // Index for table rows
    $table_data = ""; // Initialize table data
    $total_res = mysqli_num_rows($res); // Get the total number of results
    
    // Check if no results found
    if ($total_res == 0) {
        $output = json_encode(["table_data" => "<b>No data Found</b>", "pagination" => '']);
        echo $output;
        exit; // Exit the script if no results
    }

    // Fetch the results and build table rows
    while ($data = mysqli_fetch_assoc($limit_res)) {
        $checkin = date("d-m-Y", strtotime($data['check_in'])); // Format check-in date
        $checkout = date("d-m-Y", strtotime($data['check_out'])); // Format check-out date

        // Determine the background color based on booking status
        if ($data['booking_status'] == 'booked') {
            $status_bg = 'bg-success';
        } else if ($data['booking_status'] == 'cancelled') {
            $status_bg = 'bg-danger';
        }

        // Append each row to the table data
        $table_data .= "
            <tr>
              <td>$i</td>
              <td>
                <b>Name:</b> {$data['user_name']}
                <br>
                <b>Phone No:</b> {$data['phonenumber']}
              </td>
              <td> 
                <b>Room:</b> {$data['room_name']}
                <br>
                <b>Price:</b> Rs {$data['price']}
              </td>
              <td> 
                <b>Amount:</b> Rs {$data['total_pay']}
              </td>
              <td>
                <span class='badge $status_bg'>{$data['booking_status']}</span>
              </td>
              <td> 
                <button type='button' onclick='download($data[booking_id])' class='mt-2 btn btn-sm btn-info fw-bold shadow-none'>
                <i class='bi bi-file-earmark-pdf-fill'></i> Download
                </button>
              </td>
            </tr>
        ";
        $i++; // Increment row index
    }

    $pagination = ""; // Initialize pagination

    // Build pagination if total results exceed the limit
    if ($total_res > $limit) {
        $total_pages = ceil($total_res / $limit); // Calculate total pages
        $disabled = ($page == 1) ? "disabled" : ""; // Disable 'Prev' button on first page
        $prev = $page - 1;
        $pagination .= "<li class='page-item $disabled'><button onclick='change_page($prev)' class='page-link shadow-none'>Prev</button></li>";
        
        $disabled = ($page == $total_pages) ? "disabled" : ""; // Disable 'Next' button on last page
        $next = $page + 1;
        $pagination .= "<li class='page-item $disabled'><button onclick='change_page($next)' class='page-link shadow-none'>Next</button></li>";
    }

    // Prepare the output
    $output = json_encode(["table_data" => $table_data, "pagination" => $pagination]);
    echo $output; // Return the output
}

// Check if 'cancel_booking' POST request is set
if (isset($_POST['cancel_booking'])) {
    $frm_data = filteration($_POST); // Filter the input data

    // Query to update booking status to 'cancelled'
    $q = "UPDATE `booking_order` SET `booking_status`=?, `refund`=? WHERE `booking_id`=?";
    $values = ['cancelled', 0, $frm_data['booking_id']]; // Values to bind
    $res = update($q, $values, 'sii'); // Execute the update query
    echo $res; // Return the result
}
?>
