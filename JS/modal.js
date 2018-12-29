// JavaScript source code
$(document).ready(function () {
  $("#myModal").modal('hide');
  $("#Updatedib").modal('hide');
  $("#FreedModal").modal('hide');
  $("#Photogallerymodal").modal('hide');
    $("#myBtn").click(function () {
        $("#myModal").modal('show');
        $("#myModal").trigger('focus');
    });
    $("#closemyModal").click(function () {
        $("#myModal").modal('hide');
    });
    $("#Upbtn").click(function () {
        $("#Updatedib").modal('show');
        $("#myModal").modal('hide');
    });
    $("#uptmodal").click(function () {
        $("#Updatedib").modal('hide');
    });
     $("#Frbtn").click(function () {
        $("#FreedModal").modal('show');
        $("#myModal").modal('hide');
    });
    $("#closeFree").click(function () {
        $("#FreedModal").modal('hide');
    });
    $("#PGbtn").click(function () {
      $("#Photogallerymodal").modal('show');
      $("#myModal").modal('hide');
    });
    $("#closePhotogallerymodal").click(function () {
        $("#Photogallerymodal").modal('hide');
    });
    $(".backtomymodal").click(function () {
        $("#Photogallerymodal").modal('hide');
        $("#FreedModal").modal('hide');
        $("#Updatedib").modal('hide');
        $("#myModal").modal('show');
    });
    $("#QRbtn").click(function () {
      $("#QRModal").modal('show');
      $("#myModal").modal('hide');
    });
    $("#Bcktomd").click(function () {
      $("#QRModal").modal('hide');
      $("#myModal").modal('show');
    });
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });
});
