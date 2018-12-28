<?php

$action = (int)$_POST['action'];
if ($action != null) {
    switch ($action) {
        case 1:
          /* Dodawanie newsów */
          $ikona=$_POST['ikons'];
					$temat=$_POST['temat'];
					$tresc=$_POST['tresc'];
					$autor=$_POST['autor'];
					$do=$_POST['do'];
                    $avs=$_POST['avatar'];
                    $ids=$_POST['idz'];
                    $die = "Wystąpił błąd w zapytaniu i nie udało się zapisać nowego newsa. Spróbuj ponownie. <br/> ID: ".$ids." ";

					mysql_query("INSERT INTO news ( id, autor, temat, tresc, do, ikona, avatar) VALUES('$ids','$autor','$temat','$tresc','$do','$ikona','$avs');")
						/*or die (setcookie('false', $die , time()+20))*/;
                    $mess = "Dodano nową wiadomość <br/>
                                                <b>Ikona:</b> <i class='material-icons'>".$ikona."</i><br/>
                                                <b>Temat:</b> ".$temat."<br/>
                                                <b>Do:</b> ".$do."<br/>
                                                <b>Treść:</b> ".$tresc."<br/>
                                                <b>Avatar:</b> <img class='who' src='images/".$avs."'/><br/>";
                        setcookie('success' , $mess , time()+10);
						echo "<meta http-equiv='refresh' content='0'>";
        break;

        case 2:
                    /* Usuwanie newsów */
                    $IDD = implode("','",$_POST['checkbox']);
                    $IDD2 = implode(",",$_POST['checkbox']);
                    if($IDD == null) {
                      $incorect = "Nie zaznaczono żadnej pozycji <br/> Przeładowałeś tylko stronę!";
                      setcookie('info', $incorect, time()+25);
                    }else{
                    $die2 = "Wystąpił błąd w zapytaniu i nie udało się usunąć wiadomości o ID: $IDD2 <br/><b>Spróbuj ponownie za jakiś czas!</b>";
                    mysql_query("DELETE FROM `news` WHERE id in ('$IDD') ;") or die (setcookie('false', $die2 , time()+15));
                    $succ = "Rządanie o usunięciu wiadomości o ID:<b> ".$IDD2."</b> zostało pomyślnie zakończone";
                    setcookie('success', $succ , time()+15);
                    // $_SESSION['successa'] = "Rządanie o usunięciu wiadomości o ID:<b>".$IDD2."</b> zostało pomyślnie zakończone";
                    echo "<meta http-equiv='refresh' content='0'>";
                  }
        break;

        case 3:
                       /* Rejestracja nowego użytkownika */
                        // Zabezpiecz dane z formularza przed kodem HTML i ewentualnymi atakami SQL Injection

                            $login = mysql_real_escape_string(htmlspecialchars($_POST['usernick']));
                            $pass = mysql_real_escape_string(htmlspecialchars($_POST['userpassword']));
                            $pass_v = mysql_real_escape_string(htmlspecialchars($_POST['auserpassword']));
                            $imie = mysql_real_escape_string(htmlspecialchars($_POST['username']));
  	                        $nazwisko = mysql_real_escape_string(htmlspecialchars($_POST['usersurname']));
	                          $osoba = mysql_real_escape_string(htmlspecialchars($_POST['addingperson']));
                            $adres = mysql_real_escape_string(htmlspecialchars($_POST['useradress']));
                            $dom = mysql_real_escape_string(htmlspecialchars($_POST['useradressnumber']));
                            $phone = mysql_real_escape_string(htmlspecialchars($_POST['userphone']));
                            $rank = mysql_real_escape_string(htmlspecialchars($_POST['userrank']));
                            $skin = mysql_real_escape_string(htmlspecialchars($_POST['userskin']));
                            $userm = mysql_real_escape_string(htmlspecialchars($_POST['userm']));
                            $userw = mysql_real_escape_string(htmlspecialchars($_POST['userw']));
                            $keyid = mysql_real_escape_string(htmlspecialchars($_POST['jsIdResult']));


                            /**
                             * Sprawdź czy podany przez użytkownika key_ID lub login już istnieje
                             */
                            $existsLogin = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM workers WHERE nick='$login' LIMIT 1"));
	                          $existskey_ID = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM workers WHERE kay_id='$keyid' LIMIT 1"));

                            $errors = ''; // Zmienna przechowująca listę błędów które wystąpiły


                            // Sprawdź, czy nie wystąpiły błędy
                            if (!$login || !$pass || !$pass_v  || !$osoba) $errors .= '</br>- Musisz wypełnić wszystkie pola z <b>Basic Options</b>: <b>Nick</b>,<b>Password</b>,<b>Password Again</b>,<b>Adding Person</b>'; //Basic Adding
                            if ($existsLogin[0] >= 1) $errors .= "</br>- Ten login jest zajęty";
	                          if ($existskey_ID[0] >= 1) $errors .= "</br>- Podany UUID jest już zajęty";
                            if ($pass != $pass_v)  $errors .= "</br>- Hasła się nie zgadzają";
	                          if ($osoba == "") $errors .= - "</br>- Nie została podana osoba dodająca";

                            /**
                             * Jeśli wystąpiły jakieś błędy, to je pokaż
                             */
                            if ($errors != '') {
		                        $err1 = "Wystąpił błąd: ".$errors."</br> <b>napraw go!</b>";
                                setcookie('error', $err1, time()+15);
                                             echo "
                                        <meta http-equiv='refresh' content='0' />";
                            }

                            /**
                             * Jeśli nie ma żadnych błędów - kontynuuj rejestrację
                             */
                            else {

                                // Posól i zasahuj hasło
                                $pass = user::passSalter($pass);
                                $baninfo = "0000-00-00";

                                // Zapisz dane do bazy
                                if($rank == null) $rank = "Okres próbny";
                                if(!$_POST['userm'] == null) {
                                mysql_query("INSERT INTO workers ( imie, nazwisko, haslo, nick, who, adres, numerdomu, numertelefonu, ranga, skin, nameavatar, key_id, bandate) VALUES('$imie','$nazwisko','$pass','$login','$osoba','$adres','$dom','$phone','$rank','$skin','$userm','$keyid','$baninfo');") or die ('<p class="error">Wystąpił błąd w zapytaniu i nie udało się zarejestrować użytkownika.</p>');
                                }
                                if(!$_POST['userw'] == null)    {
                                mysql_query("INSERT INTO workers ( imie, nazwisko, haslo, nick, who, adres, numerdomu, numertelefonu, ranga, skin, nameavatar, key_id, bandate) VALUES('$imie','$nazwisko','$pass','$login','$osoba','$adres','$dom','$phone','$rank','$skin','$userw','$keyid','$baninfo');") or die ('<p class="error">Wystąpił błąd w zapytaniu i nie udało się zarejestrować użytkownika.</p>');
                                }
                                if($_POST['userm'] == null && $_POST['userw'] == null) {
                                mysql_query("INSERT INTO workers ( imie, nazwisko, haslo, nick, who, adres, numerdomu, numertelefonu, ranga, skin, key_id, bandate) VALUES('$imie','$nazwisko','$pass','$login','$osoba','$adres','$dom','$phone','$rank','$skin','$keyid','$baninfo');") or die ('<p class="error">Wystąpił błąd w zapytaniu i nie udało się zarejestrować użytkownika.</p>');
                                }
		                        $succ1 = "Użytkonik o loginie: ".$login.", został zarejestrowany.";
                                setcookie('success', $succ1, time()+15);
                                echo "
                                        <meta http-equiv='refresh' content='0' />";

                            }

        break;

        case 4:
                            /* Usuwanie swojego profilu */
                            $errors = ''; // Zmienna przechowująca listę błędów które wystąpiły
                            $existsID = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM workers WHERE id='$id4' LIMIT 1"));
                            // Sprawdź, czy nie wystąpiły błędy
                            if ($existsID[0] == 0) echo ''.$errors .= "
                                        <br />- Dane o podanym ID nie istnieją";
                            /**
                             * Jeśli wystąpiły jakieś błędy, to je pokaż
                             */
                            if ($errors != '') {
                                $false = "Usuwanie profilu  nie powiodło się, z powodu: ".$errors." ";
                                setcookie('false', $false, time()+10);
                                echo "
                                        <meta http-equiv='refresh' content='0' />";
                            }else {
                                $false2 = "Wystąpił błąd w zapytaniu i nie udało się zarejestrować użytkownika";
                                mysql_query("DELETE FROM `workers` WHERE id='$id4';") or die (setcookie('false', $false2, time()+15));
                                    $_SESSION['message'] = "Twój profil został usunięty pomyślnie!";
                                    header ("Location: index.php");
                                }

        break;

        case 5:
                            /* Aktualizacja swoich danych osobowych */
                             // Zabezpiecz dane z formularza przed kodem HTML i ewentualnymi atakami SQL Injection
                            $id = $_SESSION['id'];
                            $time = date('H:i:s d-m-Y');
                            $_FILES['avatar']['name'];
                            $_SESSION['avatar'] = $_FILES['avatar']['name'];
                            $adres = mysql_real_escape_string(htmlspecialchars($_POST['adres']));
                            $avatar_path = mysql_real_escape_string($_FILES['avatar']['name']);
                            $avatar_name = mysql_real_escape_string($_FILES['avatar']['name']);
                            $imie = mysql_real_escape_string(htmlspecialchars($_POST['imie']));
                            $nazwisko = mysql_real_escape_string(htmlspecialchars($_POST['nazwisko']));
                            $dom = mysql_real_escape_string(htmlspecialchars($_POST['dom']));
                            $telefon = mysql_real_escape_string(htmlspecialchars($_POST['tel']));
                            //print_r( $_FILES ); die();
                            $errors = ''; // Zmienna przechowująca listę błędów które wystąpiły
                            // Sprawdź, czy nie wystąpiły błędy
                            // Zapisz dane do bazy
                                // if (preg_match("!image!",$_FILES['avatar']['type']))
                                // {
                                //copy image to images/ folder
                                // }
                                   if (!$_FILES['avatar']['name'] == "") {
                                    if ($_FILES['avatar']['type'] == "image/jpg" || $_FILES['avatar']['type'] == "image/gif"
                                    || $_FILES['avatar']['type'] == "image/png" || $_FILES['avatar']['type'] == "image/jpeg"){
                                        $max_rozmiar = 2000000; //2 MB
                                        $plik = round(($_FILES['avatar']['size']/1024)/1024, 2);
                                        $roz = $plik - 2;
                                        if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
                                            if ($_FILES['avatar']['size'] > $max_rozmiar) {
                                                $err = "Błąd! avatar jest za duży!
                                            <br />
                                            <b>Maksymalny rozmiar pliku to 2 MB</b>
                                            <br />Rozmiar Twojego pliku to: ".$plik." MB
                                            <br />Twój plik przekracza dozwolony rozmiar o: ".$roz." MB";
                                                setcookie('error', $err, time()+10);
                                            }
                                            else
                                            {
                                                $newname =  $_SESSION['userinfo'].round(microtime(true));
                                                $temp = explode(".", $_FILES['avatar']['name']);
                                                $newfilename = $newname.'.'.end($temp);
                                                $info = "Odebrano avatar.
                                            <br />Początkowa nazwa: ".$_FILES['avatar']['name']."
                                            <br />Nowa nazwa: ".$newfilename."
                                            <br />Rozmiar pliku: ".$plik."MB";
                                                setcookie('info', $info, time()+10);
                                                echo '
                                            <br />';
                                                if (isset($_FILES['avatar']['type'])) {
                                                    //$_SESSION['info'] = "Typ: ".$_FILES['avatar']['type']."";
                                                }
                                                move_uploaded_file($_FILES['avatar']['tmp_name'],
                                                $_SERVER['DOCUMENT_ROOT'].'/images/'.$newfilename);
                                            }
                                        } else {
                                            $false2 = "Błąd przy przesyłaniu danych!";
                                            setcookie('false', $false2, time()+15);
                                        }
                                    }
                                        else
                                        {
                                            setcookie('error',"Plik nie jest obrazem <br/> Wspierane formaty to: <b>jpg</b> , <b>jpeg</b> , <b>png</b> , <b>gif</b>",time()+15);
                                            echo "
                                                    <meta http-equiv='refresh' content='0' />";
                                        }
                                        mysql_query("UPDATE `workers` SET `imie` = '$imie', `nazwisko` = '$nazwisko', `adres` = '$adres', `nameavatar` = '$newfilename', `numerdomu` = '$dom', `numertelefonu` = '$telefon' WHERE `workers`.`id` = '$id';");
                                        $suc3 = "Twoje dane zostały zaktualizowane:
                                            <br/><b>W dniu: ".$time."</b>
                                            <br/><b>Imie:</b> ".$imie."
                                            <br/><b>Nazwisko:</b> ".$nazwisko."
                                            <br/><b>Adres:</b> ".$adres."
                                            <br/><b>Dom:</b> ".$dom."
                                            <br/><b>Telefon:</b> ".$telefon."
                                            <br/><b>Avatar:</b> ".$newfilename." ";
                                        setcookie('success', $suc3, time()+10);
                                        echo "
                                            <meta http-equiv='refresh' content='0' />";
                                    }else {
                                        mysql_query("UPDATE `workers` SET `imie` = '$imie', `nazwisko` = '$nazwisko', `adres` = '$adres', `numerdomu` = '$dom', `numertelefonu` = '$telefon' WHERE `workers`.`id` = '$id';");

                                              $suc5 = "Twoje dane zostały zaktualizowane:
                                            <br/><b>W dniu: ".$time."</b>
                                            <br/><b>Imie:</b> ".$imie."
                                            <br/><b>Nazwisko:</b> ".$nazwisko."
                                            <br/><b>Adres:</b> ".$adres."
                                            <br/><b>Dom:</b> ".$dom."
                                            <br/><b>Telefon:</b> ".$telefon." ";
                                            setcookie('success', $suc5, time()+15);
                                        echo "
                                            <meta http-equiv='refresh' content='0' />";
                                    }



        break;

        case 6:
                   /* Usuwanie profilu o podanym ID */
                     $IDD = $_POST['dete'];
                        $errors = ''; // Zmienna przechowująca listę błędów które wystąpiły
                        $existsID = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM workers WHERE id='$IDD' LIMIT 1"));
                        // Sprawdź, czy nie wystąpiły błędy
                        if ($existsID[0] == 0) echo ''.$errors .= "</br>- Dane o podanym ID nie istnieją: ".$IDD."";
                        /**
                         * Jeśli wystąpiły jakieś błędy, to je pokaż
                         */
                        if ($errors != '') {
                            $false = "Usuwanie profilu  nie powiodło się, z powodu: ".$errors." ";
                            setcookie('false', $false, time()+10);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }else {
                            $false2 = "Wystąpił błąd w zapytaniu i nie udało się usunąć użytkownika o id: ".$IDD."";
                            mysql_query("DELETE FROM `workers` WHERE id='$IDD' ;") or die (setcookie('false', $false2, time()+15));
                            $suc3 = "Użytkownik o id: <b>".$IDD."</b> , został usunięty wraz z wszystkimi danymi!";
                            setcookie('success', $suc3, time()+10);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
        break;

        case 7:
                      /* Zwolnienia */
                      $in=$_POST['imie'];
			            $od=$_POST['od'];
			            $do=$_POST['do'];
			            $ic=$_POST['ic'];
			            $ooc=$_POST['ooc'];
                        $error1 = "Wystąpił błąd w zapytaniu i nie udało się zapisać zwolnienia. Spróbuj ponownie.";

			            mysql_query("INSERT INTO free ( dane, od, do, ic, ooc) VALUES('$in','$od','$do','$ic','$ooc');")
			            or die (setcookie('success', $error1, time()+15));
                        $success1 = "Dodano nową nieobecność do listy";
                        setcookie('success', $success1, time()+15);
			            echo "<meta http-equiv='refresh' content='0'>";
        break;

        case 8:
                    /* Aktualizacja danych pracowniczych */
                             // Zabezpiecz dane z formularza przed kodem HTML i ewentualnymi atakami SQL Injection
                            $time = date('H:i:s d-m-Y');
                            $uptr = $_POST['Bupt'];
                            $ranga = mysql_real_escape_string(htmlspecialchars($_POST['ranga']));
                            $skin = mysql_real_escape_string(htmlspecialchars($_POST['skin']));
                            $GUID = mysql_real_escape_string(htmlspecialchars($_POST['UUID']));
                            //print_r( $_FILES ); die();
                            $errors = ''; // Zmienna przechowująca listę błędów które wystąpiły
                            // Sprawdź, czy nie wystąpiły błędy
                            // Zapisz dane do bazy
                            if($uptr != "") {
                                mysql_query("UPDATE `workers` SET `ranga` = '$ranga', `skin` = '$skin', `key_id` = '$GUID' WHERE `workers`.`id` = '$uptr';");
                                $suc2 = "Dane użytkownika
                                        <b>".$uptr."</b> zostały zaktualizowane!";
                                setcookie('success', $suc2, time()+10);
                                //print_r($_SESSION['success']); die();
                                echo "
                                        <meta http-equiv='refresh' content='0' />";
                                      }
        break;

        case 9:
                /* Logowanie */
                $login = htmlspecialchars(mysql_real_escape_string($_POST['usernick']));
                $pass = mysql_real_escape_string($_POST['userpassword']);
                $currentdate = date("Y-m-d");
                $currentyear = date("Y");
                // Sprawdź, czy wszystkie pola zostały uzupełnione
                if (!$login or empty($login)) {
                    $info1 = "Wypełnij pole z loginem!";
                    die (setcookie('info', $info1, time()+15));
                    echo "
                                <meta http-equiv='refresh' content='0' />";
                                header("Location: index.php");
                }

                if (!$pass or empty($pass)) {
                    $info2 = "Wypełnij pole z hasłem!";
                    die (setcookie('info', $info2, time()+15));
                    echo "
                                <meta http-equiv='refresh' content='0' />";
                                header("Location: index.php");
                }


                $pass = user::passSalter($pass);
                // Sprawdź, czy użytkownik o podanym loginie i haśle isnieje w bazie danych
                $userExists = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM workers WHERE nick = '$login' AND haslo = '$pass'"));
                $bans = mysql_fetch_array(mysql_query("SELECT ban,bandate,banreason FROM workers WHERE nick = '$login' AND haslo = '$pass'"));

	            if ($userExists[0] == 0) {
                    // Użytkownik nie istnieje w bazie
                    $warning1 = "Użytkownik o podanym loginie i haśle nie istnieje";
                    setcookie('warning', $warning1, time()+15);
                    echo "
                                <meta http-equiv='refresh' content='0' />";
                }
                //Easter Egg
                if($currentdate == "".$currentyear."-11-05") {
                  $easter = "Easter Egg 🐱‍👤";
                  setcookie('info',$easter,time()+25);
                }
                if($currentdate == "".$currentyear."-11-05" && $login =="HeadAdmin") {
                  $bday = "Wszystkiego Najlepszego🐱‍👤";
                  setcookie('info',$bday,time()+25);
                }
                // Użytkownik jest zbanowany
                if($bans['ban']!=null || $bans[1] >= $currentdate) {
                  //$banish = (strtotime($bans[2]) - strtotime($currentdate)) / (60*60*24);
                  if($bans[1]!="0000-00-00") {
                    $future = strtotime('21 July 2012'); //Future date.
                  $timefromdb = $bans[0];
                  $timeleft = $future-$timefromdb;
                  $banish = round((($timeleft/24)/60)/60);
                  //echo $daysleft;
                  $infoban = "Zostaleś zbanowany! <br /> Do dnia: <b> ".$bans[1]." </b> <br/> Powód bana: <b> ".$bans[2]."</b><br/>Kara wygaśnie za: <b> ".$banish."</b>";}
                  else {
                    $infoban = "Zostaleś zbanowany! <br /> Na okres nieokreślony - <b> PERM BAN </b> <br/> Powód bana: <b> ".$bans[2]."</b><br/>Kara wygaśnie za: <b> ".$banish."</b>";
                  }
                  setcookie('error', $infoban, time()+15);

                }
                else {
                  // Użytkownik po banie - czyszczenie bazy
                    $offbans =  mysql_fetch_array(mysql_query("UPDATE workers SET `ban` = '', `bandate` = '' WHERE nick = '$login' AND haslo = '$pass'"));
                    // Użytkownik istnieje i nie jest zbanowany
                    $user = user::getData($login, $pass); // Pobierz dane użytknika do tablicy i zapisz ją do zmiennej $user

                    // Przypisz pobrane dane do sesji
                    $name_log =$user['imie']." ".$user['nazwisko'];
                    setcookie('name',$name_log, time()+420000);
		            $id = mysql_real_escape_string(htmlspecialchars($user['id']));
		            $ranga = mysql_real_escape_string(htmlspecialchars($user['ranga']));
		            $_SESSION['id'] = $id;
		            $_SESSION['login'] = $login;
		            $_SESSION['userinfo'] = $name_log;
                    $_SESSION['pass'] = $pass;
		            $_SESSION['ranga'] = $ranga;
		            $_SESSION['protect'] = true;
                    $_SESSION['infoa'] = "Zostałeś zalogowany jako: <b>".$_SESSION['userinfo']."</b>";
		            $online = 1;
		            $error1 = "Wystąpił błąd w zapytaniu i nie udało się zapisać zwolnienia. <br/> Spróbuj ponownie.";

		            mysql_query("UPDATE `workers` SET `online` = '$online' WHERE `workers`.`id` = '$id'")
						            or die (setcookie('error', $error1, time()+15));
                echo "
                                <meta http-equiv='refresh' content='0; url=index.php?site=1?name=".$_SESSION['userinfo']."&page=1'/>";
		            //header("Location: welcomd.php");

                }


    break;

    case 10:
                  /* Restart hasła */
            $nick = htmlspecialchars(mysql_real_escape_string($_POST['resetusernick']));
            $newpass = mysql_real_escape_string($_POST['resetusernewpassword']);
            $newpassr = mysql_real_escape_string($_POST['resetusernewpasswordrepeated']);
            $GUID = htmlspecialchars(mysql_real_escape_string($_POST['resetuserguid']));
                // Sprawdź, czy użytkownik o podanym loginie i haśle isnieje w bazie danych
            $userExistsr = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM workers WHERE nick = '$nick' AND key_id = '$GUID'"));
            $errors = '';

            if ($newpass != $newpassr) $errors .="<br/> <b>-</b> Hasła się nie zgadzają";
            if($userExistsr[0] > 2) $errors .= "<br/> <b>-</b> Jest więcej niż jeden użytkownik o takich samych danych";
            if ($userExistsr[0] == 0) $errors .= "<br/> <b>-</b> Użytkownik o podanym loginie i UUID nie istnieje";

            if ($errors != "") {
                    $incrt = "Resetowanie hasła nie powiodło się z następujących powodów: ".$errors." ";
                    setcookie('warning', $incrt, time()+35);
                    echo "
                                <meta http-equiv='refresh' content='0' />";
                } else {
                   //$pass = "1230";
                   $newpass = user::passSalter($newpass);
                   $prots= " ".$newpass." ".$nick." ".$GUID." ";
                   mysql_query("UPDATE `workers` SET `haslo` = '$newpass' WHERE `nick` = '$nick' AND `key_id` = '$GUID';") or die('Nie zaktualizowano');
                   $err1 = "<b>Poważny problem z aktualizacją. Skontaktuj się z administracją serwera!!</b><br>
                            ".$prots." Te dane powinny być zaktualizowane!
                                 ";
                   $succreset = "Twoje hasło zostało zrestartowane. <br/> Życzymy miłej atmosfery podczas korzystania z naszego forum <b>:)</b>";
                        setcookie('success', $succreset, time()+10);
                        //print_r($_SESSION['success']); die();
                        echo "

                                <meta http-equiv='refresh' content='0' />";
                                }
            break;
            case 11:
                     /* Usuwanie zwolnień o danym ID */
                     $FID = mysql_real_escape_string(htmlspecialchars($_POST['DeleteFree']));
                        $errors = ''; // Zmienna przechowująca listę błędów które wystąpiły
                         $msID = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM free WHERE id='$FID' LIMIT 1"));
                        if ($msID[0] == 0)
                           $errors .= "</br>- Nie ma takiego zwolnienia!";
                        if ($msID[0] > 1)
                               $errors .= "</br>- Jest więcej niż jedno unikalne wyszukanie (ID)!";
                        // Sprawdź, czy nie wystąpiły błędy

                        if ($errors != '') {
                            $false = "Usuwanie zwolnieia  nie powiodło się, z powodu: ".$errors." ";
                            setcookie('false', $false, time()+10);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }else {
                            $false2 = "Wystąpił błąd w zapytaniu i nie udało się usunąć zwolnienia o id: ".$FID."";
                            mysql_query("DELETE FROM `free` WHERE id='$FID' ;") or die (setcookie('false', $false2, time()+15));
                            $suc3 = "Zwolnienie o id: <b>".$FID."</b>, zostało pomyślnie usunięte! ";
                            setcookie('success', $suc3, time()+10);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
            break;
            case 12:
                     /* Banowanie użytkownika do strony za pomocą ID na jego konto */
                     $BID = mysql_real_escape_string(htmlspecialchars($_POST['banid']));
                     $ban = "YES";
                        $errors = ''; // Zmienna przechowująca listę błędów które wystąpiły
                         $bnID = mysql_fetch_array(mysql_query("UPDATE workers SET ban = '$ban' WHERE id = '$BID'"));
                        /*if ($bnID[0] == 0)
                           $errors .= "</br>- Nie ma takiego zwolnienia!";
                        if ($msID[0] > 1)
                               $errors .= "</br>- Jest więcej niż jedno unikalne wyszukanie (ID)!";
                        // Sprawdź, czy nie wystąpiły błędy

                        if ($errors != '') {
                            $false = "Usuwanie zwolnieia  nie powiodło się, z powodu: ".$errors." ";
                            setcookie('false', $false, time()+10);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }else {
                            $false2 = "Wystąpił błąd w zapytaniu i nie udało się usunąć zwolnienia o id: ".$FID."";
                            mysql_query("DELETE FROM `free` WHERE id='$FID' ;") or die (setcookie('false', $false2, time()+15));
                            $suc3 = "Zwolnienie o id: <b>".$FID."</b>, zostało pomyślnie usunięte! ";
                            setcookie('success', $suc3, time()+10);
                            echo "<meta http-equiv='refresh' content='0'>";
                          }*/
                          if($BID != "") {
                            $bns = "Zablokowano użytkownika o id: <b> ".$BID." </b>";
                            setcookie('info', $bns,time()+5);
                              echo "<meta http-equiv='refresh' content='0'>";
                            }

            break;
            case 13:
            /* Ściąganie bana z użytkownika o podanym ID */
              $CBID = mysql_real_escape_string(htmlspecialchars($_POST['cban']));
              $cban = "";
              $checkban = mysql_fetch_array(mysql_query("SELECT  ban, bandate FROM workers WHERE id = '$CBID'"));

              $errors = ''; // Zmienna przechowująca listę błędów które wystąpiły
              if($checkban[0] == null || $checkban[1] == "0000-00-00") $errors .= '</br> - Dany użytkownik o ID: <b> '.$CBID.' </b> nie posiada żadnych aktywnych kar do ściagnięcia.';


                 if ($errors != '') {
                 $err1 = "Nastąpił problem: ".$errors." ";
                     setcookie('error', $err1, time()+15);
                                  echo "
                             <meta http-equiv='refresh' content='0' />";
                 }
                 if($CBID != "") {
                  mysql_fetch_array(mysql_query("UPDATE workers SET ban = '$cban' , bandate = '' WHERE id = '$CBID'"));
                  $cbns = "Ściągnięto blokadę użytkownikowi o id: <b> ".$CBID." </b>";
                  setcookie('info', $cbns,time()+5);
                    echo "<meta http-equiv='refresh' content='0'>";
                  }
            break;
            case 14:
                /* Nakładanie kar czasowych na użytkownika o podanym ID */
              $BANIDs = mysql_real_escape_string(htmlspecialchars($_POST['bansid']));
              $BANIDs1 = mysql_real_escape_string(htmlspecialchars($_POST['banids1']));
              $BCalendars = date('Y-m-d', strtotime($_POST['bcalendar']));
              $Bsdays = mysql_real_escape_string(htmlspecialchars($_POST['bdays']));
              $Boption = mysql_real_escape_string(htmlspecialchars($_POST['optionsban']));
              $Bwhy = mysql_real_escape_string(htmlspecialchars($_POST['bdr']));
              $Bwhy1 = mysql_real_escape_string(htmlspecialchars($_POST['bcr']));
              $Datecurrent = date("Y-m-d");


              if($BANIDs1 != "") {
                mysql_fetch_array(mysql_query("UPDATE workers SET  bandate = '$BCalendars', banreason = '$Bwhy1', banamount = banamount + 1  WHERE id = '$BANIDs1'"));//or die(setcookie('error',"Wystąpil problem z bazą danych: " + mysql_error()));
                setcookie('success',"Zbanowano gracza o id: <b> ".$BANIDs1." </b> do ".$BCalendars." <br/> Powód: <b>".$Bwhy1."</b>",time()+15);
                echo "<meta http-equiv='refresh' content='0'>";
              }

              if($BANIDs != null && $Bsdays != null) {
                $Bto = date("Y-m-d" , strtotime(''.$Datecurrent.' + '.$Bsdays.' '.$Boption.''));
                mysql_fetch_array(mysql_query("UPDATE workers SET  bandate = '$Bto', banreason = '$Bwhy',  banamount = banamount + 1 WHERE id = '$BANIDs'"));//or die(setcookie('error',"Wystąpil problem z bazą danych: " + mysql_error()));
                if($Boption == "days") {
                  setcookie('success',"Zbanowano gracza o id: <b> ".$BANIDs." </b> na okres <b>".$Bsdays."</b> dni. <br/> Ban trwa do: <b> ".$Bto."</b><br/> Powód: <b>".$Bwhy."</b>",time()+15);
                }
                if($Boption == "week"){
                  setcookie('success',"Zbanowano gracza o id: <b> ".$BANIDs." </b> na okres <b>".$Bsdays."</b> tygodni. <br/> Ban trwa do: <b> ".$Bto."</b><br/> Powód: <b>".$Bwhy."</b>",time()+15);
                }
                if($Boption == "month"){
                  setcookie('success',"Zbanowano gracza o id: <b> ".$BANIDs." </b> na okres <b>".$Bsdays."</b> miesięcy. <br/> Ban trwa do: <b> ".$Bto."</b><br/> Powód: <b>".$Bwhy."</b>",time()+15);
                }
                if($Boption == "year"){
                  setcookie('success',"Zbanowano gracza o id: <b> ".$BANIDs." </b> na okres <b>".$Bsdays."</b> lat. <br/> Ban trwa do: <b> ".$Bto."</b><br/> Powód: <b>".$Bwhy."</b>",time()+15);
                }
                  echo "<meta http-equiv='refresh' content='0'>";
              }

              break;

              case 15:
              $datefrom = mysql_real_escape_string(htmlspecialchars($_POST['datefrom']));
              $dateto = mysql_real_escape_string(htmlspecialchars($_POST['dateto']));
              $reasonic = mysql_real_escape_string(htmlspecialchars($_POST['reasonic']));
              $reasonooc = mysql_real_escape_string(htmlspecialchars($_POST['reasonooc']));
              $freeid = mysql_real_escape_string(htmlspecialchars($_POST['id']));
              $Datecurrent = date("Y-m-d H:m:s");


              if($freeid != null) {
                mysql_fetch_array(mysql_query("UPDATE free SET  od = '$datefrom', do = '$dateto',  ic = '$reasonic', ooc = '$reasonooc', aktualizacja = '$Datecurrent' WHERE id = '$freeid'"));
                setcookie('success',"Zaktualizowano dane o id: <b>".$freeid."</b>",time()+15);
                header('Location: index.php?site=3?name="'.$_SESSION['userinfo'].'"');
              }else{
                setcookie('success',"Błąd, nie ma takiego id: <b>".$freeid."</b>",time()+15);
                echo "<meta http-equiv='refresh' content='0'>";
              }


              break;

              case 16:

              /* Logowanie - QR Code */
              $qrlogin = htmlspecialchars(mysql_real_escape_string($_POST['qrdatascan']));
              $currentdate = date("Y-m-d");
              // Sprawdź, czy wszystkie pola zostały uzupełnione

              $userExists = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM workers WHERE key_id = '$qrlogin'"));
              $bans = mysql_fetch_array(mysql_query("SELECT ban,bandate,banreason FROM workers WHERE key_id = '$qrlogin'"));

            if ($userExists[0] == 0) {
                  // Użytkownik nie istnieje w bazie
                  $warning1 = "Użytkownik o podanym loginie i haśle nie istnieje";
                  setcookie('warning', $warning1, time()+15);
                  echo "
                              <meta http-equiv='refresh' content='0' />";
              }
              //Easter Egg
              if($currentdate == "2018-09-22") {
                $easter = "Easter Egg 🐱‍👤";
                setcookie('info',$easter,time()+25);
              }
              // Użytkownik jest zbanowany
              if($bans['ban']!=null || $bans[1] >= $currentdate) {
                if($bans[1]!="0000-00-00") {
                $infoban = "Zostaleś zbanowany! <br /> Do dnia: <b> ".$bans[1]." </b> <br/> Powód bana: <b> ".$bans[2]."</b>";}
                else {
                  $infoban = "Zostaleś zbanowany! <br /> Na okres nieokreślony - <b> PERM BAN </b> <br/> Powód bana: <b> ".$bans[2]."</b>";
                }
                setcookie('error', $infoban, time()+15);

              }
              else {
                // Użytkownik po banie - czyszczenie bazy
                  $offbans =  mysql_fetch_array(mysql_query("UPDATE workers SET `ban` = '', `bandate` = '' WHERE nick = '$login' AND haslo = '$pass'"));
                  // Użytkownik istnieje i nie jest zbanowany
                  $user = user::getData($login, $pass); // Pobierz dane użytknika do tablicy i zapisz ją do zmiennej $user

                  // Przypisz pobrane dane do sesji
                  $name_log =$user['imie']." ".$user['nazwisko'];
                  setcookie('name',$name_log, time()+420000);
              $id = mysql_real_escape_string(htmlspecialchars($user['id']));
              $ranga = mysql_real_escape_string(htmlspecialchars($user['ranga']));
              $_SESSION['id'] = $id;
              $_SESSION['login'] = $login;
              $_SESSION['userinfo'] = $name_log;
                  $_SESSION['pass'] = $pass;
              $_SESSION['ranga'] = $ranga;
              $_SESSION['protect'] = true;
                  $_SESSION['infoa'] = "Zostałeś zalogowany jako: <b>".$_SESSION['userinfo']."</b>";
              $online = 1;
              $error1 = "Wystąpił błąd w zapytaniu i nie udało się zapisać zwolnienia. <br/> Spróbuj ponownie.";

              mysql_query("UPDATE `workers` SET `online` = '$online' WHERE `workers`.`id` = '$id'")
                      or die (setcookie('error', $error1, time()+15));
              echo "
                              <meta http-equiv='refresh' content='0; url=index.php?site=1?name=".$_SESSION['userinfo']."?page=1'/>";
              //header("Location: welcomd.php");

              }


            break;

            case 17:
            /* Avatar change with previous upload avatars */
            $changeavatar = mysql_real_escape_string(htmlspecialchars($_POST['avatarchange']));
            $errors17 = "Nie zmieniono Twojego avatara <br/> Kod błędu: <b>101</b>";
            $id = $_SESSION['id'];

            if($changeavatar == null || $changeavatar == '') {
                setcookie('error', $errors17, time()+15);
                echo "<meta http-equiv='refresh' content='0'>";
            }else{
            mysql_query("UPDATE `workers` SET `nameavatar` = '$changeavatar' WHERE `workers`.`id` = '$id'")
                    or die (setcookie('error', $errors17, time()+15));
                    setcookie('success',"Zmnieniono Twój avatar!",time()+15);
                    echo "<meta http-equiv='refresh' content='0'>";
                  }

            break;
    }
}
?>
