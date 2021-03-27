<?php 
include '../includes/conn.php'; 
$return_arr = array();

$categoryid = $_POST['categoryid'];
$type = $_POST['type'];

$sql = "SELECT * FROM details where type='".$type."' and categoryid='".$categoryid."'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        
        $sqlc = "SELECT * FROM category where id='".$categoryid."'";
        $resultc = mysqli_query($conn, $sqlc);
        $rowc = mysqli_fetch_assoc($resultc);

        $row_array['response'] = "yes";
        $row_array['id'] = $row['id'];
        $row_array['name'] = $row['name'];
        $row_array['description'] = $row['description'];
        $row_array['image'] = $row['image'];
        $row_array['price'] = $row['price'];
        $row_array['rating'] = $row['rating'];
        $row_array['discount'] = $rowc['discount'];
        $row_array['promotion'] = $row['discount'];
        $row_array['date'] = $row['moviedate'];
        $row_array['time'] = $row['movietime'];
        array_push($return_arr,$row_array);
    }
}else{
        $row_array['response'] = "no";
        $row_array['id'] = "";
        $row_array['name'] = "";
        $row_array['description'] = "";
        $row_array['image'] = "";
        $row_array['price'] = "";
        $row_array['rating'] = "";
        $row_array['promotion'] = "";
        $row_array['discount'] = "";
        $row_array['date'] = "";
        $row_array['time'] = "";
        array_push($return_arr,$row_array);
}

echo json_encode($return_arr);
?>