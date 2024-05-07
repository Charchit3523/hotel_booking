<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if(isset($_POST['add_feature'])){
    $frm_data = filteration($_POST);
    $q="INSERT INTO `features`(`name`) VALUES (?)";
    $values=[$frm_data['name']];
    $res= insert($q,$values,'s');
    echo $res;
}  

if(isset($_POST['get_features'])){
    $res=selectALL('features');
    $i=1;
    while($row = mysqli_fetch_assoc($res)){
        echo <<<data
<tr>
    <td>$i</td>
    <td>{$row['name']}</td>   
    <td>
        <button type="button" onclick="rem_feature({$row['id']})" class="btn btn-sm btn-danger shadow-none">
            <i class='bi bi-trash'> Delete</i>
        </button>
    </td>            
</tr>
data;
       $i++;
    }
}

if (isset($_POST['rem_feature'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_feature']];
    $q = "DELETE FROM `features` WHERE `id`=?";
    // Debugging: Output the SQL query and values
    error_log("SQL Query: $q, Values: " . json_encode($values));
    $res = delete($q, $values, 'i');
    // Debugging: Output the result of the delete operation
    error_log("Delete Result: $res");
    echo $res;
}




