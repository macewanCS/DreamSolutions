/*
 Should match CSS heights:

 create-plan.css        (see 'create-plan-section')
 jquery.steps.css       (see '.wizard > .content')
 */
var sectionHeight = 400;
var contentHeight = 295;

/* Number of goal boxes on screen */
var goalField = 0;

/* Used for generating objective boxes with correct ID's */
var goalNum = 0;
var goalObjBoxes = {};

/* When the '+' button is pressed it will increase height by amount below */
var buttonHeightAdded = 72.5437;
var headingHeight = 104.549;
var topMessageHeight =  13.33;

/* Stores all the data */
var data = [];
var sYear = 0;
var eYear = 0;

$(document).ready(function() {
    var form = $("#create-plan-form");

    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); }
    });

    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {

            /* Action performed based on current index */
            if (currentIndex === 0) {
                populateYears();

                if (sYear >= eYear) return false;


            }
            if (currentIndex === 1) {
                if (document.getElementById('goal0') === undefined || document.getElementById('goal0') === null) {
                    return false;
                }
                populateGoals();
            }
            if (currentIndex === 2) { populateObjectives(); }

            /* Allows previous button to be pushed without validation */
            if (currentIndex > newIndex) { return true; }

            /* Checks validation */
            return form.valid();
        },

        onStepChanged: function (event, currentIndex) {
            var div = document.createElement("div");
            var label = document.createElement("label");
            var input = document.createElement("input");
            var button = document.createElement("button");
            var header1 = document.createElement("h1");

            var container;
            var i;

            if (currentIndex === 0) {
                $("#create-plan-section").css("height",(sectionHeight));
                $(".wizard > .content").css("height", (contentHeight));
            }

            if (currentIndex === 1) {
                /* Reset Screen */
                $('.removable').remove();

                goalField = 0;

                /* Rebuild Screen */
                container = document.getElementById("createPlanGoalContainer");
                if (container !== null) {
                    for (i = 0; i <= data.length; i++) {

                        div.className = 'removable';

                        if (i === 0) {
                            header1.innerHTML = "Goal";

                            label.appendChild(header1);
                            input.className = 'required valid';

                            input.type = 'text';
                            input.id = 'goal' + goalField;
                            input.name = 'Goal';
                            if (data.length > 0) {
                                input.value = Object.keys(data[i]);
                            }

                            button.type = 'button';
                            button.className = 'addTextBox';
                            button.innerHTML = '+';
                            button.setAttribute('onclick', 'addTextBox("createPlanGoalContainer")');

                            div.appendChild(label);
                            div.appendChild(input);
                            div.appendChild(button);

                            container.appendChild(div);
                        }
                        else {
                            addTextBox("createPlanGoalContainer");
                        }
                    }
                }

                setHeight(goalField * buttonHeightAdded);
            }

            if (currentIndex === 2) {
                /* Reset Screen */
                $('.removeObj').remove();

                for (var x = 0; x < Object.keys(goalObjBoxes).length; x++) {
                    goalObjBoxes['goal' + x] = 0;
                }

                var extraObjSz = 0;

                /* Rebuild Screen */
                container = document.getElementById("createPlanObjectiveContainer");
                if (container !== null) {
                    for (i = 0; i <= data.length; i++) {
                        if (data[Object.keys(data)[i]] !== undefined) {
                            var key = Object.keys(data[i]);
                            var numObjs = data[i][key].length;

                            for (var j = 0; j <= numObjs; j++) {
                                if (j === 0) {
                                    div = document.createElement("div");
                                    div.className = 'removeObj';
                                    div.id = 'goalSec' + i;
                                    div.setAttribute('tag', 'obj');

                                    var head = document.createElement("H1");
                                    var text = document.createTextNode('Goal ' + (i + 1) + ': ' + key);
                                    head.appendChild(text);
                                    div.appendChild(head);

                                    label = document.createElement("label");
                                    label.appendChild(document.createTextNode('Objective *'));
                                    div.appendChild(label);

                                    input = document.createElement("input");
                                    input.type = 'text';
                                    input.id = 'goal' + i + '-obj' + j;
                                    input.name = 'Objective';
                                    input.className = 'required valid';

                                    if (numObjs > 0) {
                                        input.value = data[i][key][j];
                                    }

                                    div.appendChild(input);

                                    button = document.createElement("button");
                                    button.type = 'button';
                                    button.className = 'addTextBox';
                                    button.innerHTML = '+';
                                    button.setAttribute('onclick', 'addTextBox("goalSec' + i + '")');
                                    div.appendChild(button);

                                    container.appendChild(div);
                                }
                                else {
                                    addTextBox("goalSec" + i);
                                }
                                extraObjSz++;
                            }
                        }
                    }
                }
                setHeight((data.length * headingHeight) + (extraObjSz * buttonHeightAdded));
            }
        },

        onFinishing: function () {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },

        onFinished: function () {
            populateObjectives();
/*            form.action = data;
            form.submit();*/
            $.ajax({
                url: '/manage/create-plan',
                type: "post",
                dataType: 'json',
                data: { 'sYear': sYear, 'eYear': eYear, 'data': data },
                beforeSend: function (xhr) {
                    // Function needed from Laravel because of the CSRF Middleware
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                success: function() {

                    alert("Business Plan Created!");
                    window.location.href = "/manage";

                },
                error: function(e) {
                    console.log(e);
                }
            });

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
        option.value = i.toString();
        selStartYear.add(option, i);
    }
});

