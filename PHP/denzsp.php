<?php
session_start();

 // Dołącz plik konfiguracyjny i połączenie z bazą
include 'errorlog.php';

/**
 * SKRYPT LOGOWANIA
 */
 // Dołączamy rdzeń systemu użytkowników

// Zabezpiecz zmienne odebrane z formularza, przed atakami SQL Injection


?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <link href="paneldcomp.css" rel="stylesheet" media="all">
    <link href="Popups.css" rel="stylesheet" />
    <link href="login.css" rel="stylesheet" media="all">
    <link href="forgot.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
  /*  var myVar;

        function CheckCon() {
          myVar = setInterval(isOnline, 1000);

          function isOnline(no, yes) {
              //setInterval(() => {
              var xhr = XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHttp');
              xhr.onload = function () {
                  if (yes instanceof Function) {
                      yes();
                  }
              }
              xhr.onerror = function () {
                  if (no instanceof Function) {
                      no();
                  }
              }
              xhr.open("GET", "http://denzs.cba.pl", true);
              xhr.send();
          }

          isOnline(

              function () {
                  document.getElementById("networkinfo").innerHTML = "<i class='material-icons'>network_check</i>";
                  document.getElementById('networkinfo').style.color = "#980000";
                  console.log("Sorry, we currently do not have Internet access.");
              },
              function () {
                  document.getElementById("networkinfo").innerHTML = "<i class='material-icons'>network_check</i>";
                  document.getElementById('networkinfo').style.color = "#007c09";

                  console.log("Succesfully connected!");
              }

          );
        }

        function isOnline(no, yes) {
            //setInterval(() => {
            var xhr = XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHttp');
            xhr.onload = function () {
                if (yes instanceof Function) {
                    yes();
                }
            }
            xhr.onerror = function () {
                if (no instanceof Function) {
                    no();
                }
            }
            xhr.open("GET", "http://denzs.cba.pl", true);
            xhr.send();
        }

        isOnline(

            function () {
                document.getElementById("networkinfo").innerHTML = "<i class='material-icons'>network_check</i>";
                document.getElementById('networkinfo').style.color = "#980000";
                //alert("Sorry, we currently do not have Internet access.");
            },
            function () {
                document.getElementById("networkinfo").innerHTML = "<i class='material-icons'>network_check</i>";
                document.getElementById('networkinfo').style.color = "#007c09";

                // alert("Succesfully connected!");
            }

        );
        setInterval(isOnline(), 1000);
        isOnline();*/
    </script>
