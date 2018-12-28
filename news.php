<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
 $q = $_GET['q'];
$result = mysql_query("SELECT * FROM `news` ORDER BY id DESC WHERE `do` = '$q'");
while($lem = mysqli_fetch_array($result)) {
echo '
  <div class="col-xs-sm-12 col-sm-6 col-md-6">
                    </br>
                        <div class="card text-center">
                          <div class="card-header infos">
                            <i class="material-icons">'.$lem['ikona'].'</i>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">'.$lem['temat'].'</h5>
                            <p class="card-text">'.$lem['tresc'].'</p>
                            <p class="card-text"><b>Do: '.$lem['do'].' ID: '.$lem['id'].'</b></p>
                          </div>
                          <div class="card-footer text-muted infos">
                            <p class="catr">
                                <img class="who" src="images/'.$lem['avatar'].'" title="Who add" />
                                &nbsp &nbsp &nbsp'.$lem['czas'].'                         
                            </p> 
                          </div>
                        </div>
                    </div>';
}
?>
</body>
</html>