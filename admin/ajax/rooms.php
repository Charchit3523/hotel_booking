<?php
    // Include necessary files and ensure admin is logged in
    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin();

    // Add a new room
    if(isset($_POST['add_room'])){
        // Filter and decode features and facilities data
        $features = filteration(json_decode($_POST['features']));
        $facilities = filteration(json_decode($_POST['facilities']));

        $frm_data = filteration($_POST);
        $flag=0;

        // Insert new room data
        $q1 ="INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adult`, `children`, `description`) VALUES (?,?,?,?,?,?,?)";
        $values = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantity'],$frm_data['adult'], $frm_data['children'], $frm_data['desc']];
       
        if(insert($q1,$values,'siiiiis')){
            $flag=1;
        }

        // Get the ID of the newly inserted room
        $room_id=mysqli_insert_id($con);

        // Insert room facilities
        $q2="INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?,?)";
        if($stmt=mysqli_prepare($con,$q2)){
            foreach($facilities as $f){
                mysqli_stmt_bind_param($stmt,'ii',$room_id,$f);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
        }
        else{
            $flag=0;
            die('query cannot be prepared - insert');
        }

        // Insert room features
        $room_id=mysqli_insert_id($con); // This seems redundant, room_id is already set
        $q3="INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";
        if($stmt=mysqli_prepare($con,$q3)){
            foreach($features as $f){
                mysqli_stmt_bind_param($stmt,'ii',$room_id,$f);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
        }
        else{
            $flag=0;
            die('query cannot be prepared - insert');
        }

        // Return success or failure status
        if($flag){
            echo 1;
        }
        else{
            echo 0;
        }
    }

    // Get all rooms
    if(isset($_POST['get_all_rooms'])){
        $res = select("SELECT* FROM `rooms` WHERE `removed`=?",[0],'i' );
        $i = 1;
        $data = "";
        while($row = mysqli_fetch_assoc($res)){

            // Determine status button based on room status
            if($row['satus'] == 1){
                $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
            }else{
                $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-danger btn-sm shadow-none'>inactive</button>"; 
            }

            // Append room data to the response
            $data .= "
                <tr class='align-middle'>
                    <td>$i</td>
                    <td>{$row['name']}</td> 
                    <td>{$row['area']}</td>
                    <td>
                        <span>
                            Adult: {$row['adult']} 
                        </span><br>
                        <span>
                           Children: {$row['children']} 
                        </span>
                    </td>
                    <td>{$row['price']}</td>
                    <td>{$row['quantity']}</td>
                    <td>$status</td>
                    <td>
                        <button type='button' onclick='edit_details($row[id])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                            <i class='bi bi-pencil-square'></i> Edit 
                        </button>
                        <button type='button' onclick=\"room_images('$row[id]','$row[name]')\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#room-images'>
                            <i class='bi bi-images'></i> Edit 
                        </button>
                        <button type='button' onclick='remove_room($row[id])' class='btn btn-danger shadow-none btn-sm' >
                            <i class='bi bi-trash'></i> Delete 
                        </button>
                    </td>
                </tr> 
            ";
            $i++;
        }
        echo $data;
    }

    // Get details of a specific room
    if(isset($_POST['get_room'])){
        $frm_data = filteration($_POST);
        $res1 = select("SELECT * FROM `rooms` WHERE `id`=?", [$frm_data['get_room']], 'i');
        $res2 = select("SELECT * FROM `room_features` WHERE `room_id`=?", [$frm_data['get_room']], 'i');
        $res3 = select("SELECT * FROM `room_facilities` WHERE `room_id`=?", [$frm_data['get_room']], 'i');

        $roomdata=mysqli_fetch_assoc($res1);
        $features=[];
        $facilities=[];

        // Collect features of the room
        if(mysqli_num_rows($res2)>0){
            while($row=mysqli_fetch_assoc($res2)){
                array_push($features, $row['features_id']);
            }
        }

        // Collect facilities of the room
        if(mysqli_num_rows($res3)>0){
            while($row=mysqli_fetch_assoc($res3)){
                array_push($facilities, $row['facilities_id']);
            }
        }
        
        // Encode room data, features, and facilities as JSON
        $data=["roomdata"=>$roomdata,"features"=>$features,"facilities"=>$facilities];
        $data=json_encode($data);
        echo $data;
    }

    // Edit room details
    if(isset($_POST['edit_room'])){
        $features = filteration(json_decode($_POST['features']));
        $facilities = filteration(json_decode($_POST['facilities']));

        $frm_data = filteration($_POST);
        $flag=0;
        
        // Update room data
        $q1="UPDATE `rooms` SET `name`=?,`area`=?,`price`=?,`quantity`=?,`adult`=?,`children`=?,`description`=? WHERE `id`=?";
        $values = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantity'],$frm_data['adult'], $frm_data['children'], $frm_data['desc'], $frm_data['room_id']];
        
        if(update($q1, $values,'siiiiisi')){
          $flag=1;
        }

        // Delete existing room features and facilities
        $del_features = delete("DELETE FROM `room_features` WHERE `room_id`=?", [$frm_data['room_id']], 'i');
        $del_facilities = delete("DELETE FROM `room_facilities` WHERE `room_id`=?", [$frm_data['room_id']], 'i');
        
        if(!($del_features && $del_facilities)){
            $flag=0;
        }

        // Insert updated room facilities
        $q2="INSERT INTO `room_facilities`( `room_id`, `facilities_id`) VALUES (?,?)";
        if($stmt=mysqli_prepare($con,$q2)){
            foreach($facilities as $f){
                mysqli_stmt_bind_param($stmt,'ii',$frm_data['room_id'],$f);
                mysqli_stmt_execute($stmt);
            }
            $flag=1;
            mysqli_stmt_close($stmt);
        }
        else{
            $flag=0;
            die('query cannot be prepared - insert');
        }

        // Insert updated room features
        $q3="INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";
        if($stmt=mysqli_prepare($con,$q3)){
            foreach($features as $f){
                mysqli_stmt_bind_param($stmt,'ii',$frm_data['room_id'],$f);
                mysqli_stmt_execute($stmt);
            }
            $flag=1;
            mysqli_stmt_close($stmt);
        }
        else{
            $flag=0;
            die('query cannot be prepared - insert');
        }

        // Return success or failure status
        if($flag){
            echo 1;
        }
        else{
            echo 0;
        }
    }

    // Toggle room status
    if(isset($_POST['toggle_status'])){
        $frm_data = filteration($_POST);
        $q = "UPDATE `rooms` SET `satus`=? WHERE `id`=?";
        $v = [$frm_data['value'], $frm_data['toggle_status']];
        if(update($q, $v, 'ii')){
            echo 1;
        }
        else{
            echo 0;
        }
    }

    // Add a room image
    if (isset($_POST['add_image'])) {
        $frm_data = filteration($_POST);
        $img_r=uploadImage($_FILES['image'],ROOMS_FOLDER);
        if($img_r=='inv_img'){
            echo $img_r;
        }
        else if($img_r=='inv_size'){
            echo $img_r;
        }
        else if($img_r=='upd_failed'){
            echo $img_r;
        }
        else{
            $q="INSERT INTO `room_image`( `room_id`, `image`) VALUES (?,?)";
            $values = [$frm_data['room_id'],$img_r];
            $res=insert($q,$values,'is');
            echo $res;
        }
    }

        // Get room images
        if (isset($_POST['get_room_images'])) {
            $frm_data = filteration($_POST);
            $res = select("SELECT * FROM `room_image` WHERE `room_id`=?", [$frm_data['get_room_images']], 'i');
            $path = ROOMS_IMG_PATH;
    
            // Generate image data table rows
            while ($row = mysqli_fetch_assoc($res)) {
                if ($row['thumb'] == 1) {
                    $thumb_btn = "<button type='button' class='btn btn-success shadow-none btn-sm'>
                    <i class='bi bi-check2-all'></i>ON
                    </button>";
                } else {
                    $thumb_btn = "<button type='button' onclick='thumb_image({$row['sr_no']},{$row['room_id']})' class='btn btn-info shadow-none btn-sm'>
                    <i class='bi bi-check2-all'></i>ON
                    </button>";
                }
                // Append image data to the response
                echo <<<data
                    <tr class='align-middle'>
                        <td><img src='$path$row[image]' class='img-fluid'></td>
                        <td width="60%"> $thumb_btn</td>
                        <td> 
                            <button type='button' onclick='rem_image({$row['sr_no']},{$row['room_id']})' class='btn btn-danger shadow-none btn-sm'>
                                <i class='bi bi-trash'></i> Delete   
                            </button>
                        </td>
                    </tr>
                data;
            }
        }
        
        // Remove a room image
        if (isset($_POST['rem_image'])){
            $frm_data = filteration($_POST);
            $values = [$frm_data['image_id'], $frm_data['room_id']];
            $pre_q = "SELECT * FROM `room_image` WHERE `sr_no`=? AND `room_id`=?";
            $res = select($pre_q, $values, 'ii');
            $img = mysqli_fetch_assoc($res);
    
            if ($res) {
                if (deleteImage($img['image'], ROOMS_FOLDER)) {
                    $q = "DELETE FROM `room_image` WHERE `sr_no`=? AND `room_id`=?";
                    $res = delete($q, $values, 'ii');
                    echo $res;
                } else {
                    echo 0;
                }
            } else {
                echo "No image found with the specified 'sr_no' and 'room_id'.";
            }
        }
    
        // Set an image as the thumbnail
        if (isset($_POST['thumb_image'])){
            $frm_data = filteration($_POST);
            $pre_q = "UPDATE `room_image` SET `thumb`=? WHERE `room_id`=?";
            $pre_v = [0, $frm_data['room_id']];
            $pre_res = update($pre_q, $pre_v, 'ii');
    
            $q = "UPDATE `room_image` SET `thumb`=? WHERE `sr_no`=? AND `room_id`=?";
            $v = [1, $frm_data['image_id'], $frm_data['room_id']];
            $res = update($q, $v, 'iii');
    
            echo $res;
        }
    
        // Remove a room and its related data
        if (isset($_POST['remove_room'])){
            $frm_data = filteration($_POST);
    
            // Select and delete all room images
            $res1 = select("SELECT * FROM `room_image` WHERE `room_id`=?",[$frm_data['room_id']], 'i');
            while($row = mysqli_fetch_assoc($res1)){
                deleteImage($row['image'], ROOMS_FOLDER);
            }
    
            // Delete room data from various tables
            $res2 = delete("DELETE FROM `room_image` WHERE `room_id`=?",[$frm_data['room_id']], 'i');
            $res3 = delete("DELETE FROM `room_features` WHERE `room_id`=?",[$frm_data['room_id']], 'i');
            $res4 = delete("DELETE FROM `room_facilities` WHERE `room_id`=?",[$frm_data['room_id']], 'i');
            $res5 = update("UPDATE `rooms` SET `removed`=? WHERE `id`=?", [1, $frm_data['room_id']], 'ii');
    
            if($res2 || $res3 || $res4 || $res5){
                echo 1;
            } else {
                echo 0;
            }
        }
    ?>
    
