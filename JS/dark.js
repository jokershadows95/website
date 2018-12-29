function dark_light() {
    var button = document.getElementById("change");
    if (document.body.style.backgroundColor == "dimgrey") {
        document.body.style.backgroundColor = "darkgrey";
        button.style.backgroundImage = 'url(pics/off.svg)';
        document.body.style.vlure = 0.5;
    } else {
        document.body.style.backgroundColor = "dimgrey";
        button.style.backgroundImage = 'url(pics/on.svg)';
    }

}
function disabledimg() {
    var buttons = document.getElementById("changes");
    if (document.body.style.backgroundImage == 'none') {
        document.body.style.backgroundImage = 'url(pics/tlo.jpg)';
        buttons.style.backgroundImage = 'url(pics/off.svg)';

    } else {
        document.body.style.backgroundImage = 'none';
        document.body.style.backgroundColor = "darkgrey";
        buttons.style.backgroundImage = 'url(pics/on.svg)';
    }
}
    function mobiles() {
        var buttonm = document.getElementById("mobile");
        if (document.body.style.backgroundImage == 'url(pics/tlo.jpg)') {
            document.body.style.backgroundImage = 'none';
            document.body.style.backgroundColor = "#3e46dc";
            buttonm.style.backgroundImage = 'url(pics/on.svg)';

        }
        else if (document.body.style.backgroundColor == "darkgray") {
            document.body.style.backgroundColor = "#3e46dc";
            buttonm.style.backgroundImage = 'url(pics/on.svg)';
        }
        else if (document.body.style.backgroundColor == "dimgray") {
            document.body.style.backgroundColor = "#3e46dc";
            buttonm.style.backgroundImage = 'url(pics/on.svg)';
        }
        else{
            document.body.style.backgroundColor = "dimgrey";
            buttonm.style.backgroundImage = 'url(pics/off.svg)';
        }
    }
