<?php 
include '../includes/conn.php'; 
$return_arr = array();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users where email='$email' and password='$password' and role='0'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
        
    $row_array['response'] = "yes";
    $row_array['userid'] = $row['id'];
    $row_array['name'] = $row['name'];
    $row_array['email'] = $row['email'];
    $row_array['password'] = $row['password'];
    $row_array['phone'] = $row['phone'];
    $row_array['image'] = $row['image'];
    $row_array['address'] = $row['address'];
   
}else{
    $row_array['response'] = "no";
    $row_array['userid'] = "";
    $row_array['name'] = "";
    $row_array['email'] = "";
    $row_array['password'] = "";
    $row_array['phone'] = "";
    $row_array['image'] = "";
    $row_array['address'] = "";
}
array_push($return_arr,$row_array);
echo json_encode($return_arr);    


?>