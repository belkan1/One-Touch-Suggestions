<?php
$type  = $_GET["type"];
$values='';
include_once "includes/conn.php";
$query = "select * from category where type ='".$type."'";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result)>0){
while( $row = mysqli_fetch_assoc($result)){
$values= $row['id'].'==='.$row['name'].'==='. $values;
}
echo $values;
}
else
    echo "Undefined===Undefined";
?>