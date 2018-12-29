<?php
if (!$_FILES['avatar']['name'] == "") {
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
                        $info = "Odebrano avatar.
                    <br />Początkowa nazwa: ".$_FILES['avatar']['name']."
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
                    $false2 = "Błąd przy przesyłaniu danych!";
                    setcookie('false', $false2, time()+15);
                    }
                  }
             
                 
?>