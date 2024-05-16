<?php
require('inc/db_config.php');
require('inc/essentials.php');
require('inc/mpdf/vendor/autoload.php');

adminLogin();

if (isset($_GET['gen_pdf']) && isset($_GET['id'])) {
    $frm_data = filteration($_GET);
    $q = "SELECT bo.*, bd.*,uc.* FROM `booking_order` bo INNER JOIN `booking_details` bd ON bo.booking_id=bd.booking_id INNER JOIN `user` uc ON bo.user_id =uc.sr_no WHERE ( (bo.booking_status = 'booked' AND bo.arival = 0) OR(bo.booking_status = 'cancelled' AND bo.refund = 1 )) AND bo.booking_id='$frm_data[id]'";
    $res = mysqli_query($con, $q);
    $total_rows = mysqli_num_rows($res);
    if ($total_rows == 0) {
        header('Location: dashboard.php');
        exit;
    }
    $data = mysqli_fetch_assoc($res);
    $checkin = date("d-m-Y", strtotime($data['check_in']));
    $checkout = date("d-m-Y", strtotime($data['check_out']));

    $table_data = "
        <h2>BOOKING RECEIPT</h2>
        <table border='1'>
            <tr>
                <td colspan='2'><b>Status: {$data['booking_status']}</td>
            </tr>
            <tr>
                <td><b>Name: {$data['user_name']}</td>
                <td><b>Phone No: {$data['phonenumber']}</td>
            </tr>
            <tr>
                <td><b>Address: {$data['address']}</td>
                <td><b>Email: {$data['email']}</td>
            </tr>
            <tr>
                <td><b>Room Name: {$data['room_name']}</td>
                <td><b>Cost: Rs {$data['price']}</td>
            </tr>
            <tr>
                <td><b>Check-in: $checkin</td>
                <td><b>Check-out: $checkout</td>
            </tr>
        </table>
    ";

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($table_data);
    $mpdf->Output($data['booking_id'], 'D');
} else {
    header('Location: dashboard.php');
}
?>
