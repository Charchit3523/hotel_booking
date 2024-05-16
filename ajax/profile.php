<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');
date_default_timezone_set("Asia/Kathmandu");

if(isset($_POST['info_form'])){
    $frm_data=filteration($_POST);
    session_start();
    $u_exist=select("SELECT * FROM `user` WHERE `pn`=? AND `sr_no`!=? LIMIT 1",
    [$frm_data['phonenum'],$_SESSION['u_id']],'ss');


    if(mysqli_num_rows($u_exist)!=0){
        echo 'phone_already';
        exit;
    }

    
    $querry="UPDATE `user` SET `name`=?,`address`=?,`pn`=? WHERE `sr_no`=?";
    $values=[$frm_data['name'],$frm_data['address'],$frm_data['phonenum'],$_SESSION['u_id']];

    if(update($querry,$values,'ssss')){
        $_SESSION['u_name']=$frm_data['name'];
        echo 1;
    }else{
        echo 0;
    }
}

?>