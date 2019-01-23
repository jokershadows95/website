$(document).ready(function() {
  $("#loginsform").click(function() {
    $("#iconstoast").html("check_circle_outline");
    $("#desc").html("Success loading your profile...");
  });
  $("#UpdateBtn").click(function() {
    $("#iconstoast").html("check_circle_outline");
    $("#desc").html("Updating your profile");
  });
  $("#Urlop").click(function() {
    $("#iconstoast").html("check_circle_outline");
    $("#desc").html("Send request for free day");
  });
  /*$("#UpdateBtn").click(function() {
    $("#iconstoast").html("check_circle_outline");
    $("#desc").html("Updating your profile");
  });
  $("#UpdateBtn").click(function() {
    $("#iconstoast").html("check_circle_outline");
    $("#desc").html("Updating your profile");
  });*/
  var x = document.getElementById("toast")
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
});
