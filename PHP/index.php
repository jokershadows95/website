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
        width: 98%;
        margin-left: 5px;
        margin-right: 5px;
        padding: 15px;
    }
    @media screen and (max-width:  1020px) {
    body {
        background-color: #3e46dc;
    }
}

input[type="file"] {
display: inline-block;
opacity: 0;
position: absolute;
margin-left: 20px;
margin-right: 20px;
padding-top: 30px;
padding-bottom: 67px;
width: 85%;
z-index: 99;
margin-top: 10px;
cursor:pointer;
}
.custom-file-upload {
position:relative;
display: inline-block;
cursor: pointer;
padding-top:30px;
padding-bottom:30px;
background:url(http://www.a-yachtcharter.com/search-fleet/webaccess/assets/img/uploadIcon.png) #808080 center center no-repeat;
width:75%;
margin-left:20px;
margin-right:20px;
margin-top:10px;
text-align:center;
}
.modal-dialog {
max-width: 100%;
min-width: 85%;
margin: 1.75rem auto;
}
.modal-header {
background-color: #195de5
}
.modal-body {
  background-color: #7e8696;
}
.Photomodal {
 height: 450px;
 overflow: hidden;
}
.Photomodal:hover {
 overflow-y: auto;
}
.modal-footer {
background-color: #195de5
}
.thumb {
width: 175px;
height: 175px;
float: none;
position: relative;
display: inline;
right: 0;
padding: 5px;
}
.thumb1 {
width: 175px;
height: 175px;
border-radius: 50%;
float: none;
position: relative;
display: inline;
right: 0;
padding: 5px;
}

.overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: .5s ease;
        background-color: #236487;
    }
    .contains {
        margin: 0;
        padding: 0;
        position: relative;
        width: 100%;
    }
    .text {
        font-family: 'Agency FB'!important;
    }
    #avatarn {
        top: 25px;
        position: absolute;
        right: 15px;
        width: 25%;
    }
    #textinf {
        display: none;
    }
    .iconsee {
      background: -webkit-gradient(linear, left top, right bottom, from(#b7f6eb), to(#033054));
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      line-height: 48px;
      display: initial; /* reset Font Awesome's display:inline-block*/
    }

    .iconsee:hover {
      background: -webkit-gradient(linear, left top, right bottom, from(#107907), to(#033054));
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      display: initial; /* reset Font Awesome's display:inline-block*/
      z-index: 2;
    }

    .fas {
      font-size: 24px;
      line-height: 48px;
      top: -5px;
    }

    @keyframes look {

      0% {
        width: 0;
        left: 0;
        display: none;
      }

      100% {
        position: absolute;
        left: 25%;
        display: block;
      }
    }
	</style>
    <body>
    <?php
    if(!$profile == null) {
      echo '
         <!-- The Modal -->
         <div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModal">';
    $id3 = $_POST['delested'];
    $ids = $id3;
    $deluserprofile=mysql_query("SELECT * FROM workers WHERE id ='$ids'");
    $dup=mysql_fetch_array($deluserprofile);
    echo '
         <!-- Modal content -->
         <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title" id="AddTitle">Dane użytkownika: '.$profile['imie'].' '.$profile['nazwisko'].'</h5>
                         <button type="button" class="close" id="closemyModal" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
         </div>
         <div class="modal-body">
         <div class="pr">
         <span data="'.$profile['nameavatar'].'"><img  src="images/'.$profile['nameavatar'].'" class="avatar" alt="Twój avatar" data="'.$profile['nameavatar'].'" /></span>
         </form></div>
         <p><b>Nick:</b> '.$profile['nick'].' </p>
         <p>
         <div class="">
         <span data="'.$profile['level'].'/15" class="lvl"><strong>'.$profile['level'].'</strong></span>
         <progress data="'.$profile['awans'].'/1000" value="'.$profile['awans'].'" max="1000"></progress>
         </div>
         </p>
         <p><b>Adres zamieszkania:</b> '.$profile['adres'].'</p>
         <p><b>Numer domu:</b> '.$profile['numerdomu'].'</p>
         <p><b>Numer telefonu:</b> '.$profile['numertelefonu'].'</p>
         <p><b>Ranga:</b> '.$profile['ranga'].'</p>
         <p><b>Skin:</b> '.$profile['skin'].'</p>
         <p><b>Pensja:</b> '.$profile['pensja'].'$</p>
         <p><b>Dodany w dniu:</b> '.$profile['dodany'].'</p>
         <p><b>Ostatnio aktywny:</b> ';
         if($_SESSION['date'] == $_SESSION['currentdates']){
           echo 'Obecnie Aktywny';
         }else{
          echo ''.$_SESSION['date'].'';
         }
         echo '</p>
         <p><b data-toggle="tooltip" data-placement="top" title="Unique User Identification Document">UUID:</b><input type="hidden" value="'.$profile['key_id'].'" id="UUIDclipboard"/> '.$profile['key_id'].'<!--<button class="uncover" onclick="myCopies()"><i class="material-icons">file_copy</i></button>--></p>
     <p><details><summary><center><h2>Odznaczenia:</h2></center></summary></p><hr />
         <p><center>
       <img data-toggle="tooltip" data-placement="top"  class="badge-not" src="badge/ceo.jpg" title="CEO" alt="CEO" />
       <img data-toggle="tooltip" data-placement="top" class="badge-not" src="badge/good job.png" title="Good Job" alt="Good Job" />
       <img data-toggle="tooltip" data-placement="top" class="badges" src="badge/evil.jpg" title="Evil" alt="Evil" />
       <img data-toggle="tooltip" data-placement="top" class="badges" src="badge/bad boy.png" title="Bad job" alt="Bad job" />
       <img data-toggle="tooltip" data-placement="top" class="badges" src="badge/cat.gif" title="Cat? Why not?" alt="Cat? Why not?" />
       <img data-toggle="tooltip" data-placement="top" src="badge/poszukiwacz.jpg" title="Poszukiwacz" alt="Poszukiwacz" class="badges" />
       <img data-toggle="tooltip" data-placement="top" src="badge/renegat.png" title="Renegaat" alt="Renegat" class="badges" />
       <img data-toggle="tooltip" data-placement="top" src="badge/meloman.jpg" title="Meloman" alt="Meloman" class="badges" />
     </center></p></details>';
    $id4 = $profile['id']; echo '
         </div>
         <div class="modal-footer">
         <table>
         <form action="" method="post">
         <tr><td><h3><input type="hidden" name="action" value="4" /><button id="DeleteBtn" class="uncover" data-toggle="tooltip" data-placement="top" title="Delete your profile"><i class="material-icons iconsee">delete_forever</i></button></h3></td>
         </form>
          <td><h3><button type="button" id="Upbtn" class="uncover" data-toggle="tooltip" data-placement="top" title="Edit your profile info"><i class="material-icons iconsee">edit</i></button></h3></td>
          <td><h3><button type="button" id="Frbtn" class="uncover" data-toggle="tooltip" data-placement="top" title="Add/edit your sick/vacation day"><i class="material-icons iconsee">event</i></button></h3></td>
          <td><h3><button type="button" id="PGbtn" class="uncover" data-toggle="tooltip" data-placement="top" title="Check your previous avatars"><i class="material-icons iconsee" id="iPGbtn">photo_album</i></button></h3></td>
          <td><h3><button type="button" id="QRbtn" class="uncover" data-toggle="tooltip" data-placement="top" title="Generate the QR Code"><i class="fas fa-qrcode iconsee"></i></button></h3></td></tr>
         </table>
         </div>
         </div>
    </div>
    </div>';?>

         <!-- The Modal Update info-->
         <div id="Updatedib" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="Updatedib">
             <!-- Modal content -->
             <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">  <? echo '
                    <h5 class="modal-title" id="AddTitle">Dane użytkownika: '.$profile['imie'].' '.$profile['nazwisko'].'</h5>
                         <button type="button" id="uptmodal" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                         </div>
                 <form action="" method="post" enctype="multipart/form-data" autocomplete="off" ng-app="myApp" ng-controller="myCtrl">
                 <div class="modal-body">
                     <div class="contains">
                       <center><img ng-if="isImage(fileExt)" ngf-src="picFile[0]" class="thumb"><img ng-if="isImage(fileExt)" ngf-src="picFile[0]" class="thumb1"></center>
                       <div class="overlay">
                                 <div class="text" id="textinf">
                                             <p>Podgląd wyglądu nowego avataru</p>
                                             <p style="color:darkred">Zaaktualizuj by cieszyć się nowym avatarem</p>
                                 </div>
                             </div>
                        </div>
                     <div class="pr" style="width:30%">
             <h3 style="voice-family:male;font-family:Castellar">Upload progress: </h3>
                         <progress id="progressBar" value="0" max="100" style="width:100%;color:blue;margin-right:0px;"></progress>
                         <center>
                             <h3 id="status"></h3>
                             <p id="loaded_n_total"></p>
                             <p id="timeut"></p></br />
                         </center>
                         <input type="file" class="form-control" id="avatarn" name="avatar" alt="Twój avatar" onchange="uploadFile()" ngf-change="onChange($files)" ngf-select ng-model="picFile" accept="image/*" data-toggle="tooltip" data-placement="top" title="Choose pic for yours new avatar">
                         <label for="file-upload" class="custom-file-upload" id="custom-file-upload"></label>
                     </div>
                  <table>
                     <p><tr><td><b>ID:</b> </td><td>'.$id.'</td></tr></p>
                     <p><tr><td><b>Imię:</b></td><td> <input type="text" name="imie" title="Podaj swoje imię" value="'.$profile['imie'].'" > </td></tr></p>
                     <p><tr><td><b>Nazwisko:</b></td><td> <input type="text" name="nazwisko" title="Podaj swoje nazwisko" value="'.$profile['nazwisko'].'" > </td></tr></p>
                     <p><tr><td><b>Adres zamieszkania:</b></td><td> <input type="text" name="adres" value="'.$profile['adres'].'" > </td></tr></p>
                     <p><tr><td><b>Numer domu:</b></td><td> <input type="text" name="dom" value="'.$profile['numerdomu'].'" > </td></tr></p>
                     <p><tr><td><b>Numer telefonu:</b></td><td> <input type="number" pattern="[0-9]{7}" name="tel" value="'.$profile['numertelefonu'].'" > </td></tr></p>
                   </table>
                  <br />
                 </div>
             <div class="modal-footer">
             <table>
                     <tr><td><h3><input type="hidden" name="action" value="5" /><button id="UpdateBtn" class="uncover backtomymodal" data-toggle="tooltip" data-placement="top" title="Update your profile"><i class="material-icons">send</i></button></h3></td>
                 </form>
                 <form action="" method="post">
                     <td><h3><button id="Cancele" class="uncover backtomymodal" data-toggle="tooltip" data-placement="top" title="Canceled your operation"><i class="material-icons">cancel</i></button></h3></td></tr>
                 </form>
                 <button type="button" class="uncover backtomymodal" data-toggle="tooltip" data-placement="top" title="Back to Main Modal"><i class="material-icons">keyboard_backspace</i></button>
             </table>
          </div>
         </div>
        </div>
        </div>
     ' ;
      ?>
      <!--Zwolnienia - Modal -->
      <div id="FreedModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="FreedModal">
             <!-- Modal content -->
             <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="AddTitle">Dodanie informacji o Twoim dniu/dniach wolnych</h5>
                          <button type="button" id="closeFree" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                          </button>
                  </div>
                  <div class="modal-body">
               <form action="" method="post">
             <table>
               <tr><td>Imię i nazwisko:</td><td> <input type="text" name="imie" title="Podaj swoje imię" value="<? echo ''.$_SESSION['userinfo'].'' ?>"> </td></tr>
               <tr><td>Zwolnienie od dnia:</td><td><input type="date"  name="od" id="od" require> </td></tr>
               <tr><td>Zwolnienie do dnia:</td><td><input type="date"  name="do" id="do" require> </td></tr>
               <tr><td>Powód urlopu (IC):</td><td> <input type="input" name="ic" id="ic" placeholder="Podaj przyczynę wzięcia wolnego (IC):" required> </td></tr>
               <tr><td>Powód urlopu (OOC):</td><td> <input type="input" name="ooc" id="ooc" placeholder="Podaj przyczynę wzięcia wolnego (OOC):" required> </td></tr>
             </table>
                 </div>
             <div class="modal-footer">
             <table>
                     <tr><td><h3><input type="hidden" name="action" value="7" /><button id="Urlop" name="Urlop" class="uncover backtomymodal" title="Send your vacation"><i class="material-icons">send</i></button></h3></td>
                 </form>
                 <form action="" method="post">
                     <td><h3><button id="Cancele" class="uncover backtomymodal" title="Canceled operation"><i class="material-icons">cancel</i></button></h3></td></tr>
                 </form>
                 <button type="button" class="uncover backtomymodal" class="uncover" data-toggle="tooltip" data-placement="top" title="Back to Main Modal"><i class="material-icons">keyboard_backspace</i></button>
             </table>
             </div>
         </div>
        </div>
        </div>

        <!--Galeria avatarów - Modal -->
        <div id="Photogallerymodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Photogallerymodal">
               <!-- Modal content -->
               <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title">Galeria Twoich avatarów <br/> Ilość avatarów: <?
                       $location = 'images/';
                       //$photos = array();
                       $profile['photo'] = $profile['imie'].' '.$profile['nazwisko'];
                       $check = strlen($profile['photo']);
                             if($dir = opendir($location)) {
                               while(($file =readdir($dir)) !==false){
                                 if(substr($file, 0, $check) == $profile['photo']) {
                                   if ($file != "." && $file != "..") {
                                     $numbersof++;
                                     }
                                   }
                                 }
                               }
                               echo ''.$numbersof.''
                               ?></h5>
                            <button type="button" id="closePhotogallerymodal" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body Photomodal">
                       <div class="container-fluid">
                         <p class="alert alert-info">Naciśnięcie avataru spowoduje zmianę obecnego avataru na ten kliknięty</p>
                         <div class='row'>
                             <?php
                             $location = 'images/';
                             //$photos = array();
                             $profile['photo'] = $profile['imie'].' '.$profile['nazwisko'];
                             $check = strlen($profile['photo']);

                             if($dir = opendir($location)) {
                               while(($file =readdir($dir)) !==false){
                                 if(substr($file, 0, $check) == $profile['photo']) {
                                   if ($file != "." && $file != "..") {
                                     $filesize = (filesize($location.''.$file)/1048576);

                                     $photos->name = $file;
                                     $photos->location = $location.''.$file;
                                     $photos->filesize = round($filesize, 2).' mb';
                                     $photos->filectime = filectime($location.''.$file);
                                     $photos->filetype = filetype($location.''.$file);
                                     $json = json_encode($photos);
                                     $jsons = json_decode($json);
                                     $filens = $json->name;

                                     echo "
                                       <div class='col-md-3'>
                                       <form action='' method='post'>
                                       <input type='hidden' name='action' value='17' />
                                       <button class='uncover' name='avatarchange'  id='avatarchange' value='".$file."'>
                                       <div class='card bg-dark text-white'>
                                         <img class='card-img' src='".$location."/".$file."' alt='Card image'>
                                           <div class='card-img-overlay'>
                                             <h5 class='card-title'><b>Nazwa pliku:</b> ".$jsons->name."</h5>
                                             <p class='card-text'><b>Rozmiar pliku:</b>  ".$jsons->filesize."</p>
                                             <p class='card-text'><b>Czas pliku:</b>  ".$jsons->filectime."</p>
                                             <p class='card-text'><b>Typ pliku:</b>  ".$jsons->filetype."</p>
                                             <p class='card-text'><b>Lokalizacja pliku:</b>  ".$jsons->location."</p>
                                           </div>
                                           </div>
                                           </button>
                                           </form>
                                       </div>
                                       <!--  <div class='card'>
                                           <div class='card-header' style='padding:0;margin:0'>
                                             <img width='100%' src='".$location."/".$file."' />
                                           </div>
                                           <div class='card-body'>
                                             <p><b>Nazwa pliku:</b> ".$jsons->name." </p>
                                             <p><b>Rozmiar pliku:</b>  ".$jsons->filesize." </p>
                                             <p><b>Czas pliku:</b>  ".$jsons->filectime."</p>
                                             <p><b>Typ pliku:</b>  ".$jsons->filetype."</p>
                                             <p><b>Lokalizacja pliku:</b>  ".$jsons->location."</p>
                                           </div>
                                         </div>-->
                                       ";

                                     /*echo $json;*/
                                   }
                                 }
                               }
                               closedir($dir);
                             }

                              ?>

                         </div>
                       </div>
                   </div>
               <div class="modal-footer">
                   <button type="button" class="uncover backtomymodal" class="uncover" data-toggle="tooltip" data-placement="top" title="Back to Main Modal"><i class="material-icons">keyboard_backspace</i></button>
               </div>
           </div>
          </div>
          </div>

          <!--Modal - QR Code   -->
          <div class="modal fade" tabindex="-1" role="dialog" id="QRModal" aria-labelledby="QRModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">QR Code</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <input id="text" type="hidden" value="<? echo ''.$profile['key_id'].''?>" style="width:80%" />
                  <center><div id="qrcode" data-toggle="tooltip" data-placement="top" title="Your QRCODE: <? echo ''.$profile['key_id'].''?>"></div></center>
                </div>
                <div class="modal-footer">
                    <button type="button" id="Bcktomd" class="uncover" data-toggle="tooltip" data-placement="top" title="Back to Main Modal"><i class="material-icons">keyboard_backspace</i></button>
                </div>
              </div>
            </div>
          </div>

      <script>
    function openNav() {
             document.getElementById("uploadseen").style.width = "100%";
         }

         function myCopies() {
            var copyText = document.getElementById("UUIDclipboard");
            //copyText.select();
            document.execCommand('copy'); //paste didn't work - check it!!
            alert("Copy this: " + copyText.value);
          }
         function closeNav() {
             document.getElementById("uploadseen").style.width = "0%";
         }

         function _(el) {
             return document.getElementById(el);
         }

         var t0 = new Date().getTime();
         function uploadFile() {
             var file = _("avatarn").files[0];
             //alert(file.name+" | "+file.size+" | "+file.type);
             var formdata = new FormData();
             formdata.append("avatare", file);
             var ajax = new XMLHttpRequest();
             ajax.upload.addEventListener("progress", progressHandler, false);
             ajax.addEventListener("load", completeHandler, false);
             ajax.addEventListener("error", errorHandler, false);
             ajax.addEventListener("abort", abortHandler, false);
             ajax.open("POST", "send.php");
             //use file_upload_parser.php from above url
             ajax.send(formdata);
         }


         function progressHandler(event) {
             document.getElementById("status").style.color = 'darkblue';
             document.getElementById("status").style.textShadow = '0px 0px 10px darkblue';
             document.getElementById("status").style.fontSize = '36px';
             document.getElementById("loaded_n_total").style.marginTop = '4px';
             _("loaded_n_total").innerHTML = "Upload.." + "<br />" + parseFloat((event.loaded / 1024) / 1024).toFixed(2) + " MB of  " + parseFloat((event.total / 1024) / 1024).toFixed(2) + " MB";
             var percent = (event.loaded / event.total) * 100;
             _("progressBar").value = Math.round(percent);
             _("status").innerHTML = Math.round(percent) + "% ";
             document.getElementById("loaded_n_total").style.color = 'blue';
             document.getElementById("custom-file-upload").style.display = 'none';
              document.getElementById("avatarn").style.display = 'none';
              document.getElementById("textinf").style.display = 'none';


         }
         var t1 = new Date().getTime();

         function completeHandler(event) {
             document.getElementById("loaded_n_total").style.color = 'darkgreen';
             document.getElementById("loaded_n_total").style.marginTop = '20px';
             document.getElementById("status").style.color = 'darkgreen';
             document.getElementById("status").style.fontSize = '48px';
             document.getElementById("status").style.textShadow = '0px 0px 5px darkgreen';
             document.getElementById("progressBar").style.boxShadow = '0px 0px 20px darkgreen';
             _("status").innerHTML = "&check;";
                //wil clear progress bar after successful upload
             _("progressBar").value = 100;
             _("loaded_n_total").innerHTML = "File uploaded";
              _("timeut").innerHTML = "Czas wysyłania: " + (t1-t0) + " ";
               document.getElementById("avatarn").style.display = 'block';
               document.getElementById("textinf").style.display = 'block';
         }

         function errorHandler(event) {
             document.getElementById("loaded_n_total").style.color = 'darkred';
             document.getElementById("loaded_n_total").textShadow = '0px 0px 20px darkred';
             document.getElementById("loaded_n_total").style.marginTop = '20px';
             document.getElementById("status").style.color = 'darkred';
             document.getElementById("status").style.fontSize = '48px';
             document.getElementById("loaded_n_total").style.fontFamily = "Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif";
             document.getElementById("status").style.textShadow = '0px 0px 5px darkred';
             document.getElementById("progressBar").style.boxShadow = '0px 0px 20px darkred';
             _("progressBar").value = 0;
             document.getElementById("progressBar").style.color = 'darkred';
             _("status").innerHTML = " &Chi;";
             _("loaded_n_total").innerHTML = "CRITICAL ERROR";
             document.getElementById("custom-file-upload").style.display = 'none';
         }

         function abortHandler(event) {
             document.getElementById("status").style.color = 'yellow';
             document.getElementById("status").style.fontSize = '48px';
             document.getElementById("status").style.textShadow = '0px 0px 5px yellow';
             document.getElementById("loaded_n_total").style.marginTop = '20px';
             document.getElementById("loaded_n_total").style.color = 'yellow';
             _("status").innerHTML = " &circlearrowright;";
             _("loaded_n_total").innerHTML = "Upload Aborted";
         }

         function clean() {
             document.getElementById("loaded_n_total").style.color = 'blue';
             document.getElementById("loaded_n_total").style.marginTop = '-60px';
             document.getElementById("status").style.color = 'blue';
             document.getElementById("status").textShadow = '0px 0px 5px blue';
             document.getElementById("status").style.fontSize = '48px';
             document.getElementById("progressBar").style.boxShadow = '';
             document.getElementById("loaded_n_total").style.fontFamily = '';
             document.getElementById("progressBar").value = 0;
             _("status").innerHTML = "&circlearrowright;";
             _("loaded_n_total").innerHTML = "Send new file";
             document.getElementById('avatar').value = '';
         }

         $('#fileupload').bind('fileuploadprogress', function (e, data) {
     // Log the current bitrate for this upload:
     // console.log(data.bitrate);
     console.log(data);
    });
    </script>
    <script>
    var qrcode = new QRCode("qrcode");

    function makeCode () {
        var elText = document.getElementById("text");

        if (!elText.value) {
            alert("Input a text");
            elText.focus();
            return;
        }

        qrcode.makeCode(elText.value);
    }

    makeCode();

    $("#text").
        on("blur", function () {
            makeCode();
        }).
        on("keydown", function (e) {
            if (e.keyCode == 13) {
                makeCode();
          }
      });
    </script>
    <script>
     var app = angular.module('myApp', ['ngFileUpload']);

     app.controller('myCtrl', ['$scope', '$http', '$timeout', '$compile', 'Upload',
         function($scope, $http, $timeout, $compile, Upload) {
         $scope.onChange = function (files) {
           if(files[0] == undefined) return;
           $scope.fileExt = files[0].name.split(".").pop()
         }

         $scope.isImage = function(ext) {
           if(ext) {
             return ext == "jpg" || ext == "jpeg"|| ext == "gif" || ext=="png" || ext=="gif"
           }
         }
         }]);
    </script>
    <?
    }

    //Menu//
 //body//
 include ($menu);
 //footer//
 echo '


 								<div id="toast">
 				 				 <div id="img">
 				 					 <i class="material-icons" id="iconstoast">check_circle_outline</i>
 				 				 </div>
 				 				 <div id="desc"></div>
 				 			 </div>';
?>
</body>
</html>
