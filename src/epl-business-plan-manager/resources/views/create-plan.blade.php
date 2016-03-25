@extends('app')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/create-plan.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.steps.css">
    <link rel="stylesheet" type="text/css" href="/css/manage_plan.css">

    <script src="/js/jquery-1.12.1.min.js"></script>
    <script src="/js/jquery.steps.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/create-plan.js"></script>


@stop

@section('content')

    <div id="create-plan-section">
        <form id="create-plan-form" action="#">
            <div>
                <h3>Years</h3>
                <section>
                    <div id="createPlanYearContainer" tag="year">
                        <h1 class="create-plan-year-labels">Start Year</h1>
                        <select id="start-year" class="create-plan-years required"></select>

                        <h1 class="create-plan-year-labels">End Year</h1>
                        <select id="end-year" class="create-plan-years"></select>
                    </div>
                </section>

                <h3>Goals</h3>
                <section>
                    <p id="create-plan-mandatory-label">(*) Mandatory</p>

                    <div id="createPlanGoalContainer" tag="goal">
                        {!! Form::label('Goal *') !!}
                        <input type="text" id="goal0" name="Goal" class="required">
                        {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("createPlanGoalContainer")']) !!}
                    </div>
                </section>

                <h3>Objectives</h3>
                <section>
                    <p id="create-plan-mandatory-label">(*) Mandatory</p>

                    <div id="createPlanObjectiveContainer" tag="goal">
                        {!! Form::label('Objective *') !!}
                        <input type="text" id="objective0" name="Objective" class="required">
                        {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("createPlanObjectiveContainer")']) !!}
                    </div>
                </section>

                <h3>Actions</h3>
                <section>
                    <p id="create-plan-mandatory-label">(*) Mandatory</p>

                        <div id="createPlanActionContainer" tag="goal">
                        {!! Form::label('Action *') !!}
                        <input type="text" id="action0" name="Action" class="required">
                        {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("createPlanActionContainer")']) !!}
                    </div>
                </section>
            </div>
        </form>
    </div>
@stop
