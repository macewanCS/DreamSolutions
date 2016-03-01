var l = 0;
var c = 0;
function addTextBox(container) {
    var div = document.createElement('div');
    var name = '';
    if (document.getElementById(container).getAttribute('tag') == "lead") {
        l++
        name = '"leadName' + l +'"';
    } else {
        c++;
        name = '"collaboratorsName' + c +'"';
    }
    div.innerHTML = '<input type="text" name=' + name + '></input><button type="button" onclick="removeTextBox(this,' + container + ')">Remove</button>';
    document.getElementById(container).appendChild(div);
}

function removeTextBox(div, container) {
    var continerId = document.getElementById(container.id);
    if (continerId.getAttribute('tag') == "lead") {
        continerId.removeChild(div.parentNode);
        l--;
    } else {
        continerId.removeChild(div.parentNode);
        c--;
    }
}
