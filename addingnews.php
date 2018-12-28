<? session_start();
$id = $_SESSION['id'];
$profile = user::getDataById ($id);
$result = mysql_query('SELECT MAX(id) FROM `news`');
$row = mysql_fetch_row($result);
$idrs = $row[0];
$idr = $idrs+1;
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="addingnews.css" rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  </head>
  <body>
    <!--Modal-->
    <div class="modal" id="Adds" ng-app="newINFO" ng-controller="cntrINFO">
        <form id="news" name="news" method="post" action="" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="addh">
                        <h5 class="modal-title" id="AddTitle">Dodawanie nowego postu</h5>
                        <button type="button" id="closeAdding" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="addb">
                    <p class="alert alert-info" id="infosend" ng-show="towhos== '' || towhos == null || aboutnew == '' || aboutnew == null || iconview == '' || iconview == null || titlenew == '' || titlenew == null">Możliwość wysłania formularza jest wyłączona z powodu braku uzupełnionych wymaganych pól</p>
                    <p class="alert alert-success" ng-show="!isDisabled()">Możesz wysłać nową wiadomość na serwer</p>

                        <table>
                            <p><tr><td><strong>Ikona: </strong></td><td>
                              <span ng-style="warninginfo" ng-show="iconview== '' && !focusi || counti > 0 && iconview== null">{{ikonylabel}}</span>
                                <input list="ikony" name="ikons" id="ikons" style="width:100%" ng-model="iconview" ng-init="counti = 0" ng-focus="focusi=true; counti = 0" ng-blur="focusi=false; counti = counti + 1">
                                  <datalist id="ikony">
                                      <option value="warning">
                                      <option value="new_releases">
                                      <option value="message">
                                      <option value="location_on">
                                  </datalist></td></tr></p>

                                <p><tr><td><strong>Temat: </strong></td><td>
                                  <span ng-style="warninginfo" ng-show="titlenew== '' && !focust || countt > 0 && titlenew== null">{{tematlabel}}</span>
                                    <input name="temat" type="text" id="temat" size="50" style="width:100%" ng-model="titlenew" ng-init="countt = 0" ng-focus="focust=true; countt = 0" ng-blur="focust=false; countt = countt + 1"/></td></tr></p>
                                <p><tr><td><strong>Treść: </strong></td><td>
                                <span ng-style="warninginfo" ng-show="aboutnew== '' && !focusa || counta > 0 && aboutnew== null">{{aboutlabel}}</span>
                                <textarea name="tresc" cols="51.9" rows="3" id="tresc" style="width:100%" ng-model="aboutnew" ng-init="counta = 0" ng-focus="focusa=true; counta = 0" ng-blur="focusa=false; counta = counta + 1"></textarea></td></tr></p>
                                <p><tr><td><strong>Autor: </strong></td><td>
                                  <span ng-style="warninginfo" ng-show="whonew== '' && !focusw || countw > 0 && whonew== null">{{autorlabel}}</span>
                      <input name="autor" type="text" id="autor" style="width:100%" size="50" value="'.$profile['imie']." ".$profile['nazwisko'].'" ng-model="whonew" ng-init="countw = 0" ng-focus="focusw=true; countw = 0" ng-blur="focusw=false; countw = count + 1"/></td></tr></p>
                                        <input name="avatar" type="hidden" id="avatar" style="width:100%" size="50" value="<? echo ''.$profile['nameavatar'].''?>" ng-model="avatarnew"/></td></tr></p>
                                        <input name="idz" type="hidden" id="idz" style="width:100%" size="50" value="<? echo ''.$idr.''?>" /></td></tr></p>
                                <p><tr><td><strong>Do kogo: </strong></td><td>
                      <span ng-style="warninginfo" ng-show="towhos== '' && !focusws || countws > 0 && towhos== null">{{towho}}</span>
                      <input list="stanowiska" id="do" name="do" style="width:100%" ng-model="towhos" ng-focus="focusws=true; countws = 0" ng-blur="focusws=false; countws = countws + 1" ng-init="countws = 0">
                        <datalist id="stanowiska">
                                                <option value="All">
                          <option value="Administracja">
                          <option value="Admins">
                          <option value="Okres próbny">
                          <option value="Kelner">
                          <option value="Barman">
                          <option value="Młodszy kierownik">
                          <option value="Kierownik">
                          <option value="Menager">
                        </datalist></td></tr></p>
                        </table>

                        <div class="previewadding">
                           <div class="card text-center">
                              <div class="card-header infos">
                                <i class="material-icons">{{iconview}}</i>
                              </div>
                              <div class="card-body previnfo">
                                <h5 class="card-title"> {{titlenew}} <span class="badge badge-danger">PREVIEW</span></h5>
                                <p class="card-text">{{aboutnew}}</p>
                              </div>
                              <div class="card-footer text-muted infos">
                                <p class="catr">
                                    <img class="who" src="{{avatarnew}}" title="{{whonew}}" />
                                    &nbsp &nbsp&nbsp&nbsp&nbsp<? echo ''.$date = date("d-m-Y H:m:s").''?>
                                </p>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="addf">
                        <input type="hidden" value="1" name="action">
                        <button ng-disabled="isDisabled()" ng-modal="btnsend" id="Adding" class="uncover"><i ng-if="isDisabled()==true" class="material-icons senddisabled" data-toggle="tooltip" data-placement="top" title="Disabled button">send</i><i ng-if="isDisabled()!=true" class="material-icons sendactive" data-toggle="tooltip" data-placement="top" title="Active button">send</i></button>
                      </form>
                    </div>
                </div>
    </div>
    </div>
    <script>
    var app = angular.module('newINFO', []);
          app.controller('cntrINFO', function($scope) {
          $scope.warninginfo = {
            "color": "darkred",
            "font-weight" : "bold",
            "font-size" : "16px",
            "width" : "15px"
          }
            $scope.aboutlabel = "Nie podano treści!!";
            $scope.autorlabel = "Nie podano autora!!";
            $scope.towho = "Nie podano odbiorcy!!";

            $scope.isDisabled = function(){
               return (!$scope.towhos);
            }




          $scope.avatarnew =  "images/<? echo $profile['nameavatar']; ?>"
          $scope.whonew =  "<? echo $profile['imie'].' '.$profile['nazwisko']; ?>"
          });
    </script>
  </body>
</html>