$(document).ready(function() {
    var selStartYear = document.getElementById('end-year');

    var today = new Date();
    var year = today.getFullYear() + 1;
    for (var i = year; i < (year + 10); i++) {
        var option = document.createElement('option');
        option.innerHTML = i.toString();
        option.value = i.toString();
        selStartYear.add(option, i);
    }
});

function isGoalDef(goal) {
    for (var i = 0; i < data.length; i++) {
        if (Object.keys(data[i]).indexOf(goal) !== -1) {
            return true;
        }
    }
    return false;
}

function removeGoal(goal) {
    var element = document.getElementById(goal).value;
    for (var i = 0; i < data.length; i++) {
        if (Object.keys(data[i]).indexOf(element) !== -1) {
            data.splice(i, 1);
        }
    }
}

function populateYears() {
    sYear = document.getElementById("start-year").value;
    eYear = document.getElementById("end-year").value;
}

function populateGoals() {
    for (var i = 0; i <= goalField; i++) {
        if (document.getElementById('goal' + i) !== null && document.getElementById('goal' + i).value !== "") {

            if (data.length === 0 || isGoalDef(document.getElementById('goal' + i).value) === false) {
                /* Make the goal a key and make an empty array its value */
                var goalElem = {};

                if (goalObjBoxes === undefined || goalObjBoxes === null ||
                    Object.keys(goalObjBoxes).indexOf('goal' + i) === -1) {
                    goalElem[document.getElementById('goal' + i).value] = [];

                    data.push(goalElem);

                    goalObjBoxes['goal' + i] = 0;
                } else {
                    var key = Object.keys(data[i]);

                    goalElem[document.getElementById('goal' + i).value] = data[i][key];

                    data[i] = goalElem;
                }
            }
        }
    }
}

function populateObjectives() {
    for (var i = 0; i < data.length; i++) {
        var key = Object.keys(data[i])[0];

        for (var j = 0; j <= goalObjBoxes['goal' + i]; j++) {
            var elem = document.getElementById('goal' + i + '-obj' + j);
            if (elem !== null && elem !== "") {
                elem = elem.value;

                if (elem !== "" && data[i][key].indexOf(elem) === -1) {

                    if (data[i][key][j] !== null) {
                        data[i][key][j] = elem;
                    }
                    else {
                        data[i][key].push(elem);
                    }
                }
            }
        }
    }
}

function addTextBox(container) {
    var element = document.getElementById(container);

    var div = document.createElement('div');
    var label = document.createElement("label");
    var input = document.createElement("input");
    var button = document.createElement("button");

    var inputId = '';

    div.className = "removable";

    if (element.getAttribute('tag') == "goal") {
        input.name = 'Goal';
        inputId = 'goal' + ++goalField;

        /* Populate the goal inputs */
        if (goalField < data.length)
            input.value = Object.keys(data[goalField]);

    } else if (element.getAttribute('tag') == "obj") {
        /* Container has name goalSec#, so the number is located at index 7 */
        goalNum = container.substr(7);
        input.name = 'Objective';
        inputId = 'goal' + goalNum + '-obj' + ++goalObjBoxes['goal' + goalNum];

        var key = Object.keys(data[goalNum])[0];

        if (goalObjBoxes['goal' + goalNum] < data[goalNum][key].length) {
            input.value = data[goalNum][key][goalObjBoxes['goal' + goalNum]];
        }
    }

    input.type = 'text';
    input.id = inputId;

    button.type = 'button';
    button.className = 'removeTextBox';
    button.innerHTML = 'Remove';
    button.setAttribute('onclick', 'removeTextBox(this,"' + inputId + '",' + container + ')');

    div.appendChild(input);
    div.appendChild(button);

    changeHeight(buttonHeightAdded);

    document.getElementById(container).appendChild(div);
}

function removeTextBox(button, inputId, container) {
    var containerId = document.getElementById(container.id);

    if (containerId.getAttribute('tag') == "goal") {
        removeGoal(inputId, data);
        delete goalObjBoxes[inputId];
    }

    if (containerId.getAttribute('tag') == "obj") {
        var goalIdx = (inputId.split('-')[0]).substring(4);
        var goalKey = Object.keys(data[goalIdx]);

        var objName = document.getElementById(inputId).value;
        var objIdx = data[goalIdx][goalKey].indexOf(objName);

        if (objIdx !== -1) {
            data[goalIdx][goalKey].splice(objIdx, 1);
        }
    }
    containerId.removeChild(button.parentNode);

    changeHeight(-1 * buttonHeightAdded);

}

function changeHeight(number) {
    $("#create-plan-section").css( "height", "+=" + number);
    $(".wizard > .content").css( "height", "+=" + number);
}

function setHeight(number) {
    $("#create-plan-section").css( "height", sectionHeight + number - topMessageHeight);
    $(".wizard > .content").css( "height", contentHeight + number - topMessageHeight);
}