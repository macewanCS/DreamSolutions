@extends('app')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/create-plan.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.steps.css">
    <link rel="stylesheet" type="text/css" href="/css/manage_plan.css">

    <script src="/js/jquery-1.12.1.min.js"></script>
    <script src="/js/jquery.steps.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/jquery.steps.create-plan.js"></script>
    <script src="/js/addTextBox.js"></script>

    <script>
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
    </script>

    <script>
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
    </script>
@stop

@section('content')

    <div id="create-plan-section">
        <form id="create-plan-form" action="#">
            <div>

                <h3>Years</h3>
                <section>
                    <h1 class="create-plan-year-labels">Start Year</h1>
                    <select id="start-year" class="create-plan-years required"></select>

                    <h1 class="create-plan-year-labels">End Year</h1>
                    <select id="end-year" class="create-plan-years"></select>
                </section>

                <h3>Goals</h3>
                <section>
                    <p id="create-plan-mandatory-label">(*) Mandatory</p>

                    <div id="createPlanGoalContainer" tag="goal">
                        {!! Form::label('Goal') !!}<br>
                        {!! Form::text('goalName') !!}
                        {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("createPlanGoalContainer")']) !!}
                    </div>
                </section>

                <h3>Objectives</h3>
                <section>
                    <label for="objective1">Objective 1</label>
                    <input id="objective1" name="objective1" type="text" class="required">
                    <label for="objective2">Objective 2</label>
                    <input id="objective2" name="objective2" type="text">
                    <label for="objective3">Objective 3</label>
                    <input id="objective3" name="objective3" type="text">
                    <label for="objective4">Objective 4</label>
                    <input id="objective4" name="objective4" type="text">
                </section>

                <h3>Actions</h3>
                <section>
                    <label for="action1">Action 1</label>
                    <input id="action1" name="action1" type="text" class="required">
                    <label for="action2">Action 2</label>
                    <input id="action2" name="action2" type="text">
                    <label for="action3">Action 3</label>
                    <input id="action3" name="action3" type="text">
                    <label for="action4">Action 4</label>
                    <input id="action4" name="action4" type="text">
                </section>
            </div>
        </form>
    </div>
@stop
