<?php 
include '../includes/conn.php'; 
$return_arr = array();

$categoryid = $_POST['categoryid'];
$detailid = $_POST['detailid'];

    $sql = "SELECT * FROM reviews where categoryid='$categoryid' and detailid='$detailid'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            
            $row_array['response'] = "yes";
            
            $sql2 = "SELECT * FROM users where id='".$row['userid']."'";
            $result2 = mysqli_query($conn, $sql2);
            $rowname = mysqli_fetch_assoc($result2);
    
            $row_array['username'] = $rowname['name'];
            $row_array['message'] = $row['message'];
            $row_array['date'] = $row['createdate'];
            array_push($return_arr,$row_array);
        }
    }else{
            $row_array['response'] = "no";
            $row_array['username'] = "";
            $row_array['message'] = "";
            $row_array['date'] = "";
            array_push($return_arr,$row_array);
    }   

echo json_encode($return_arr);
?>