/*
 Should match CSS heights:

 create-plan.css        (see 'create-plan-section')
 jquery.steps.css       (see '.wizard > .content')
 */
var sectionHeight = 420;
var contentHeight = 310;

/* Multipliers for dynamic height */
var goalScreenMult = 23;
var objScreenMult = goalScreenMult * 2;
var actScreenMult = goalScreenMult * 3;

/* When the '+' button is pressed it will increase height by amount below */
var buttonChangeHeight = 75;

/* Number of Goals */
var numGoals = 0;

/* Number of input boxes on screen */
var goalField = 0;
var objField = 0;
var actField = 0;

/* Stores all the data */
var data = {};

$(document).ready(function() {
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

            if (currentIndex === 1) {
                for (var i = 0; i <= goalField; i++) {
                    if (document.getElementById('goal' + i) !== null && document.getElementById('goal' + i).value !== "") {
                        data['goal' + i] = { desc: document.getElementById('goal' + i).value };
                        numGoals++;
                    } else {
                        delete data['goal' + i];
                        numGoals--;
                    }
                }
            }
            console.log(data);

            return form.valid();
        },

        onStepChanged: function (event, currentIndex, priorIndex) {

            if (currentIndex === 1) {
                $("#create-plan-section").css("height",(sectionHeight + numGoals * goalScreenMult));
                $(".wizard > .content").css("height", (contentHeight + numGoals * goalScreenMult));
            }

            if (currentIndex === 2) {
                var container = document.getElementById("createPlanObjectiveContainer");
                if (container !== null) {
                    for (var i = 0; i <= numGoals; i++) {
                        if (data[Object.keys(data)[i]] !== undefined) {
                            var head = document.createElement("H1");
                            var text = document.createTextNode('Goal ' + (i + 1) + ': ' + data[Object.keys(data)[i]].desc);
                            head.appendChild(text);
                            container.appendChild(head);

                            var label = document.createElement("label");
                            label.appendChild(document.createTextNode('Objective *'));
                            container.appendChild(label);

                            var input = document.createElement("input");
                            input.type = 'text';
                            input.id = 'objective0';
                            input.name = 'Objective';
                            input.className = 'required';
                            container.appendChild(input);

                            var button = document.createElement("button");
                            button.type = 'button';
                            button.className = 'addTextBox';
                            button.innerHTML = '+';
                            button.setAttribute('onclick', 'addTextBox("createPlanObjectiveContainer")');
                            container.appendChild(button);
                        }
                    }

                    $("#create-plan-section").css("height",(sectionHeight + numGoals * objScreenMult));
                    $(".wizard > .content").css("height", (contentHeight + numGoals * objScreenMult));
                }
            }

            if (currentIndex === 3) {
                $("#create-plan-section").css("height",(sectionHeight + numGoals * actScreenMult));
                $(".wizard > .content").css("height", (contentHeight + numGoals * actScreenMult));
            }

            return;
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


function addTextBox(container) {
    var div = document.createElement('div');
    var name = '';

    if (document.getElementById(container).getAttribute('tag') == "goal") {
        name = "goal";
        id = name + ++goalField;

    } else if (document.getElementById(container).getAttribute('tag') == "objective") {
        name = "objective";
        id = name + ++objField;

    } else if (document.getElementById(container).getAttribute('tag') == "action") {
        name = "action";
        id = name + ++actField;
    }


    $("#create-plan-section").css( "height","+=" + buttonChangeHeight );
    $(".wizard > .content").css( "height","+=" + buttonChangeHeight );

    div.innerHTML = '<input type="text" id=' + id + ' name=' + name + '><button class="removeTextBox" type="button" onclick="removeTextBox(this,' + container + ')">Remove</button>';
    document.getElementById(container).appendChild(div);
}

function removeTextBox(div, container) {
    document.getElementById(container.id).removeChild(div.parentNode);

    $(".wizard > .content").css( "height","-=" + buttonChangeHeight );
    $("#create-plan-section").css( "height","-=" + buttonChangeHeight );
}