</head>
<body>
    <header>
        <style>
            .conteiner {
                display: block;
                position: absolute;
                top: 1px;
                width: 100%;
                background-color: #4CAF50 !important;
                height: 20%;
                animation-name: show;
                animation-duration: 5s;
                animation-iteration-count: 1;
                -webkit-animation-name: show;
                -webkit-animation-duration: 5s;
                -webkit-animation-iteration-count: 1;
                -moz-animation-name: show;
                -moz-animation-duration: 5s;
                -moz-animation-iteration-count: 1;
                -o-animation: show;
                -o-animation-duration: 5s;
                -o-animation-iteration-count: 1;
            }
            .button-off {
                position: absolute;
                font-size: 35px;
                margin-left: 97%;
                top: 2px;
                padding: 10px;
                cursor: pointer;
            }
            .info {
                margin-top: 0px;
                margin-left: 10px;
                font-size: 36px;
                text-shadow: 0px 0px 15px #ffffff;
            }
            .title {
                margin-top: -20px;
                margin-left: 15px;
                font-size: 18px;
                text-shadow: 0px 0px 5px #ffffff;
            }
            #cookies {
              width: 100%;
              animation: none;
              position: absolute;
              bottom: 0;
              z-index: 2;
            }

        </style>

    </header>
    <div class="LoginForm">
        <p id="FCTS" class="FCTS" style="color: navy; float:right;right:0;cursor:pointer" data-toggle="tooltip" data-placement="bottom" title="FC - [WIP]"><i class="material-icons">shutter_speed</i></p>
        <img src="user.png" title="Login User" alt="Login User" class="user"/>
        <h2>Login</h2>
        <form action="" method="post">
            <div id="NCTS">
              <p>Nick</p>
              <input type="text" name="usernick" id="usernick" placeholder="Enter Nick" required/>
              <p>Password</p>
              <input type="password" name="userpassword" id="userpasword" placeholder="Enter Password" required/>
              <input type="hidden" name="action" value="9" />
              <input type="submit" value="Log In" id="loginsform"/>
              <a href="#" onclick="openNav()">Forget Password?</a>
                <div  ng-app="Conn" style="float: right; right: 0;">
                  <div ng-controller="ConnController" >
                      <span data-toggle="tooltip" data-placement="top" title="Network Connection: Connected" ng-show="online"><i class="material-icons" style="color:#007c09">network_check</i></span>
                      <span data-toggle="tooltip" data-placement="top" title="Network Connection: Disconnected" ng-show="!online"><i class="material-icons" style="color:#980000">network_check</i></span>
                  </div>
                </div>
                  <!--<span id="networkinfo" data-toggle="tooltip" data-placement="top" title="Network Connection"><i class="material-icons" style="color:#8f7c18" >network_check</i></span></p>-->
            </div>
        </form>
    </div>
    <div id="forgetp">
        <button class="closebtn" onclick="closeNav()" style="font-size:40px;border:none;background:none;margin-left:97%;cursor:pointer"><font style="color:white">&times;</font></button>
            <div class="infobox">
            <div class="img">
                <img src="pics/forgotpsw.png" alt="Image of Forgot Password" />
            </div>
            <div class="themesinfo">
                <h3>Reset Your Password </h3>
            </div>
            <div class="reset">
              <form action="" method="post">
                    <h2>Fill all blank field</h2>
                    <p>Name</p>
                    <input type="text" name="resetusername" id="resetusername" placeholder="Enter Your Name"/>
                    <p>Surname</p>
                    <input type="text" name="resetusersurname" id="resetusersurname" placeholder="Enter Your Surname"/>
                    <p>Nick</p>
                    <input type="text" name="resetusernick" id="resetusernick" placeholder="Enter Your Nick"/>
                    <p>GUID</p>
                    <input type="text" name="resetuserguid" id="resetuserguid"  placeholder="Enter Your ID Key"/>
                    <p>New Password</p>
                    <input type="password" name="resetusernewpassword" id="resetusernewpassword" placeholder="Enter Your New Password"/>
                    <p>Repeat New Password</p>
                    <input type="password" name="resetusernewpasswordrepeated" id="resetusernewpasswordrepeated" placeholder="Enter Your New Password Again"/>
                    <input type="hidden" name="action" value="10" />
                    <input type="submit" name="Reset_Password" value="Reset" />
                </form>
            </div>
        </div>
    </div>
     <script>
        function openNav() {
            document.getElementById("forgetp").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("forgetp").style.width = "0%";
        }
        </script>
        <script>
        $(document).ready(function () {
          /*  $("#FCTS.FCTS").click(
              function () {
                $(".FCTS").html('<i class="material-icons" id="BacktoNCTS">calendar_view_day</i>');
                $("#FCTS.FCTS").addClass("back").removeClass("FCTS");
                $("#NCTS").html('<p>Fast Connection ID:</p><input type="password" name="userFCID" id="userFCID" placeholder="Enter Your FCID" required/><input type="hidden" name="action" value="18" /><input type="submit" value="Log In" />');
              });

            $("#BacktoNCTS").click(
              function () {
                $(".back").html('<i class="material-icons">shutter_speed</i>');
                $("#FCTS.back").removeClass("back").addClass("FCTS");
                $("#NCTS").html('<p>Nick</p><input type="text" name="usernick" id="usernick" placeholder="Enter Nick" required/><p>Password</p><input type="password" name="userpassword" id="userpasword" placeholder="Enter Password" required/><input type="hidden" name="action" value="9" /><input type="submit" value="Log In" /><a href="#" onclick="openNav()">Forget Password?</a><div  ng-app="Conn" style="float: right; right: 0;"><div ng-controller="ConnController" ><span data-toggle="tooltip" data-placement="top" title="Network Connection: Connected" ng-show="online"><i class="material-icons" style="color:#007c09">network_check</i></span><span data-toggle="tooltip" data-placement="top" title="Network Connection: Disconnected" ng-show="!online"><i class="material-icons" style="color:#980000">network_check</i></span></div></div>');
              });*/

      });
    </script>
    <footer>
      <div class="alert alert-dark alert-dismissible fade show sticky-bottom" role="alert" id="cookies">
        <strong>Cookies!</strong> Strona zbiera informacje i zapisuje je w ciasteczkach (cookies).
        Wchodząc na stronę wyrażasz zgodę na wykorzystywanie ciasteczek.
        Ciasteczka są wykorzystywane tylko przez administrację Denz's
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </footer>
    </body>
</html>
