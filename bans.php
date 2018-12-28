<?php
session_start();
//include 'actions.php';
?>
  <style>
     input[type="text"],
     input[type="date"],
     input[type="number"] {
        border: none;
        border-bottom: 1px solid #372590;
        background: transparent;
        outline: none;
        height: 40px;
        color: #000000;
    }

  select, #optionsban{
    border-bottom: 1px solid #372590;
    box-shadow: 1px solid #372590;
    -webkit-box-shadow: 1px solid #372590;
    background: transparent;
    outline: none;
    height: 40px;
    color: #000000;
    width: 40%;
}

  </style>
  <body>
    <div class="modal" id="banstoid">
           <!-- Modal content -->
           <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Nadawanie kar czasowych</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="banclose">
                           <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="card">
                            <div class="card-header">
                              Kary czasowe na ilość dni
                            </div>
                            <?php echo '
                            <div class="card-body">
                                <label for="bansid">ID</label>
                                <input type="text" name="bansid" value="'.$_SESSION['whobanid'].'" placeholder="ID" id="bansid" />
                                <label for="bdays">Ilość</label>
                                <input type="text" name="bdays" value="" placeholder="Ilość" id="bdays"/>
                                <label for="bdr">Powód bana</label>
                                <input type="text" name="bdr" value="" placeholder="Powód kary" id="bdr"/>
                                <label for="optionsban">Wybór dzień/tydzień/miesiąc/rok</label>
                                <select name="optionsban" id="optionsban">
                                  <option value="days" selected>Dni</option>
                                  <option value="week">Tygodni</option>
                                  <option value="month">Miesięcy</option>
                                  <option value="year">Lata</option>
                                </select>

                            </div>

                          </div>

                        </div>
                            <div class="col-md-6">
                              <div class="card dark">
                                <div class="card-header">
                                  Kary czasowe do określonego dnia
                                </div>
                                <div class="card-body">
                                    <label for="banids1">ID</label>
                                    <input type="text" name="banids1" value="'.$_SESSION['whobanid'].'" placeholder="ID" id="banids1"/>
                                    <label for="bcalendar">Wybór daty</label>
                                    <input type="date" name="bcalendar" id="bcalendar"/>
                                    <label for="bcr">Powód bana</label>
                                    <input type="text" name="bcr" value="" placeholder="Powód kary" id="bcr"/>

                                </div>
                          </div>

                        </div>

                      </div>

                    </div>
                </div>
           <div class="modal-footer">

             <a href="#" class="linked"><input type="hidden" value="14" name="action"/><button class="uncover" name="bantos" id="bantos" value=""><i class="material-icons bto">hourglass_full</i></button></a>
           </form>
           '; ?>

       </div>
      </div>
      </div>

    </div>
