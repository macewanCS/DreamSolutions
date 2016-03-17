var l = 0;
var c = 0;
var g = 0;
function addTextBox(container) {
    var div = document.createElement('div');
    var name = '';
    if (document.getElementById(container).getAttribute('tag') == "lead") {
        l++
        name = '"leadName' + l +'"';
    } else if (document.getElementById(container).getAttribute('tag') == "co") {
        c++;
        name = '"collaboratorsName' + c +'"';
    } else {
        g++;
        name = '"goalName"' + g + '""';
    }
    div.innerHTML = '<input type="text" name=' + name + '></input><button class="removeTextBox" type="button" onclick="removeTextBox(this,' + container + ')">Remove</button>';
    document.getElementById(container).appendChild(div);
}

function removeTextBox(div, container) {
    var continerId = document.getElementById(container.id);
    if (continerId.getAttribute('tag') == "lead") {
        continerId.removeChild(div.parentNode);
        l--;
    } else if (continerId.getAttribute('tag') == "co") {
        continerId.removeChild(div.parentNode);
        c--;
    } else {
        continerId.removeChild(div.parentNode);
        g--;
    }
}

//# sourceMappingURL=addTextBox.js.map
