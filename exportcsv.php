<?php
include 'includes/conn.php';
if($_SESSION['login']==true){
}
else
	echo "<script>window.location.assign('index.php')</script>";
$result = mysqli_query($conn, 'SELECT * FROM `customersdetails`');
if (!$result) 
	die('Couldn\'t fetch records');
$num_fields = mysqli_num_fields($result);
$headers = array();
while ($finfo = mysqli_fetch_field($result)) {
    $heading = $finfo->name;
    $headers[] .= $heading;
}
$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, $headers);
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($fp, array_values($row));
    }
    die;
}

?>