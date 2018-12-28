<?php
$news = array();
$wynik=mysql_query('SELECT * FROM news ORDER BY id DESC');
while ($lem=mysql_fetch_array($wynik)){
  $news[] = $lem;
echo json_encode($news);
}
?>
