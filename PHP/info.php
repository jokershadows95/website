<?php
/*          Information file */
session_start();

?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8" />
    <title>Denz's</title>
    <meta name="viewport" content="width=device-width, initial-scale=0.5" />
    <meta name="theme-color" content="#05426d" />
    <meta name="keywords" content="Start Website fot Employees" />
    <meta name="description" content="Start Website fot Employees" />
    <meta name="author" content="Denz's" />
    <meta name="robots" content="all" />
    <link href="info.css" rel="stylesheet" />
    <link rel="apple-touch-icon" sizes="180x180" href="pics/denz/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="pics/denz/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="pics/denz/favicon-16x16.png" />
    <link rel="manifest" href="manifest.json" />
    <link rel="mask-icon" href="pics/denz/safari-pinned-tab.svg" color="#5bbad5" />
    <meta name="theme-color" content="#ffffff" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>
<body>
    <?
    if (!$_COOKIE['error'] == null) {?>
        <div class="alert alert-warning" role="alert">
             <span onclick="this.parentElement.style.display='none'"
                class="button-off">
                &times;
            </span>
            <h4 class="alert-heading">Warning!</h4>
            <p><?echo $_COOKIE['error']?></p>
            <hr>
            <p class="mb-0">Automatyczny raport wygenerowany przez EDI</p>
        </div>
    <? }
    elseif (!$_COOKIE['success'] == null AND !$_COOKIE['info'] == null) {
        echo '
        <div class="contsai">
        <div class="alert alert-success" role="alert">'; ?>
    <span onclick="this.parentElement.style.display='none'"
        class="button-off">
        &times;
    </span>
    <h4 class="alert-heading">Success!</h4><?php echo '
        <p>'.$_COOKIE['success'].'</p>
        <hr>
        <p class="mb-0">Automatyczny raport wygenerowany przez EDI</p>
        </div>
        <div class="alert alert-primary" role="alert">'; ?>
    <span onclick="this.parentElement.style.display='none'"
        class="button-off">
        &times;
    </span>
           <h4 class="alert-heading">Information!</h4>
            <p><? echo $_COOKIE['info']?></p>
            <hr>
            <p class="mb-0">Automatyczny raport wygenerowany przez EDI</p>
        </div>; <?
    }
    elseif (!$_COOKIE['info'] == null) { ?>
        <div class="alert alert-primary" role="alert">
             <span onclick="this.parentElement.style.display='none'"
                class="button-off">
                &times;
            </span>
            <h4 class="alert-heading">Information!</h4>
            <p><? echo $_COOKIE['info']?></p>
            <hr>
            <p class="mb-0">Automatyczny raport wygenerowany przez EDI</p>
        </div>
    <? }
    elseif (!$_COOKIE['success'] == null) { ?>
        <div class="alert alert-success" role="alert">
            <span onclick="this.parentElement.style.display='none'"
                class="button-off">
                &times;
            </span>
            <h4 class="alert-heading">Success!</h4>
            <p><?echo $_COOKIE['success']?></p>
            <hr>
            <p class="mb-0">Automatyczny raport wygenerowany przez EDI</p>
        </div>
    <? }
    elseif (!$_COOKIE['false'] == null) {?>
        <div class="alert alert-danger" role="alert">
           <span onclick="this.parentElement.style.display='none'"
                class="button-off">
                &times;
            </span>
            <h4 class="alert-heading">Error!</h4>
            <p><?echo $_COOKIE['false']?></p>
            <hr>
            <p class="mb-0">Automatyczny raport wygenerowany przez EDI</p>
        </div>
    <? }
    ?>

<script>
// JavaScript source code
function logouttime() {
    now = new Date().getTime();
    logout = <? $time ?>;

    // wyliczanie roznicy
    sekund = Math.abs((now - logout) / 1000);
    minut = Math.floor(sekund / 60);
    godzin = Math.floor(minut / 60);
    dni = Math.floor(godzin / 24);
    lat = Math.floor(dni / 365);

    // wyliczanie calego okresu
    sekund = Math.floor(sekund - minut * 60);
    minut = Math.floor(minut - godzin * 60);
    godzin = Math.floor(godzin - dni * 24);
    dni = Math.floor(dni - lat * 365);

    roznica = ((minut < 10) ? "0" : "") + minut +
        " <b>minut</b> " + ((sekund < 10) ? "0" : "") + sekund;
    document.getElementById("ctimer").innerHTML =
        roznica;

 setTimeout("logouttime()", +1000);
}
</script>
</body>
</html>
