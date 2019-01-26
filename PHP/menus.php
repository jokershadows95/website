<?php //Menu
 //require 'modal.php';
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<style>
        .uncover {
            border: none;
            padding: 2px;
            background: none;
            color: black;
            cursor: pointer;
        }


        .Delete {
            width: 45%;
            border: 1px solid #000;
            background-color: #05426d;
            padding: 5px;
        }
        .Button {
            border-radius: 50%;
            background-color: #05426d;
            position: fixed;
            top: 77%;
            right: 40px;
        }
         .card .profile .card-img-top {
            position: relative;
            margin: 0;
            left: 0;
            top: 0;
            right: 0;
            padding: 0;
            width: 100%;
            height: 155px;
        }
        .card .profile{
            width: 100%;
            height: 100px;
        }
        .container-fluid .profile {
            margin: 0;
            padding: 0;
            right: 0;
            top: 0;
            width: 195px;
        }
        .task {
            width: 20px;
            height: 20px;
        }
        .card-img-top.profile {
            width: 100%;
        }
        span#sekundy {
            font-size: 10px;
            font-weight: bold;
        }
        .uncover#change {
                background-image: url(pics/off.svg);
                background-repeat: no-repeat;
                background-size: 100% 100%;
                width: 25px;
                height: 25px;
            }

            .uncover#changes {
                background-image: url(pics/off.svg);
                background-repeat: no-repeat;
                background-size: 100% 100%;
                width: 25px;
                height: 25px;
            }
             .uncover#mobile {
                background-image: url(pics/off.svg);
                background-repeat: no-repeat;
                background-size: 100% 100%;
                width: 25px;
                height: 25px;
            }
            .controlssetting {
              float: right;
            right: 235px;
            top: 25px;
            display: none;
            width: 215px;
            position: absolute;
            background-color: #4c7be8;
            border-radius: 25px;
            padding: 10px;
            z-index: 1;
        }
        #settings {
            position: relative;
            margin-top: -15px;
            width: 5px;
            height: 5px;
            padding-top: 2px;
            cursor: pointer;
            float: right;
            right: -6.5%;
        }
        .profileimg {
            position: page;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            line-height: 24px;
        }

        .profileimg:hover {
                transform: scale(1.5);
            }
            .switch {
  position: relative;
  display: inline-block;
  width: 44px;
  height: 19px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 12px;
  width: 12px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(23px);
  -ms-transform: translateX(23px);
  transform: translateX(23px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
   #profilepic {
            position: absolute;
            right: 20px;
        }

        #timers {
            position: absolute;
            right: 80px;
        }
        @media screen and (max-width: 1024px) {
             .card-img-top {
                display: none;
            }
            .container-fluid .profile {
                margin: 0;
                padding: 0;
                right: 2px;
                top: 15px;
                width: 150px;
                height: 75px;
            }
            .card-title#profs {
                font-size: 12px;
                top: -55px;
            }
            .text-muted#timer {
                 font-size: 10px;
                top: -55px;
            }
            span#sekundy {
            font-size: 9px;
            font-weight: bold;
        }
         #settings {
           display: block;
           position: absolute;
           width: 25px;
           bottom: 20px;
           float: left;
           left: 5px;
        }

        img#settings {
            width: 1px;
            height: 1px;
        }

             #profilepic {
                width: 25px;
                position: relative;
                right: 5px;
                float: right;
            }
            #timers {
                  left: 47%;
                  position: absolute;
                  top: 0px;
                  width: 140px;
            }
       }
	</style>
    <header>
            <?php
            $profile = user::getDataById ($id);
            ?>



    <nav class="navbar navbar-expand-lg navbar-light bg-light" bs-navbar>
        <a class="navbar-brand" href="index.php?site=1?name=<?echo ''.$_SESSION['userinfo'].''?>" title="Homepage" data-match-route="/welcomd.php">
            <img src="http://denzs.cba.pl/pics/Logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            Denz's Jazz Bar
        </a>
         <span class="navbar-text" id="timers">
                <small class="text-muted" id="timer"><span id="timer_info">Do wylogowania: </span><span id="sekundy"></span></small>
         </span>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" id="navtog">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">

                <a class="nav-item nav-link"  id="Our Job" href="index.php?site=2?name=<?echo ''.$_SESSION['userinfo'].''?>" title="Our Job" data-match-route="/denzp.php" md-nav-click="goto('denzp.php')"><center><font color="#05426d"><i class="material-icons icon">work</i></font><p class="iconname">Our Job</p></center></a>

                <a class="nav-item nav-link disabled" id="Pb" title="Protected Business" data-match-route="/#" md-nav-click="goto('#')"><center><font color="#05426d"><i class="material-icons icon">business</i></font><p class="iconname">Protectec Business</p></center></a>

                <a class="nav-item nav-link" id="Free" href="index.php?site=3?name=<?echo ''.$_SESSION['userinfo'].''?>" title="Free" data-match-route="/freed.php" md-nav-click="goto('freed.php')"><center><font color="#05426d"><i class="material-icons icon">grade</i></font><p class="iconname">Free</p></center></a>

                <a class="nav-item nav-link" id="Add" href="index.php?site=4?name=<?echo ''.$_SESSION['userinfo'].''?>" title="Add" data-match-route="/registered.php"><center><font color="#05426d"><i class="material-icons icon">add_circle</i></font><p class="iconname">Register</p></center></a>

                <a class="nav-item nav-link" id="Timeline" href="index.php?site=8?name=<?echo ''.$_SESSION['userinfo'].''?>" title="Timeline" data-match-route="/timeline.html"><center><font color="#05426d"><i class="material-icons icon">timeline</i></font><p class="iconname">Timeline</p></center></a>

                <a class="nav-item nav-link" id="Sp" href="index.php?site=6?name=<?echo ''.$_SESSION['userinfo'].''?>" title="Supervission" data-match-route="/supervision.php"><center><font color="#05426d"><i class="material-icons icon">supervisor_account</i></font><p class="iconname">Supervission</p></center></a>

                <a class="nav-item nav-link" id="Profile" href="index.php?site=5?name=<?echo ''.$_SESSION['userinfo'].''?>" title="Profile" data-match-route="/profiled.php"><center><font color="#05426d"><i class="material-icons icon">account_circle</i></font><p class="iconname">Profile</p></center></a>

                <a class="nav-item nav-link" href="index.php?site=7?name=<?echo ''.$_SESSION['userinfo'].''?>" title="Logout" data-match-route="/logutd.php"><center><font color="#05426d"><i class="material-icons icon">clear</i></font><p class="iconname">Logout</p></center></a>
            </div>
            <p id="settings" data-toggle="tooltip" data-placement="left" title="Settings"><i class="material-icons">settings</i></p>
            <div class="controlssetting">
                <p>
                    Light/Dark Mode:
                   <center>
                    <label class="switch">
                      <input type="checkbox" id="change" onclick="dark_light()">
                      <span class="slider round"></span>
                    </label>
                   </center>

                </p>
                <p>
                    Show/Hide BG Image:
                      <center>
                         <label class="switch">
                          <input type="checkbox" id="changes" onclick="disabledimg()">
                          <span class="slider round"></span>
                        </label>
                       </center>
                </p>
                <p>
                    Mobile Mode:
                   <center>
                    <label class="switch">
                      <input type="checkbox" id="mobile" onclick="mobiles()" disabled>
                      <span class="slider round"></span>
                    </label>
                   </center>
                </p>
            </div>

        <p class="catr" id="profilepic">
        <?
            echo '
            <button class="uncover info" id="myBtn" data-toggle="tooltip" data-placement="top" title="Your profile: '.$_SESSION['userinfo'].'"><img class="profileimg" src="images/'.$profile['nameavatar'].'" alt="'.$_SESSION['userinfo'].' '?>"  /></button>
        </p>
        </div>
    </nav>

               <br>
               				<script src="script/timer.js" type="text/javascript"></script>
				                  <script>
       $(document).ready(function () {
            $("#settings").click(function () {
                $(".controlssetting").toggle("slow");
            });
          });
    </script>
 	</header>
            </html>
