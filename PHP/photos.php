<?php
$location = 'images/';
//$photos = array();
$profile['name'] = "Taz Tazowsky";
$check = strlen($profile['name']);


if($dir = opendir($location)) {
  /*while(($file =readdir($dir)) !==false){
    if(substr($file, 0, $check) == $profile['name']) {
      if ($file != "." && $file != "..") {


        $filesize = (filesize($location.'/'.$file)/1048576);

        $photos->name = $file;
        $photos->location = $location.'/'.$file;
        $photos->filesize = round($filesize, 2).' mb';
        $photos->filectime = filectime($location.'/'.$file);
        $photos->filetype = filetype($location.'/'.$file);
        $json = json_encode($photos);
        echo ''.$json.'';
      }
    }
  }
  closedir($dir);*/
}
echo "
<head>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
<link rel='apple-touch-icon' sizes='180x180' href='pics/denz/apple-touch-icon.png'>
<link rel='icon' type='image/png' sizes='32x32' href='pics/denz/favicon-32x32.png'>
<link rel='icon' type='image/png' sizes='16x16' href='pics/denz/favicon-16x16.png'>
<link rel='manifest' href='manifest.json'>
<link rel='mask-icon' href='pics/denz/safari-pinned-tab.svg' color='#5bbad5'>
<meta name='theme-color' content='#ffffff'>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet' media='all'>
<script async src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script async src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<script async src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
 <script async src='https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js'></script>
<script async src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js'></script>
<script src='script/modal.js'></script>
<script src='scripts/jquery-3.3.1.min.js'></script>
<script src='script/dark.js'></script>
<script async src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js'></script>
<script src='ng-file-upload-all.js'></script>
</head>
<div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>
  <div class='carousel-inner'>
    <div class='carousel-item'>
      <img class='d-block w-50' src='images/Taz Tazowsky1536165555.jpg' alt='First slide' >
    </div>
    <div class='carousel-item'>
      <img class='d-block w-50' src='images/Taz Tazowsky1526921238.jpg' alt='First slide' >
    </div>
    <div class='carousel-item'>
      <img class='d-block w-50' src='images/Taz Tazowsky1528654573.jpg' alt='First slide' >
    </div>
    <div class='carousel-item'>
      <img class='d-block w-50' src='images/Taz Tazowsky1526921184.jpg' alt='First slide' >
    </div>
    <div class='carousel-item'>
      <img class='d-block w-50' src='images/Taz Tazowsky1526743087.jpg' alt='First slide' >
    </div>
    <div class='carousel-item'>
      <img class='d-block w-50' src='images/Taz Tazowsky1536170127.jpg' alt='First slide' >
    </div>
    <div class='carousel-item'>
      <img class='d-block w-50' src='images/Taz Tazowsky1526764222.jpg' alt='First slide' >
    </div>
    <div class='carousel-item'>
      <img class='d-block w-50' src='images/Taz Tazowsky1536165494.jpg' alt='First slide' >
    </div>
    <div class='carousel-item'>
      <img class='d-block w-50' src='images/Taz Tazowsky1536170080.gif' alt='First slide' >
    </div>
    </div>
    <a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'>
      <span class='carousel-control-prev-icon' aria-hidden='true'></span>
      <span class='sr-only'>Previous</span>
    </a>
    <a class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>
      <span class='carousel-control-next-icon' aria-hidden='true'></span>
      <span class='sr-only'>Next</span>
    </a>
  </div>

  ";


 ?>
