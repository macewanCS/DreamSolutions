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
                    <p id="create-plan-mandatory-label">* Top box is required</p>
                    <div id="createPlanGoalContainer" tag="goal"></div>
                </section>

                <h3>Objectives</h3>
                <section>
                    <p id="create-plan-mandatory-label">(*) Required</p>
                    <div id="createPlanObjectiveContainer" tag="obj"></div>
                </section>

            </div>
        </form>
    </div>
@stop
