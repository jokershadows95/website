<?php
//ustaw sekundy do timeout'u
$intTimeoutSeconds = 50;
require_once 'configd.php';
require 'userd.class.php';
include 'info.php';
include 'errors.php';
include 'actions.php';

$menu = $_GET['site'];
require 'menu.php';
 //menu //
 ?>
 <!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <title>Denz's Workers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#05426d" />
    <meta name="keywords" content="" />
    <meta name="description" content="Website for Employees" />
    <meta name="author" content="Denz's" />
    <meta name="robots" content="all" />
    <link href="infoandprofile.css" rel="stylesheet" media="all">
    <link href="info.css" rel="stylesheet" />
    <link href="footer.css" rel="stylesheet" />
    <link href="Popups.css" rel="stylesheet" />
    <link href="toastphp.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="pics/denz/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="pics/denz/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="pics/denz/favicon-16x16.png">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="pics/denz/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script async src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <!--Angularjs -->
      <script async src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
      <script async src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
      <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js'></script>
    <script src="script/modal.js"></script>
    <script src="script/toast.js"></script>
    <script src="script/dark.js"></script>
    <script async src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="ng-file-upload-all.js"></script>
    <script src="scripts/chconn.js"></script>
    <!--<script src="script/ajax.js"></script>-->
</head>
<style>
    .modal {
        display: none;
    }
    @media screen and (max-width:  1020px) {
    body {
        background-color: #3e46dc;
    }
}
	</style>
    <body>
    <?php

    //Menu//
 //body//
 include ($menu);
 //footer//
 echo '


 								<div id="toast">
 				 				 <div id="img">
 				 					 <i class="material-icons" id="iconstoast">check_circle_outline</i>
 				 				 </div>
 				 				 <div id="desc">Success loading your profile...</div>
 				 			 </div>';
?>
</body>
</html>
