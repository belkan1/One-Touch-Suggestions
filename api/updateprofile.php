<?php 
include '../includes/conn.php';
$return_arr = array();
$file_path = "upload_profile/";
$userid = $_GET['userid'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$name = $_GET['name'];
$file_path = $file_path . basename( $_FILES['uploaded_file']['name']);


if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path) ){
    
    $sql='update users set name="'.$name.'", phone="'.$phone.'", address="'.$address.'", image="'.$file_path.'" where id="'.$userid.'"';
    if(mysqli_query($conn, $sql)){
        $row_array['response'] = "yes";
    }
    else{
        $row_array['response'] = "no";
    }
}else{
    $row_array['response'] = $file_path;
}
array_push($return_arr,$row_array);
echo json_encode($return_arr);
?>