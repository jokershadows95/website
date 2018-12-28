<?php
/****************************************************************************
*                                log.php
*                         -------------------------
*                      rozpoczety    : 15.03.2018 r.
*                      wersja        : $Revision: 1.0 $
*                      zmiana        : $Date: 2018/05/30 21:33 $
*
****************************************************************************/
 
  $log_dir = '/logs';
     if($_SESSION['userinfo'] != null || $_COOKIE['name'] !=null) {
  // proba otwarcie pliku access.log lub - w przypadku gdy zrodlowy nie istnieje - utworzenia go 
  $file = @fopen('logs/log.log', 'a');
  @flock($file, 2); // blokowanie pliku - wylacznosc na zapis i odczyt
 
  $string = '[%time%] ID: %user% HOST: %host% IP: %remote_ip% ( %forwarded_for% ), - %url% -> Success logout'; // z konfiguracji odczytanie formatu zapisu logu
 
  $string = str_replace('%remote_ip%', getenv('REMOTE_ADDR'), $string);
  $string = str_replace('%host%', gethostbyaddr(getenv('REMOTE_ADDR')), $string);
  $string = str_replace('%forwarded_for%', getenv('HTTP_X_FORWARDED_FOR'), $string);
  $string = str_replace('%time%', date('d-m-Y H:i:s'), $string);
  $string = str_replace('%url%', getenv('REQUEST_URI'), $string);
  $string = str_replace('%user%', (isset($_COOKIE) ? $_COOKIE['name'] : 0), $string); // te linie możesz usunąć - obowiązuje jedynie w projekcie Coyote
  $string = str_replace('%user_agent%', getenv('HTTP_USER_AGENT'), $string);
 
/* poczwszy od wersji 4.0.1 funkcja str_replace() moze przybierac wartosci ktore sa tablica */
 
  @fwrite($file, $string . "\r\n"); // zapisanie linii
  @flock($file, 3); // odblokowanie pliku
  @fclose($file);
 
//
  }
  else 
  {
  $file = @fopen('logs/log.log', 'a');
  @flock($file, 2); // blokowanie pliku - wylacznosc na zapis i odczyt
 
  $string = '[%time%] ID: %user% HOST: %host% IP: %remote_ip% ( %forwarded_for% ), - %url% -> Zła strona'; // z konfiguracji odczytanie formatu zapisu logu
 
  $string = str_replace('%remote_ip%', getenv('REMOTE_ADDR'), $string);
  $string = str_replace('%host%', gethostbyaddr(getenv('REMOTE_ADDR')), $string);
  $string = str_replace('%forwarded_for%', getenv('HTTP_X_FORWARDED_FOR'), $string);
  $string = str_replace('%time%', date('d-m-Y H:i:s'), $string);
  $string = str_replace('%url%', getenv('REQUEST_URI'), $string);
  $string = str_replace('%user%', "Brak danych", $string); // te linie możesz usunąć - obowiązuje jedynie w projekcie Coyote
  $string = str_replace('%user_agent%', getenv('HTTP_USER_AGENT'), $string);
 
/* poczwszy od wersji 4.0.1 funkcja str_replace() moze przybierac wartosci ktore sa tablica */
 
  @fwrite($file, $string . "\r\n"); // zapisanie linii
  @flock($file, 3); // odblokowanie pliku
  @fclose($file);

}
?>