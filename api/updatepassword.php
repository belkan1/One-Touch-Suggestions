<?php 
include '../includes/conn.php';
$return_arr = array();

$userid = $_POST['userid'];
$password = $_POST['password'];


$sql='update users set password="'.$password.'" where id="'.$userid.'"';
if(mysqli_query($conn, $sql)){
    $row_array['response'] = "yes";
}
else{
    $row_array['response'] = "no";
}

array_push($return_arr,$row_array);
echo json_encode($return_arr);
?>