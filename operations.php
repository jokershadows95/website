<?php
session_start();
    if ($_POST['delete'] == 2000 ) {
        $errors = ''; // Zmienna przechowuj�ca list� b��d�w kt�re wyst�pi�y
        $existsID = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM workers WHERE id='$id4' LIMIT 1"));
        // Sprawd�, czy nie wyst�pi�y b��dy
        if ($existsID[0] == 0) echo ''.$errors .= "
                    <br />- Dane o podanym ID nie istniej�";
        /**
         * Je�li wyst�pi�y jakie� b��dy, to je poka�
         */
        if ($errors != '') {
            $false = "Usuwanie profilu  nie powiod�o si�, z powodu: ".$errors." ";
            setcookie('false', $false, time()+10);
            echo "
                    <meta http-equiv='refresh' content='0' />";
        }else {
            $false2 = "Wyst�pi� b��d w zapytaniu i nie uda�o si� zarejestrowa� u�ytkownika";
            mysql_query("DELETE FROM `workers` WHERE id='$id4';") or die (setcookie('false', $false2, time()+15));
            if ($profile['ranga'] != "Administracja" || $profile['ranga'] != "Kierownik" || $profile['ranga'] != "Menager" || $profile['ranga'] != "M�odszy menager") {
                $_SESSION['message'] = "Tw�j profil zosta� usuni�ty pomy�lnie!";
                header ("Location: denzsp.php");
            }
            else {
                $suc1 = "Dane u�ytkownika o id:".$id4.", zosta�y pomy�lnie usuni�te!";
                setcookie('success', $suc1, time()+10);
                echo "
                    <meta http-equiv='refresh' content='0' />";
            }
        }
    }

                                         if ($_POST['update'] == 1000 || $_POST['updates'] == 1000) {
    // Zabezpiecz dane z formularza przed kodem HTML i ewentualnymi atakami SQL Injection
    $time = date('H:i:s d-m-Y');
    $uptr = $_POST['Bupt'];
    $_FILES['avatar']['name'];
    $_SESSION['avatar'] = $_FILES['avatar']['name'];
    $adres = mysql_real_escape_string(htmlspecialchars($_POST['adres']));
    $avatar_path = mysql_real_escape_string($_FILES['avatar']['name']);
    $avatar_name = mysql_real_escape_string($_FILES['avatar']['name']);
    $imie = mysql_real_escape_string(htmlspecialchars($_POST['imie']));
    $nazwisko = mysql_real_escape_string(htmlspecialchars($_POST['nazwisko']));
    $ranga = mysql_real_escape_string(htmlspecialchars($_POST['ranga']));
    $skin = mysql_real_escape_string(htmlspecialchars($_POST['skin']));
    $dom = mysql_real_escape_string(htmlspecialchars($_POST['dom']));
    $telefon = mysql_real_escape_string(htmlspecialchars($_POST['tel']));
    //print_r( $_FILES ); die();
    $errors = ''; // Zmienna przechowuj�ca list� b��d�w kt�re wyst�pi�y
    // Sprawd�, czy nie wyst�pi�y b��dy
    // Zapisz dane do bazy
    if ($profile['ranga']=="Administracja" || $profile['ranga']=="Admins" || $profile['ranga']=="Menager" || $profile['ranga']=="Kierownik" || $profile['ranga']=="M�odszy kierownik") {
    mysql_query("UPDATE `workers` SET `ranga` = '$ranga', `skin` = '$skin' WHERE `workers`.`id` = '$uptr';");
    $suc2 = "Dane u�ytkownika
                    <b>".$uptr."</b>zosta�y zaktualizowane!";
    setcookie('success', $suc2, time()+10);
    //print_r($_SESSION['success']); die();
    echo "
                    <meta http-equiv='refresh' content='0' />";
    } else {
    // if (preg_match("!image!",$_FILES['avatar']['type']))
    // {
    //copy image to images/ folder
    // }
    if (!$_FILES['avatar']['name'] == "") {
    $max_rozmiar = 2000000; //2 MB
    $plik = round(($_FILES['avatar']['size']/1024)/1024, 2);
    $roz = $plik - 2;
    if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
    if ($_FILES['avatar']['size'] > $max_rozmiar) {
    $err = "B��d! avatar jest za du�y!
                    <br />
                    <b>Maksymalny rozmiar pliku to 2 MB</b>
                    <br />Rozmiar Twojego pliku to: ".$plik." MB
                    <br />Tw�j plik przekracza dozwolony rozmiar o: ".$roz." MB";
    setcookie('error', $err, time()+10);
    }
    else
    {
    $info = "Odebrano avatar.
                    <br />Pocz�tkowa nazwa: ".$_FILES['avatar']['name']."
                    <br />Rozmiar pliku: ".$plik."MB";
    setcookie('info', $info, time()+10);
    echo '
                    <br />';
    if (isset($_FILES['avatar']['type'])) {
    //$_SESSION['info'] = "Typ: ".$_FILES['avatar']['type']."";
    }
    move_uploaded_file($_FILES['avatar']['tmp_name'],
    $_SERVER['DOCUMENT_ROOT'].'/images/'.$_FILES['avatar']['name']);
    }
    } else {
    $false2 = "B��d przy przesy�aniu danych!";
    setcookie('false', $false2, time()+15);
    }
    mysql_query("UPDATE `workers` SET `imie` = '$imie', `nazwisko` = '$nazwisko', `adres` = '$adres', `nameavatar` = '$avatar_name', `numerdomu` = '$dom', `numertelefonu` = '$telefon' WHERE `workers`.`id` = '$id';");
    $suc3 = "Twoje dane zosta�y zaktualizowane:
                    <b>".$time."</b>";
    setcookie('success', $suc3, time()+10);
    echo "
                    <meta http-equiv='refresh' content='0' />";
    }else {
    mysql_query("UPDATE `workers` SET `imie` = '$imie', `nazwisko` = '$nazwisko', `adres` = '$adres', `numerdomu` = '$dom', `numertelefonu` = '$telefon' WHERE `workers`.`id` = '$id';");
    if ($profile['ranga']=="Administracja" || $profile['ranga']=="Admins" || $profile['ranga']=="Menager" || $profile['ranga']=="Kierownik" || $profile['ranga']=="M�odszy kierownik") {
    $suc4 = "Dane
                    <b>".$_SESSION['userinfo']."</b>zosta�y zaktualizowane!";
    setcookie('success', $suc4, time()+15);
    }
    else
    {
    $suc5 = "Twoje dane zosta�y zaktualizowane:
                    <b>".$time."</b>";
    setcookie('success', $suc5, time()+15);
    }
    echo "
                    <meta http-equiv='refresh' content='0' />";
    }
    }
                                         }
                                         if ($_POST['deletes'] == 3000 ) {
                                             $IDD = $_POST['dete'];
                                             $errors = ''; // Zmienna przechowuj�ca list� b��d�w kt�re wyst�pi�y
                                             $existsID = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM workers WHERE id='$IDD' LIMIT 1"));
                                             // Sprawd�, czy nie wyst�pi�y b��dy
                                             if ($existsID[0] == 0) echo ''.$errors .= "</br>- Dane o podanym ID nie istniej�: ".$IDD."";
                                             /**
                                              * Je�li wyst�pi�y jakie� b��dy, to je poka�
                                              */
                                             if ($errors != '') {
                                                 $false = "Usuwanie profilu  nie powiod�o si�, z powodu: ".$errors." ";
                                                 setcookie('false', $false, time()+10);
                                                 echo "<meta http-equiv='refresh' content='0'>";
                                             }else {
                                                 $false2 = "Wyst�pi� b��d w zapytaniu i nie uda�o si� usun�� u�ytkownika o id: ".$IDD."";
                                                 mysql_query("DELETE FROM `workers` WHERE id='$IDD' ;") or die (setcookie('false', $false2, time()+15));
                                                 $suc1 = "Dane u�ytkownika o id:".$IDD.", zosta�y pomy�lnie usuni�te!";
                                                 setcookie('success', $suc1, time()+10);
                                                 echo "<meta http-equiv='refresh' content='0'>";
                                             }
                                         }
?>