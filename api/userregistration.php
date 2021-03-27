<?php
include "../includes/conn.php";
date_default_timezone_set("Asia/Karachi");
$return_arr = array();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$createdate = date('Y-m-d');

if(!empty($name)){
    
    $sql = "INSERT INTO users (name, email, password, createdate)
    VALUES ('$name', '$email', '$password', '$createdate')";
    
    if (mysqli_query($conn, $sql)) {
        $lastinsertedid = mysqli_insert_id($conn);
        
        $sqlreg = "SELECT * FROM users where id='$lastinsertedid'";
        $resultreg = mysqli_query($conn, $sqlreg);
        $rowreg = mysqli_fetch_assoc($resultreg);
 
         $row_array['response'] = "yes";
         $row_array['userid'] = $rowreg['id'];
    }else {
    $row_array['response'] = "no";
    $row_array['userid'] = "";

    }
} 

 array_push($return_arr,$row_array);
 echo json_encode($return_arr);
?>