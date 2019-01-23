
<?php
$intTimeoutSeconds = 420;
require 'addingnews.php';
session_start();
$profile = user::getDataById ($id);
if (!user::isLogged()) {
	header("Location: index.php");
}
else {

        include 'administration/loginfile.php';
        setlocale(LC_TIME, 'pl_PL');
		$id = $_SESSION['id'];

$dzien = date('d');
$dzien_tyg = date('l');
$miesiac = date('n');
$rok = date('Y');

$miesiac_pl = array(1 => 'stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia');

$dzien_tyg_pl = array('Monday' => 'poniedziałek', 'Tuesday' => 'wtorek', 'Wednesday' => 'środa', 'Thursday' => 'czwartek', 'Friday' => 'piątek', 'Saturday' => 'sobota', 'Sunday' => 'niedziela');

$date =  "".$dzien_tyg_pl[$dzien_tyg].", ".$dzien." ".$miesiac_pl[$miesiac]." ".$rok."r.";
$_SESSION['date'] = $date;
$_SESSION['currentdates'] = $date;

        $time = date('H:i:s',time());
        $dates = strftime("%d  %b  %Y, (%A)");
				//$date =mb_convert_encoding($dates,'HTML-ENTITIES','UTF-8');
				//$date = utf8_encode($dates);
if(isset($_SESSION['intLastRefreshTime']))
{
	if(($_SESSION['intLastRefreshTime']+$intTimeoutSeconds)<=time())
	{
		session_destroy();
        header("Location: index.php?site=7");
		session_start();
	}
}
$_SESSION['intLastRefreshTime'] = time();
}
 ?>
<html lang="pl" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
   	<link href="panelcomp2.css" rel="stylesheet" />
</head>
<body>
<style>
			#Button button, .Button button {
				-webkit-transition:all 0.5s linear;
				-moz-transition:all 0.5s linear;
				-o-transition:all 0.5s linear;
				transition:all 0.5s linear;
				-moz-box-shadow: 4px 4px 8px 2px #05426d;
				-webkit-box-shadow:  4px 4px 8px 2px #05426d;
				box-shadow: 4px 4px 8px 2px #05426d;
				-moz-border-radius:7px 7px 7px 7px ;
				-webkit-border-radius:7px 7px 7px 7px ;
				border-radius:7px 7px 7px 7px ;
	}
	#Button button:hover, #Button button:focus, #Button button:active,
    .Button button:hover, .Button button:focus, .Button button:active {
		-webkit-box-shadow: 15px 15px 20px rgba(0,0, 0, 0.4);
		-moz-box-shadow: 15px 15px 20px rgba(0,0, 0, 0.4);
		box-shadow: 15px 15px 20px rgba(0,0, 0, 0.4);
		-webkit-transform: scale(1.25);
		-moz-transform: scale(1.25);
		transform: scale(1.25);
	}
	#Button {
				position: fixed;
				bottom: 150px;
				right: 0;
				margin: 40px;
				text-align: right;
                padding: 5px;
			}
    #Addbutton {
				position: fixed;
				bottom: 210px;
				right: 0;
				margin: 40px;
				text-align: right;
                padding: 5px;
			}
			#Button button, .Button button {
				background-color: #05426d;
				border: none;
				color: white;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				border-radius: 50%;
				width: 50px;
				height: 50px;
			}
			#ButtonIMG {
				width: 10px;
				height: 25px;
				margin-right: 20px;
				float: right;
			}
			#ButtonIMG:hover, #ButtonIMG:focus, #ButtonIMG:active {
				-webkit-box-shadow: 15px 15px 20px rgba(0,0, 0, 0.4);
				-moz-box-shadow: 15px 15px 20px rgba(0,0, 0, 0.4);
				box-shadow: 15px 15px 20px rgba(0,0, 0, 0.4);
			}
        .button-off {
            position: absolute;
            font-size: 35px;
            margin-left: 97%;
            top: 2px;
            padding: 10px;
            display:;
            cursor: pointer;
        }
        .col-sm-6 {
        padding: 5px;
        }
        .row {
        width: 98%;
        margin-left: 5px;
        position: relative;
        }
        .card-header.infos {

            background-color: #4c7be8;
        }
        .card-footer.infos, .text-muted.infos {
            background-color: #4c7be8;
            color: #4f4a4a!important;
        }
        .col-sm-4#delthis {
            margin-left: -35px;
        }
        input [type="submit"]#Deletes {
            position: absolute;
            }
        .container#Deletes {
           width: 50%;
           position: relative;
           transform: translate(2%, 0);
        }
        .container#Deletes  .card-header, .container#Deletes  .card-footer{
            background-color: #005796;
        }
        .typed-cursor {
            display: none;
        }

        .modal-header#addh {
            background-color: #1952c4;
        }
        .modal-body#addb
        {

        }
        .modal-footer#addf
        {
            background-color: #1952c4;
        }
        .who {
            margin-top: -7.5px;
            left: 30%;
            position: absolute;
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }
        .catr {
            line-height: 36px;
            margin-bottom: -0.5px;
            word-spacing: 5px;
        }
        .previewadding {
            position: absolute;
            right: 15px;
            top: 80px;
						width: 45%;

        }
        @media screen and (max-width: 1024px) {
        body {
        background-color: rgb(62, 70, 220);}
        .container#Deletes {
           width: 100%;
           position: relative;
           transform: translate(2%, 5%);
        }
        .typed-cursor {
            display: none;
        }
            .who {
                margin-top: -7.5px;
                left: 25px;
                position: absolute;
                border-radius: 50%;
                width: 50px;
                height: 50px;
            }
        }
