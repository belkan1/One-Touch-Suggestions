<?php
include "../includes/conn.php";
date_default_timezone_set("Asia/Karachi");
$return_arr = array();

$type = $_POST['type'];
$userid = $_POST['userid'];
$message = $_POST['message'];
$categoryid = $_POST['categoryid'];
$detailid = $_POST['detailid'];
$createdate = date('Y-m-d');

if(!empty($message)){
    
    $sql = "INSERT INTO reviews (type, categoryid, detailid, userid, message, createdate)
    VALUES ('$type', '$categoryid', '$detailid', '$userid',  '$message','$createdate')";
    
    if (mysqli_query($conn, $sql)) {
         $row_array['response'] = "yes";
    }else {
     $row_array['response'] = "no";
    }
} 

 array_push($return_arr,$row_array);
 echo json_encode($return_arr);
?>