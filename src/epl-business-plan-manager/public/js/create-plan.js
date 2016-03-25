/*!
 * jQuery Steps v1.1.0 - 09/04/2014
 * Copyright (c) 2014 Rafael Staib (http://www.jquery-steps.com)
 * Licensed under MIT http://www.opensource.org/licenses/MIT
 */

$(function() {
    var form = $("#create-plan-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });

    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex)
        {
            if (currentIndex > newIndex) { return true; }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            alert("Business Plan Created!");
        }
    });
});


$(document).ready(function() {
    var selStartYear = document.getElementById('start-year');

    var today = new Date();
    var year = today.getFullYear();
    for (var i = year; i < (year + 10); i++) {
        var option = document.createElement('option');
        option.innerHTML = i.toString();
        option.value = 'year' + (i - year).toString();
        selStartYear.add(option, (i-year));
    }
});

$(document).ready(function() {
    var selStartYear = document.getElementById('end-year');

    var today = new Date();
    var year = today.getFullYear() + 1;
    for (var i = year; i < (year + 10); i++) {
        var option = document.createElement('option');
        option.innerHTML = i.toString();
        option.value = 'year' + (i - year).toString();
        selStartYear.add(option, (i-year));
    }
});

var g = 0;
var o = 0;
var a = 0;

function addTextBox(container) {
    var div = document.createElement('div');
    var name = '';

    if (document.getElementById(container).getAttribute('tag') == "goal") {
        name = "goalName" + ++g;
        $("#create-plan-section").css( "height","+=50" );
        $(".wizard > .content").css( "height","+=50" );

    } else if (document.getElementById(container).getAttribute('tag') == "objective") {
        name = "objectiveName" + ++o;
        $("#create-plan-section").css( "height","+=50" );
        $(".wizard > .content").css( "height","+=50" );

    } else if (document.getElementById(container).getAttribute('tag') == "action") {
        name = "actionName" + ++a;
        $("#create-plan-section").css( "height","+=50" );
        $(".wizard > .content").css( "height","+=50" );
    }

    div.innerHTML = '<input type="text" name=' + name + '><button class="removeTextBox" type="button" onclick="removeTextBox(this,' + container + ')">Remove</button>';
    document.getElementById(container).appendChild(div);
}

function removeTextBox(div, container) {
    var containerId = document.getElementById(container.id);

    if (containerId.getAttribute('tag') == "goal") {
        $(".wizard > .content").css( "height","-=50" );
        $("#create-plan-section").css( "height","-=50" );
        containerId.removeChild(div.parentNode);
        g--;

    } else if (containerId.getAttribute('tag') == "objective") {
        $(".wizard > .content").css( "height","-=50" );
        $("#create-plan-section").css( "height","-=50" );
        containerId.removeChild(div.parentNode);
        o--;

    } else if (containerId.getAttribute('tag') == "action") {
        $(".wizard > .content").css( "height","-=50" );
        $("#create-plan-section").css( "height","-=50" );
        containerId.removeChild(div.parentNode);
        a--;
    }
}