<?php
$profile = user::getDataById ($id);
if($profile['ban'] == "YES") {
/*$plik = file_get_contents("administration/ip.txt");
$ips = preg_split('/[\s,]+/', $plik, -1, PREG_SPLIT_NO_EMPTY);
if ((in_array($_SERVER['REMOTE_ADDR'], $ips))) {*/
  echo '<center><p style="font-family:Agency FC;font-size:48px;color:darkred"> Zostaleś zbanowany!</p></center';
  exit; }
?>