</style>
            <?
             include ('menus.php'); ?>

			<?php

                if($profile['ranga']=="Barman" || $profile['ranga']=="Menager" || $profile['ranga']=="Kierownik" || $profile['ranga']=="Okres próbny" ||  $profile['ranga']=="Młodszy kierownik") {
             echo '   <div class="container-fluid">
                        <div class="jumbotron">
                            <h1 class="display-4"></h1>
                            <script src="script/typed.js" type="text/javascript"></script>
                            <script type="text/javascript">
                               var typed = new Typed(".display-4", {
                                  strings: [
                                        "Witaj, '.$_SESSION['userinfo'].'!",
                                        "Dzisiaj jest: '.$date.'  ",
                                        "Godzina: '.$time.' "
                                        ],
                                  typeSpeed: 60,
                                  backSpeed: 60,
                                  loop: true
                                });
                               </script>
                            <p class="lead">Pomyślnie zalogowałeś się do strony pracowników Denzs Jazz Bar. Na tej stornie zapoznasz się z regulaminami, nowymi wiadomościami i innymi takimi '.$profile['ban'].'</p>
                            <hr class="my-4">
                            <p>Zapoznaj się z stroną. Powodzenia :)</p>
                        </div>
                    </div>';
                }
			    echo '
                <div class="container-fluid">
                <div class="row" id="news">';
								$pages=mysql_query("SELECT * FROM news");
								$pagesis=mysql_num_rows($pages);
								$pagenb=$pagesis/5;
								$pagenumber=ceil($pagenb);
								$page=$_GET["page"];
								$pagep = $page-1;
								$pagen = $page+1;
								if($page=="" || $page=="1"){
								  $page1=0;
								}else{
								  $page1= ($page*5)-5;
								}
								$wynik=mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT $page1,4");
								while ($lem=mysql_fetch_array($wynik)){
					if($profile['ranga']=="Administracja" || $profile['ranga']=="Admins") {
			echo '   </br>

                    <div class="col-xs-sm-12 col-sm-6 col-md-6">
                    </br>
                        <div class="card text-center">
                          <div class="card-header infos">
                            <i class="material-icons">'.$lem['ikona'].'</i>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">'.$lem['temat'].'</h5>
                            <p class="card-text">'.$lem['tresc'].'</p>
                            <p class="card-text"><b>Do: '.$lem['do'].' ID: '.$lem['id'].'</b></p>
                          </div>
                          <div class="card-footer text-muted infos">
                            <p class="catr">
                                <img class="who" src="images/'.$lem['avatar'].'" title="'.$lem['autor'].'" />
                                &nbsp &nbsp &nbsp'.$lem['czas'].'
                            </p>
                          </div>
                        </div>
                    </div>';
					} else {
					if($profile['ranga']==$lem['do'] || $lem['do']=="All") {
			echo '
                    <div class="col-xs-sm-12 col-sm-6 col-md-6">
                     </br>
                        <div class="card text-center">
                          <div class="card-header infos">
                            <i class="material-icons">'.$lem['ikona'].'</i>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">'.$lem['temat'].' <span class="badge badge-danger">New</span></h5>
                            <p class="card-text">'.$lem['tresc'].'</p>
                          </div>
                          <div class="card-footer text-muted infos">
                            <p class="catr">
                                <img class="who" src="images/'.$lem['avatar'].'" title="Who add" />
                                &nbsp &nbsp &nbsp'.$lem['czas'].'
                            </p>
                          </div>
                        </div>
                        </div>';
                    }
                 }
							 }
                echo '</div>
							 <nav aria-label="Change page of news">
									<ul class="pagination pagination-lg justify-content-center">
									';
									if($page==1){
									echo '<li class="page-item disabled">
												<a class="page-link" href="?site=1?name='.$_SESSION['userinfo'].'&page='.$pagep.'" aria-label="Previous">
												<span aria-hidden="true">&laquo;</span>
	 										 <span class="sr-only">Previous</span>
	 									 </a>
	 								 </li>
											';
										}else{
											echo '<li class="page-item">
													<a class="page-link" href="?site=1?name='.$_SESSION['userinfo'].'&page='.$pagep.'" aria-label="Previous">
													<span aria-hidden="true">&laquo;</span>
		 										 <span class="sr-only">Previous</span>
		 									 </a>
		 								 </li>
													';
										}
								for($b=1;$b<=$pagenumber;$b++){
									if($page==$b){
										echo '<li class="page-item active"><a class="page-link" href="?site=1?name='.$_SESSION['userinfo'].'&page='.$b.'">'.$b.'</a></li>';
									}else{
										echo '<li class="page-item"><a class="page-link" href="?site=1?name='.$_SESSION['userinfo'].'&page='.$b.'">'.$b.'</a></li>';
									}
								}
									if($page==$pagenumber){
									 	echo	'
											<li class="page-item disabled">
												<a class="page-link disabled" href="?site=1?name='.$_SESSION['userinfo'].'&page='.$pagen.'" aria-label="Next">
												<span aria-hidden="true">&raquo;</span>
												<span class="sr-only">Next</span>
											</a>
										</li>
												';
									 }else{
										 echo	'
										 <li class="page-item">
										 	<a class="page-link" href="?site=1?name='.$_SESSION['userinfo'].'&page='.$pagen.'" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
											<span class="sr-only">Next</span>
										</a>
									</li>
										 ';
									 }
									 echo '

								</ul>
							</nav>
						</div>';
					?>


					</br></br>

			<script>
				function aud_play_pause() {
					var myAudio = document.getElementById("radio");
					if (myAudio.paused) {
						myAudio.play();
					} else {
						myAudio.pause();
					}
				}
			</script>
			<audio id="radio" src="http://listen.181fm.com/181-smoothac_128k.mp3" volume="25"></audio>
            <div class="Buttons">
							<div id="Button">
								<button id ="Button" onclick="aud_play_pause()" title="Jazz-Smooth"><font color="#186fad" id="ButtonIMG"><i class="material-icons">music_note</i></font></button>
							</div>
            </div>
       <?php
				if ($profile['ranga'] == "Administracja" || $profile['ranga'] == "Admins") {

			echo'
            <div class="Buttons">
                <div class="Button">
                    <button id="Addbutton" title="Add new title"><img src="buttons/add_button.svg" title="Add new title" alt="Add new title"/></button>
                </div>
            </div>

                <div class="container" id="Deletes">
                <div class="card text-center">
                   <div class="card-header">
                      <h1>Deleted information by ID</h1>
                   </div>
                   <div class="card-body">
                      <form id="deletedid" name="deletedid" method="post" action="#">
                          <div class="row"> ';
                            $usuw=mysql_query('SELECT * FROM news ORDER BY id DESC');
				            while ($dem=mysql_fetch_array($usuw)){
                             echo '
                              <div class="col-sm-3" id="delthis">
                                   <label for="deleteds">'.$dem['id'].':
                                     <input name="checkbox[]" type="checkbox" value="'.$dem['id'].'"/>
                                   </label>
                               </div> '; }
                                echo '
                          </div>
                   </div>
                    <div class="card-footer text-muted">
                      <input type="hidden" value="2" name="action"/>
                      <input type="submit" class="btn btn-dark" value="Usuń" name="Deletes" id="Deletes" />
                      </form>
                    </div>
                </div>
								</div>';
                }

       ?>

          <script>
    $(document).ready(function () {
        $("#Addbutton").click(function () {
            $("#Adds").show();
        });
        $("#closeAdding").click(function () {
            $("#Adds").hide();
        });
				var x = document.getElementById("toast")
				x.className = "show";
				setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
      });
    </script>
   </body>
</html>
