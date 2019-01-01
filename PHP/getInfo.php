<?php
include 'newlogconf.php';
/* Selecting dates from table */
$mbr = mysqli_query($con,"SELECT * FROM request");
$data = array();

while ($row = mysqli_fetch_array($mbr)) {
 $data[] = array("numb"=>$row['numb'],"name"=>$row['name'],"surname"=>$row['surname'],"date"=>$row['date'],"action"=>$row['action']);
}
echo json_encode($data);

 ?>
