<?php
$intTimeoutSeconds = 420;

session_start();
if (!user::isLogged()) {
	header("Location: index.php");
}
else {
		$id = $_SESSION['id'];
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

?>
   <!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <link href="a1.css" rel="stylesheet" />
    <link href="headerc.css" rel="stylesheet" />
    <link href="Profilesc.css" rel="stylesheet" />
    <link href="profilecard.css" rel="stylesheet" />
    <link href="uploads.css" rel="stylesheet" />
    <link href="searchc.css" rel="stylesheet" />
    <link href="searcher.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Supermercado+One" rel="stylesheet">
		<link href="wd.css" rel="stylesheet" />
		<link href="lookpd.css" rel="stylesheet" />
</head>
<body ng-app='myDataDisplayInfo'>
<style>
    .infos {
        background-color: dimgrey;
    }
    #headerinfo {
        background-color: #05426d;
        font-size: 24px;
        font-weight: bold;
        color: white;
    }
		.bans {
			font-size: 30px!important;
      background: -webkit-gradient(linear, left top, right bottom, from(#f40909), to(#400000));
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
			line-height: 48px!important;
      display: initial; /* reset Font Awesome's display:inline-block */
		}
		.cbans {
			font-size: 30px!important;
      background: -webkit-gradient(linear, left top, right bottom, from(#032f17), to(#1eeb33));
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
			line-height: 48px!important;
      display: initial; /* reset Font Awesome's display:inline-block */
		}
		.delete {
			font-size: 30px!important;
      background: -webkit-gradient(linear, left top, right bottom, from(#ffffff), to(#343433));
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
			line-height: 48px!important;
      display: initial; /* reset Font Awesome's display:inline-block */
		}
		.edit {
			font-size: 30px!important;
      background: -webkit-gradient(linear, left top, right bottom, from(#05eaf9), to(#020e79));
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
			line-height: 48px!important;
      display: initial; /* reset Font Awesome's display:inline-block */
		}
		.bto {
			font-size: 30px!important;
      background: -webkit-gradient(linear, left top, right bottom, from(#9e0e0e), to(#000000));
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
			line-height: 48px!important;
      display: initial; /* reset Font Awesome's display:inline-block */
		}
		.UUID {
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			width: 75%;
		}
</style>
    <? include ('menus.php'); ?>
    <br>
<?
		include 'bans.php';
    if ($profile['ranga']=="Administracja" || $profile['ranga']=="Admins" || $profile['ranga']=="Menager" || $profile['ranga']=="Kierownik") {
			$howmuchbans = mysql_fetch_array(mysql_query('SELECT COUNT(*) FROM workers WHERE ban = "YES" || bandate != "0000-00-00"'));
			$howmuchpl = mysql_fetch_array(mysql_query('SELECT COUNT(*) FROM workers'));
			$howmuchon = mysql_fetch_array(mysql_query('SELECT COUNT(*) FROM workers WHERE online = "1"'));
    echo '
		<div class="container-fluid">
      <div class="card">
          <div class="card-header" id="headerinfo">
           Profile użytkowników
					 <span style="position:absolute;right:5px;margin-top:-15px;line-height: 10px">
					 <br/>
						<span style="font-size:10px;margin-top:-15px">Użytkowników: '.$howmuchpl[0].'</span><br/>
						<span style="font-size:10px;margin-top:-15px">Zbanowanych: '.$howmuchbans[0].'</span><br/>
						<span style="font-size:10px;margin-top:-15px">Online: '.$howmuchon[0].'</span>
						</span>
          </div>
          <div class="card-body infos">';
    echo '<div class="container-fluid">';
    echo '<div class="row">';
    $result=mysql_query('SELECT * FROM workers ORDER BY id ASC');
    while ($row=mysql_fetch_array($result)){
    echo '
    <div class="col-sm-6 col-md-3">
    <form method="post" action="">
    <div class="cards">
    <font color="black">
    <div class="contains">
    <img src="images/'.$row['nameavatar'].'" data="'.$row['nick'].'" width="100%" alt="'.$row['nick'].'"/>
    <div class="overlay">
    <div class="text">'.$row['nick'].'</div>
    </div>
    </div>
    <h1>'.$row['imie'].' '.$row['nazwisko'].'</h1>
    <p class="title">
    <select id="ranga" name="ranga" class="uncovers">
    <option value="'.$row['ranga'].'">'.$row['ranga'].'</option>
    <option value="Admins">Admins</option>
    <option value="Menager">Menager</option>
    <option value="Kierownik">Kierownik</option>
    <option value="Młodszy kierownik">Młodszy kierownik</option>
    <option value="Barman">Barman</option>
    <option value="Kelner">Kelner</option>
    <option value="Okres próbny">Okres próbny</option>
    </select>
    </p>
    <p><b>Avatar path:</b> '.$row['nameavatar'].' </p>
		<p><b>ID:</b> '.$row['id'].' </p>
    <p><b>Skin ID:</b>
    <select id="skin" name="skin" class="uncoverp">
    <option value="'.$row['skin'].'">'.$row['skin'].'</option>
    <option value="20">20 - skin męski ciemny</option>
    <option value="46">46 - skin męski jasny</option>
    <option value="48">48 - skin męski ciemny</option>
    <option value="59">59 - skin męski jasny</option>
    <option value="69">69 - skin damski ciemny</option>
    <option value="91">91 - skin damski jasny</option>
    <option value="98">98 - skin męski jasny</option>
    <option value="169">169 - skin damski jasny</option>
    <option value="171">171 - skin męski jasny</option>
    <option value="172">172 - skin damski jasny</option>
    <option value="185">185 - skin damski jasny</option>
    <option value="223">223 - skin męski ciemny</option>
    <option value="240">240 - skin męski ciemny</option>
    </select></p>';
    if ($row['adres']=="") {
    echo '<p><b>Adres zamieszkania:</b><font color="#7A0000"> Brak danych</font></p>';
    }else{
    echo '<p><b>Adres zamieszkania:</b> '.$row['adres'].'</p>';
    }
    if ($row['numerdomu']=="0") {
    echo '<p><b>Numer domu:</b><font color="#7A0000"> Brak danych</font></p>';
    }else{
    echo '<p><b>Numer domu:</b> '.$row['numerdomu'].'</p>';
    }
    if ($row['numertelefonu']=="0") {
    echo '<p><b>Numer telefonu:</b><font color="#7A0000"> Brak danych</font></p>';
    }else{
    echo '<p><b>Numer telefonu:</b> '.$row['numertelefonu'].'</p>';
    }
    if ($row['who']=="") {
    echo '<p><b>Dodany przez:</b><font color="#05426d"> System</font></p>';
    }else{
    echo '<p><b>Dodany przez:</b><font color="#004200"> '.$row['who'].'</font></p>';
    }
		if ($row['pensja']=="") {
    echo '<p><b>Pensja:</b><font color="#7A0000"> Nie ustawiona</font></p>';
    }else{
    echo '<p><b>Pensja:</b> '.$row['pensja'].'</p>';
    }
		if($row['ban']=="YES") {
			echo '<p><b>Kara:</b><font color="#ac0b0b"> Zbanowany</font></p>';
		}else{
		if($row['bandate'] !== "0000-00-00") {
			$currentdate = date("Y-m-d");
			if($row['bandate'] <= $currentdate) {
				echo '<p><b>Kara:</b><font color="#063c94"> Zbanowany do: <b> '.$row['bandate'].'</b> <i><span style="font-family:Agency FB">Użytkownik jeszcze się nie logował</span></i></font></p>';
			}else{
				echo '<p><b>Kara:</b><font color="#ac0b0b"> Zbanowany do: <b> '.$row['bandate'].'</b></font></p>';
			}
		}else {
    echo '<p><b>Kara:</b><font color="#004200"> Bez kar</font></p>';
	}
    }
		$number = ($row['banamount'] / 2);
    echo '
		<p><b>Ilość posiadanych kar: </b> '.$number.' </p>
		<p><b>Dodany dnia:</b> '.$row['dodany'].' </p>
    <p><b>UUID:</b> <input type="text" class="UUID" name="UUID" value="'.$row['key_id'].'"> </p>
    </font>
    <div style="margin: 24px 0;">
    <center><table>
    <tr> <td>
    <a href="#" class="linked"><input type="hidden" value="8" name="action"/><button class="uncover" name="Bupt" id="Bupt" value="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Edycja"><i class="material-icons edit">edit</i></button></a>
    </td><td>
    </form>
    <form method="post" action="">
    <a href="#" class="linked"><input type="hidden" value="6" name="action"/><button class="uncover" name="dete" id="dete" value="'.$row['id'].'" data-toggle="tooltip"  data-placement="top" title="Usunięcie"><i class="material-icons delete">delete</i></button></a>
    </form>
		</td><td>
		<form method="post" action="">
    <a href="#" class="linked"><input type="hidden" value="12" name="action"/><button class="uncover" name="banid" id="banid" value="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Zbanowanie"><i class="material-icons bans">close</i></button></a>
    </form>
		</td><td>
		<form method="post" action="">
		<a href="#" class="linked"><input type="hidden" value="13" name="action"/><button class="uncover" name="cban" id="cban" value="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Odbanowanie"><i class="material-icons cbans">done</i></button></a>
		</form>
		</td><td>
    <!--<a href="#" class="linked">--><button type="button" class="uncover"  value="'.$row['id'].'" name="banto" id="banto" data-toggle="tooltip" data-placement="top" title="Zbanowanie do dnia"><i class="material-icons bto">hourglass_full</i></button><!--</a>-->
    </td></tr></table></center>
    </div>
		';
    if ($row['online']==FALSE) {
    echo ' <p style="margin-left:0px;margin-right:0px"><button class="profilebutton-offline">Offline</button></p>';
    } else {
    echo ' <p style="margin-left:0px;margin-right:0px"><button class="profilebutton-online">Online</button></p>';
    }
    echo '
    </div></div>';
    }
    echo '
    </div>';
    echo '</div></div></div> <br/>

		<div class="jumbotron jumbotron-fluid lookpd" ng-controller="diCtrl">
			<div class="container">
				<h1 class="display-4">Nowe podania do rozpatrzenia</h1>
				<div class="table-responsive">
					<table class="table table-sm table-dark">
					  <thead class="thead-dark">
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Name</th>
							      <th scope="col">Surname</th>
							      <th scope="col">Date</th>
										<th scope="col">Action</th>
										<th scope="col">Opinion</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr ng-repeat="x in xusers">
							      <th scope="row">{{x.numb}}</th>
							      <td>{{x.name}}</td>
							      <td>{{x.surname}}</td>
							      <td>{x.date}}</td>
										<td>{{x.action}}</td>
										<td><button class="uncover button" data-toggle="tooltip" data-placement="top" title="Accept"><i class="material-icons cbans">done</i></button><button class="uncover button" data-toggle="tooltip" data-placement="top" title="Discard"><i class="material-icons bans">close</i></button></td>
							    </tr>
					  </tbody>
					</table>
				</div>
			</div>
		</div>

		';}
    if ($profile['ranga']=="Okres próbny" || $profile['ranga']=="Kelner" || $profile['ranga']=="Barman") {
		/*	echo '
			<div class="container-fluid">
	      <div class="card">
	          <div class="card-header" id="headerinfo">
	           Użytkownicy
	          </div>
	          <div class="card-body infos">
    				<div class="row">';*/
						$nick = $profile['nick'];
    $row=mysql_fetch_array(mysql_query("SELECT * FROM `workers` WHERE `nick` = '$nick'"));

    /*echo '<div class="col-sm-4 col-md-2">';
    if ($row['online']==FALSE) {
        echo '<div class="UsersAvatarsHeaders">';
    echo '
    <div class="contains">
    <img class="img-offline" src="images/'.$row['nameavatar'].'"  alt="Avatar użytkownika:'.$row['nick'].'-offline" />
    <div class="overlay-offline">
    <div class="text">'.$row['nick'].'</div>
    </div>
    </div>
    </div>';
    }
    else {
    echo '
		<div class="UsersAvatarsHeaders">
	    <div class="contains">
	    	<img class="img-online" src="images/'.$row['nameavatar'].'"  alt="Avatar użytkownika:'.$row['nick'].'-online" />
	    	<div class="overlay-online">
	    		<div class="text">'.$row['nick'].'</div>
    		</div>
    	</div>
    </div>';
    }
    echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div> </div><br/>';*/
		echo '<div class="container-fluid">
						<div class="jumbotron">
							<h1 class="display-4 wd">Comming Soon</h1>
							<p class="lead">W przeciągu następnych tygodni owa podstrona przejdzie dużą modernizację i będzie do nie poznania</p>
							<p class="lead">Lista osób aktywnych będzie przeniesiona do innego "ośrodka". </p>
							<p class="lead">Prosimy czekac z niecierpliwoscia :) </p>
							<hr class="my-4">
							<p class="wd">Adding: 23 December 2018</p>
						</div>
					</div>
					<div class="container">
					<p class="alert alert-dark wd text-center">Still in progress [ WIP ] </p>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-lg-6">
								<div class="container-fluid money">
									<div class="jumbotron" style="box-shadow: 0 4px 8px 0 #1b1b1b, 0 6px 20px 0 #1b1b1b;">
										<h1 class="display-4 wd">Pensja</h1>
										<p class="lead">
										<form>
											<div class="form-group">
												<p>Twoja obecna pensja: <b class="text-primary">'.$profile['pensja'].'$</b></p>
												<label for="formControlRange">200$ - 1500$</label>
												<input type="range" class="form-control-range" id="formControlRange" min="200" max="1500" value="'.$row['pensja'].'" title="Current value: '.$row['pensja'].'">
												<br>
												<p>Proponowana pensja przez Ciebie:</p>
													<div class="text-right">
														<div class="spinner-grow text-dark" role="status">
															<span class="sr-only">Loading...</span>
														</div>
													</div>

											</div>
										</form>
										</p>
										<p class="lead"></p>
										<hr class="my-4">
										<p class="wd"><button type="button" class="btn btn-success disabled">Send</button>
																	<button type="button" class="btn btn-danger disabled">Cancel</button>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-lg-6">
								<div class="container-fluid">
									<div class="jumbotron" style="box-shadow: 0 4px 8px 0 #1b1b1b, 0 6px 20px 0 #1b1b1b;">
										<h1 class="display-4 wd">Awans</h1>
										<p class="lead">
										<form>
											<div class="form-group">
												<label for="formControlRange">Prośba o otrzymanie awansu</label>
												<div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <div class="input-group-text">
											      <input type="radio" aria-label="Checkbox for following text input">
											    </div>
											  </div>
											  <input type="text" class="form-control" aria-label="Text input with checkbox" value="Ubiegam się o awans na wyższe stanowisko" disabled>
											</div>

											<div class="input-group">
											  <div class="input-group-prepend">
											    <div class="input-group-text">
											      <input type="radio" aria-label="Radio button for following text input">
											    </div>
											  </div>
											  <input type="text" class="form-control" aria-label="Text input with radio button" value="Ubiegam się na awans na stanowiko kierownicze" disabled>
											</div>
											</div>
										</form>
										</p>
										<p class="lead text-danger"><i class="material-icons" style="color: darkred">warning</i><b> Zaznaczyc można tylko jedną pozycję. Zaznaczenie obu będzie skutkowało odrzuceniem takiego podania</b></p>
										<hr class="my-4">
										<p class="wd"><button type="button" class="btn btn-success disabled">Send</button>
																	<button type="button" class="btn btn-danger disabled">Cancel</button>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>




					';
	}
    ?>
  <!-- <script language="javascript" type="text/javascript">
		document.write(document.URL);
		document.write(document.namesomething);
	</script> -->
  <!-- <SCRIPT LANGUAGE="JavaScript">
					document.write("Twoja przeglądarka to: " + navigator.appName + " " + navigator.appVersion)
	</SCRIPT> -->
	<script>
/*	function ban() {
		document.getElementById("banstoid").style.display = 'block';
	}*/
		$(document).ready(function() {
			$("button.uncover#banto").click(function () {
			$("#banstoid").show();
			var id = $(this).val();
			$("input#bansid").val(id);
			$("input#banids1").val(id);
			//console.log("Clicked banto" + id);
		});
			$("#banclose").click(function () {
				$("#banstoid").hide();
			});
		});
	</script>

   </div>
 </div>
 <script>
 var fetch = angular.module("myDataDisplayInfo", []);

 fetch.controller("diCtrl", ["$scope", "$http", function ($scope, $http) {
 $http({
  method: "get",
  url: "http://denzs.cba.pl/getinfo.php"
 }).then(function successCallback(response) {
  // Store response data
  $scope.xusers = response.data;
 });
 }]);
 </script>
    </body>
	<? }?>
</html>
