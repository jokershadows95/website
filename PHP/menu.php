<?php

$menu = (int)$_GET['site'];

switch ($menu)
{
   case 1:
      include('welcomd.php');
   break;

   case 2:
     include('denp.php');
   break;

   case 3:
       include('freed.php');
   break;

   case 4:
        include('registerd.php');
   break;

   case 5:
        include('profiled.php');
    break;

    case 6:
        include('supervission.php');
    break;

    case 7:
        include('logoutd.php');
    break;

    case 8:
        include('timeline.html');
    break;

    case 10:
        include('404.html');
    break;

    case 9:
        include('freetimeedit.php');
    break;

    default:
        include('denzsp.php');
    break;
}

?>
