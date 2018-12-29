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
<html>
<head>
    <meta charset="UTF-8">
    <title>Denz's</title>
    <link href="parallax.css" rel="stylesheet">
    <link href="Popups.css" rel="stylesheet" />
    <link href="Profilesc.css" rel="stylesheet" />
    <link href="headerc.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <style>
        .jumbotron.jumbotron-fluid {
            background-color: #5df;
        }
    </style>
</head>

   <body>
	 <? include ('menus.php'); ?>
        <br>
			<?php
			if($profile['ranga']=="Kierownik" || $profile['ranga']=="Menager" || $profile['ranga']=="Młodszy kierownik" || $profile['ranga']=="Administracja") {
				echo '
                    <div class="container-fluid">
                                 <div class="jumbotron jumbotron-fluid">
                                    <div class="container">
                                      <h1 class="display-4">Poradnik dla '.$profile['ranga'].'</h1>
                                      <p class="lead">Cała strona poświęcona dla osób zajmujących się zarządzaniem lokalu. Od rekrutacji po ogłoszenia</p>
                                      <hr class="my-4">
                                      <p>Strona z poradnikiem</p>
                                      <p class="lead">
                                        <a class="btn btn-primary btn-lg" target="poradnik" href="testowy.html" role="button">Poradnik</a>
                                      </p>
                                    </div>
                                   </div>';
			} else {

				echo '
                    <div class="container-fluid">
                        <div class="jumbotron jumbotron-fluid">
                          <div class="container">
                            <h1 class="display-4">Poradnik dla '.$profile['ranga'].'a</h1>
                            <p class="lead">Obecnie nie ma stworzonego poradnika dla Twojej rangi. Zostaniesz poinformowany kiedy zostanie dodany poradnik dla Twojej rangi</p>
                          </div>
                        </div>
                    </div>';

			}

            ?>

       <?php
    echo '<div class="break"></div>';
     ?>

   </body>


<?php

}

?>
</div>
</html>
