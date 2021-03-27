<?php 
include '../includes/conn.php'; 
$return_arr = array();

//$type = $_POST['type'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];

$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        
        $dist =  distance($lat, $lng, $row['lat'], $row['lng'], "K") . " KM";
        
        $row_array['response'] = "yes";
        $row_array['id'] = $row['id'];
        $row_array['type'] = $row['type'];
        $row_array['name'] = $row['name'];
        $row_array['rating'] = $row['rating'];
        $row_array['image'] = $row['image'];
        $row_array['discount'] = $row['discount'];
        $row_array['lat'] = $row['lat'];
        $row_array['lng'] = $row['lng'];
        $row_array['distance'] = round($dist, 1). "";
        array_push($return_arr,$row_array);
    }
}else{
        $row_array['response'] = "no";
        $row_array['id'] = "";
        $row_array['type'] = "";
        $row_array['name'] = "";
        $row_array['rating'] = "";
        $row_array['image'] = "";
        $row_array['discount'] = "";
        $row_array['distance'] = "";
        array_push($return_arr,$row_array);
}



function distance($lat1, $lon1, $lat2, $lon2, $unit) {
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
  else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
      return ($miles * 1.609344);
    } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
      return $miles;
    }
  }
}

echo json_encode($return_arr);
?>