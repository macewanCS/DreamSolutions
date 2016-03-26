/*
 Should match CSS heights:

 create-plan.css        (see 'create-plan-section')
 jquery.steps.css       (see '.wizard > .content')
 */
var sectionHeight = 350;
var contentHeight = 250;

/* Number of input boxes on screen */
var goalField = 0;
var objField = 0;
var actField = 0;

/* When the '+' button is pressed it will increase height by amount below */
var buttonChangeHeight = 70;

/* Multipliers for dynamic height */
var goalScreenMult = buttonChangeHeight;
var objScreenMult = goalScreenMult * 1.80;
var actScreenMult = goalScreenMult * 2.0;

/* Stores all the data */
var data = [];
var goalBoxes = [];

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

                        /* Make the goal a key and make an empty array its value */
                        var goalElem = {};
                        goalElem[document.getElementById('goal' + i).value] = [];

                        data.push(goalElem);

                    } else {
                        //delete data['goal' + i];
                    }
                }
            }
            console.log(data);

            return form.valid();
        },

        onStepChanged: function (event, currentIndex, priorIndex) {
            var div = document.createElement("div");
            var label = document.createElement("label");
            var input = document.createElement("input");
            var button = document.createElement("button");
            var container;
            var i;

            if (currentIndex === 0) {
                $("#create-plan-section").css("height",(sectionHeight));
                $(".wizard > .content").css("height", (contentHeight));
            }

            if (currentIndex === 1) {
                /* Reset Screen */
                $('.removable').remove();

                /* Rebuild Screen */
                container = document.getElementById("createPlanGoalContainer");
                if (container !== null) {
                    for (i = 0; i <= data.length; i++) {

                        div.className = 'removable';

                        if (i === 0) {
                            label.appendChild(document.createTextNode('Goal *'));
                            input.className = 'required';

                            input.type = 'text';
                            input.id = 'goal' + i;
                            input.name = 'Goal';

                            button.type = 'button';
                            button.className = 'addTextBox';
                            button.innerHTML = '+';
                            button.setAttribute('onclick', 'addTextBox("createPlanGoalContainer")');

                            div.appendChild(label);
                            div.appendChild(input);
                            div.appendChild(button);

                            container.appendChild(div);

                            goalBoxes.push('goal' + goalField);
                        }
                        else {
                            addTextBox();
                        }
                    }
                }

                $("#create-plan-section").css("height",(sectionHeight + goalField * goalScreenMult));
                $(".wizard > .content").css("height", (contentHeight + goalField * goalScreenMult));
            }

            if (currentIndex === 2) {
                if (priorIndex == 1) {

                    /* Reset Screen */
                    $('.removeObj').remove();

                    /* Rebuild Screen */
                    container = document.getElementById("createPlanObjectiveContainer");
                    if (container !== null) {
                        for (i = 0; i <= data.length; i++) {
                            if (data[Object.keys(data)[i]] !== undefined) {
                                div = document.createElement("div");

                                var head = document.createElement("H1");
                                var text = document.createTextNode('Goal ' + (i + 1) + ': ' + Object.keys(data[i]));
                                head.className = 'removeObj';
                                head.appendChild(text);
                                div.appendChild(head);

                                label = document.createElement("label");
                                label.appendChild(document.createTextNode('Objective *'));
                                label.className = 'removeObj';
                                div.appendChild(label);

                                input = document.createElement("input");
                                input.type = 'text';
                                input.id = 'goal' + (i + 1) + '-obj0';
                                input.name = 'Objective';
                                input.className = 'required removeObj';
                                div.appendChild(input);

                                button = document.createElement("button");
                                button.type = 'button';
                                button.className = 'addTextBox removeObj';
                                button.innerHTML = '+';
                                button.setAttribute('onclick', 'addTextBox("createPlanObjectiveContainer")');
                                div.appendChild(button);

                                container.appendChild(div);
                            }
                        }
                    }
                }

                $("#create-plan-section").css("height",(sectionHeight + data.length * objScreenMult));
                $(".wizard > .content").css("height", (contentHeight + data.length * objScreenMult));
            }

            if (currentIndex === 3) {
                $("#create-plan-section").css("height",(sectionHeight + goalField * actScreenMult));
                $(".wizard > .content").css("height", (contentHeight + goalField * actScreenMult));
            }

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
    var label = document.createElement("label");
    var input = document.createElement("input");
    var button = document.createElement("button");
    var inputId = "";

    div.className = "removable";

    if (document.getElementById(container).getAttribute('tag') == "goal") {
        goalBoxes.push('goal' + ++goalField);
        input.name = 'Goal' ;
        inputId = 'goal' + goalField;

    } else if (document.getElementById(container).getAttribute('tag') == "objective") {
        input.name = 'Objective';
        inputId = 'objective' + objField;

    } else if (document.getElementById(container).getAttribute('tag') == "action") {
        input.name = 'Action';
        inputId = 'action' + actField;
    }

    input.type = 'text';
    input.id = inputId;

    button.type = 'button';
    button.className = 'removeTextBox';
    button.innerHTML = 'Remove';
    button.setAttribute('onclick', 'removeTextBox(this, "' + inputId + '", ' + container + ')');

    div.appendChild(input);
    div.appendChild(button);

    $("#create-plan-section").css( "height","+=" + buttonChangeHeight );
    $(".wizard > .content").css( "height","+=" + buttonChangeHeight );

    document.getElementById(container).appendChild(div);
}

function removeTextBox(button, inputId, container) {
    var containerId = document.getElementById(container.id);

    if (containerId.getAttribute('tag') == "goal") {
        console.log(inputId);
        console.log(goalBoxes);
        goalBoxes.splice(goalBoxes.indexOf(inputId),1);
        console.log(inputId);
        console.log(goalBoxes);
    }

    containerId.removeChild(button.parentNode);

    $(".wizard > .content").css( "height","-=" + buttonChangeHeight );
    $("#create-plan-section").css( "height","-=" + buttonChangeHeight );
}