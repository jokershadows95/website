<?php
//ustaw sekundy do timeout'u
$intTimeoutSeconds = 420;

session_start();
if (!user::isLogged()) {
	header("Location: index.php");
}
else {
		$id = $_SESSION['id'];	
if(isset($_SESSION['intLastRefreshTime']))
{
	if(($_SESSION['intLastRefreshTime']+$intTimeoutSeconds)<time())
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
	<link href="panelcomp2.css" rel="stylesheet" >
    <link href="Popups.css" rel="stylesheet" />
	<link href="info.css" rel="stylesheet" >
    <link href="panelcomp.css" rel="stylesheet" >
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="script/Show.js"></script>    
<script>
    $(document).ready(function () {
        $(window).load(function () {
            $("#infoshow).hide();
         });
        $(".btn btn-primary btn-lg").click(function() {
            $("#infoshow").show();
        });
        });
</script>                       
  </head>
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
				bottom: 0;
				right: 0;
				margin: 40px;
				text-align: right;
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
        .information {
            possition: realitive;
            top: 50%;
            background-color: darkblue;
            padding: 5px;
            text-algin: center;
            font-weight: bold;
}

</style>		
   <body>
	 <? include ('menus.php'); ?>
	
				
				<?
			    if ($handle = opendir('files/')) {
                    while (false !== ($entry = readdir($handle))) {
                        if ($entry != "." && $entry != "..") {
                            echo '
                                <div class="container-fluid">
                                   <div class="jumbotron" id="infoshow">
                                        <h1 class="display-4">Informacje z plików:</h1>
                                        <p class="lead" id="show"> </p>
                                    </div>
                                 <div class="jumbotron">
                                      <h1 class="display-4">Wersja 2.2.2!</h1>
                                      <p class="lead">Plik z informacjami na temat zmian w strukturach kody strony i zmiany mechanizmów jego działania</p>
                                      <p>Zaktualizowane w dniu:  ';
                                       $fileinfo = './files/information.txt';
                                        if(file_exists($fileinfo))   
                                             {
                                             $fileinfos =  round(filesize($fileinfo)/1024, 2);
                                             echo '<span class="lead">'.date("F d Y H:i:s", filemtime($fileinfo)).'</span>
                                             <p>Rozmiar pliku: '.$fileinfos.' kb </p>'; 
                                             } 
                                       echo ' </p>
                                      <hr class="my-4">
                                      <p>Pobierz informacje na swój dysk</p>
                                      <p class="lead">
                                        <a class="btn btn-primary btn-lg" href="download.php?file='.$entry.'" role="button"><img src="pics/download.png" width="40px" height="40px" alt="downloadbutton" ></a>
                                        <button class="btn btn-primary btn-lg" role="button" onclick="showDoc()">Show Content</button>
                                      </p>
                                    </div>
                                   </div>';
                     
                        }
                    }
                    closedir($handle);
                    if($profile[ranga] == "Administracja") {
                   echo ' <div class="container-fluid">
                                 <div class="jumbotron">
                                      <h1 class="display-4">Plik z dostępem tylko dla Administracji</h1>
                                      <p class="lead">Pliki przeznaczone tylko dla Administracji</p>';
                        if ($handles = opendir('logs/')) {
                    while (false !== ($entrys = readdir($handles))) {
                        if ($entrys != "." && $entrys != "..") {
                            echo '
                                <div class="container-fluid">
                                 <div class="jumbotron" style="background-color: lightgreen">
                                      <h1 class="display-4">Plik o nazwie: <b>'.$entrys.'</b></h1>
                                      <p class="lead" id="info">Plik z informacjami na temat połączeń i rozłączeń z serwisem</p>
                                      <hr class="my-4">
                                      <p>Pobierz informacje na swój dysk</p>
                                      <p class="lead">
                                        <a class="btn btn-primary btn-lg" href="downloads.php?file='.$entrys.'" role="button"><img src="pics/download.png" width="40px" height="40px"  alt="downloadbutton"></a>
                                        <button class="btn btn-primary btn-lg" role="button" onclick="showLog()">Show Content</button>
                                      </p>
                                    </div>
                                   </div>';
                        }
                    }
                    closedir($handles);
                    }
                    
                    echo '
                                <hr class="my-4">';
                                     $filename = './logs/log.log';
                                     $filenames = './logs/php-error.log';
                                        if (file_exists($filename) && file_exists($filenames)) 
                                          { 
                                      echo '
                                          <p>Data poprzedniej aktualizacji plików: '.date("F d Y H:i:s", filectime($filename)).'</p>
                                          <p class="lead">  ';
                                                $fileweight1 =  round(filesize($filename)/1024, 2);
                                                $fileweight2 =  round(filesize($filenames)/1024, 2);
                                                $fileweightall = ($fileweight1 + $fileweight2);
                                                if(filemtime($filename) > filemtime($filenames))   
                                                {
                                                 echo '  Ostatnia aktualizacja: '.date("F d Y H:i:s", filemtime($filename)).'
                                                    <p> Rozmiar plików: '.$fileweightall.' kb </p>'; 
                                                 } 
                                                 else 
                                                 {
                                                 echo '  Ostatnia aktualizacja: '.date("F d Y H:i:s", filemtime($filenames)).'
                                                   <p> Rozmiar plików: '.$fileweightall.' kb </p>';
                                                 }
                                            }
                                            echo '
                                          </p>
                                        </div>
                                       </div>';
                   }
                }
                }
                    ?>
               
   </body>
</html>