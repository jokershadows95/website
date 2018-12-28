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
	if(($_SESSION['intLastRefreshTime']+$intTimeoutSeconds)<time())
	{
		session_destroy();
        header("Location: index.php?site=7");
		session_start();
	}
}
$_SESSION['intLastRefreshTime'] = time();



	$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8" />
    <link href="Popups.css" rel="stylesheet" />
    <link href="paneldcomp.css" rel="stylesheet" />
    <style>
        .uncover.delete {
            color: white;
            font-size: 18px;
        }
        .delete:hover {
            color: red;
        }
				.edit {
					background: -webkit-gradient(linear, left top, right bottom, from(#abfb74), to(#035428));
          background-clip: text;
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
          line-height: 48px;
          display: initial; /* reset Font Awesome's display:inline-block*/
				}
				.edit:hover {
					background: -webkit-gradient(linear, left top, right bottom, from(#74f3fb), to(#110354));
					background-clip: text;
					-webkit-background-clip: text;
					-webkit-text-fill-color: transparent;
					display: initial; /* reset Font Awesome's display:inline-block*/
				}
    </style>
</head>
<body>
     <? include ('menus.php'); ?>
         <div class="table-responsive">
            <table class="table table-sm table-striped table-hover table-dark">
                <thead>
                    <tr>
												<th scope="col">ID</th>
                        <th scope="col">Imie i Nazwisko</th>
                        <th scope="col">Data rozpoczęcia</th>
                        <th scope="col">Data zakończenia</th>
                        <th scope="col">Powód nieobecności IC</th>
                        <th scope="col">Powód nieobecności OOC</th>
                        <th scope="col">Data dodania</th>
                        <th scope="col">Data edycji</th>
                        <th scope="col">Operacje</th>
                    </tr>
                </thead>
                <tbody>
                <?
			$wynik=mysql_query('SELECT * FROM free ORDER BY id ASC');
					while ($lem=mysql_fetch_array($wynik)){
			        echo '
                    <tr>
                        <th scope="row">'.$lem['id'].'</th>
												<td>'.$lem['dane'].'</td>
                        <td>'.$lem['od'].'</td>
                        <td>'.$lem['do'].'</td>
                        <td>'.$lem['ic'].'</td>
                        <td>'.$lem['ooc'].'</td>
                        <td>'.$lem['data'].'</td>
                        <td>'.$lem['aktualizacja'].'</td>';
                        if ($profile['ranga'] == "Administracja" || $profile['ranga'] == "Admins") {
                           echo '
                                <form method="post" action="">
                                    <td><center><input type="hidden" value="11" name="action"/><button class="uncover delete" name="DeleteFree" id="DeleteFree'.$lem['id'].'" value="'.$lem['id'].'">&times;</button>
                                </form>';
                            }
                            if ($lem['dane'] == $_SESSION['userinfo']) {
                            $EsID = $lem['id'];
                             if ($profile['ranga'] != "Administracja" && $profile['ranga'] != "Admins") {
                            echo'
                                <form method="post" action="">
                                    <td><center><input type="hidden" value="11" name="action"/><button class="uncover delete" name="DeleteFree" id="DeleteFree'.$lem['id'].'" value="'.$lem['id'].'">&times;</button>
                                </form>';
                                }
                                echo '
                                <a  href="index.php?site=9&id='.$EsID.'&name='.$_SESSION['userinfo'].'"><button class="uncover disabled" name="EditFree" id="EditFree" value="'.$lem['id'].' "><i class="material-icons edit">edit</i></button></center></a></td>';
                            }
                            if ($profile['ranga'] != "Administracja" && $profile['ranga'] != "Admins" && $lem['dane'] != $_SESSION['userinfo']){
                               echo' <td><center>Brak dostępu</center></td>';
                            }
                            echo '
                    </tr> '; } ?>
                </tbody>
            </table>
        </div>

        <?php
             };
 ?>
</body>


</div>
</html>
