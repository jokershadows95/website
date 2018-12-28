<?php
   


		session_start();
			if (isset($_SESSION['protect'])) {
		
		
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ultor Corporation</title>
	<meta name="keywords" content="Protected Business" />
	<meta name="description" content="Protected Business" />
	<meta name="author" content="Ultor" />
	<meta name="robots" content="all" />
	<link href="panel3.css" rel="stylesheet" >
	<link rel="apple-touch-icon" sizes="180x180" href="pics/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="pics/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="pics/favicons/favicon-16x16.png">
	<link rel="manifest" href="pics/favicons/manifest.json">
	<link rel="mask-icon" href="pics/favicons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">
	<meta http-equiv="refresh" content="180;URL=logout.php" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>

   
			
			
   <body>
	<style>
		#user_log {
			height: 28px;
			float: right;
			margin-right: 1px;
			box-sizing: border-box;
			border: 2px solid white;
			background-color: #9e3800;
			text-algin: right;
			padding: 1px;
			possition: fixed;
		}
		#time {
			height: 24 px;
			width: 120 px;
			float: right;
			padding: 10px;
			margin-top: 40px;
		}
		#logo {
			margin-left: 30%;
			height: 25%;
			width: 50%;
		}	
			#Job {
				height: 48px;
				width: 10px;
				margin-left: 50px;
				padding: 1px;
			}
			#Business {
				width: 10px;
				height: 48px;
				margin-left: 50px;
				padding: 1px;
			}
			#navbar {
				width: 1000px;
				padding: 5px;
				height: 50px;
			}
			#VIP {
				width: 10px;
				height: 48px;
				margin-left: 50px;
				padding: 1px;
			}	
			#Homepage {
				width: 10px;
				height: 48px;
				margin-left: 420px;
				padding: 1px;
			}
			#Statics {
				height: 48px;
				width: 10px;
				margin-left: 50px;
				padding: 1px;
			}	
			#Supervisor {
				height: 48px;
				width: 10px;
				margin-left: 50px;
				padding: 1px;
			}
			#Logout {
				height: 48px;
				width: 10px;
				margin-left: 50px;
				padding: 1px;
			}
			#Clients {
				width: 10px;
				height: 48px;
				margin-left: 50px;
				padding: 1px;
			}
			#Map {
				height: 100%;
				width: 200%;
				padding: 1px;
			}
			map {
				display: inline;
			}	
	</style>
    <header>
		<div id="user_log">
					<?php 
						echo '<table> <td>Zalogowany: </td><td>'.$_SESSION['userinfo']."   </td></table>";
						
					?>		
		</div>
		<div id="logo">
			<img src="pics/ultorlogo.png" title="Ultor Corporation" />
		</div>	
			
	</header>
		<div id="navbar">
				<table>
					<nav>
						<td>
							<div id="Homepage">
								<a href="http://tsg.cba.pl/welcome.php" title="Homepage"><font color="#ff6f00"><i class="material-icons">home</i></font></a>
							</div>
						</td>
						<td>
							<div id="Job">
								<a href="http://tsg.cba.pl/ourjob.php" title="Our Job"><font color="#ff6f00"><i class="material-icons">work</i></font></a>
							</div>
						</td>
						<td>
							<div id="VIP">
								<a href="http://tsg.cba.pl/free.php" title="Free"><font color="#ff6f00"><i class="material-icons">grade</i></font></a>
							</div>	
						</td>
						<td>
							<div id="Clients">
								<a href="http://tsg.cba.pl/clients.php" title="Clients"><font color="#ff6f00"><i class="material-icons">accessibility</i></font></a>
							</div>
						</td>
						<td>
							<div id="Statics">
								<a href="http://tsg.cba.pl/statics.php" title="Statics"><font color="#ff6f00"><i class="material-icons">timeline</i></font></a>
							</div>
						</td>
						<td>
							<div id="Supervisor">
								<a href="http://tsg.cba.pl/chief.php" title="Supervission"><font color="#ff6f00"><i class="material-icons">supervisor_account</i></font></a>
							</div>
						</td>
						<td>
							<div id="Supervisor">
								<a href="http://tsg.cba.pl/profile.php" title="Profile"><font color="#ff6f00"><i class="material-icons">account_circle</i></font></a>
							</div>
						</td>
						</td>
						<td>
							<div id="Logout">
								<a href="http://tsg.cba.pl/logout.php" title="Logout"><font color="#ff6f00"><i class="material-icons">clear</i></font></a>
							</div>
						</td>
					</nav>
				</table>
				
			</div>
			<center><font color="#ff6f00" face="impact"><h2>Chronione lokale mapka</h2></font></center>
			<div id="map">
				<center><img src="pics/biznesy2.jpg" title="Lokalizacja biznesów" alt="Lokalizacja" usemap="#maps"/></center>
				<map name="maps">
					<area shape="rect" coords="500,850,500,850" href="http://tsg.cba.pl/ourjob.php" alt="centrum">
				</map>	
			</div>
			<audio controls src="music/Laura Branigan - Self Control.mp3" type="audio/mp3" autoplay="enabled" loop="enabled" hidden="true" volume="25%"/>
   </body>
   
   <footer>
   </footer>
<?php 
		} else {
			header("Location: tsgp.php");  	
			}
	
		?>
</html>   
