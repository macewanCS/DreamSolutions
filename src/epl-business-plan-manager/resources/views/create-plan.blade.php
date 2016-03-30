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

    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <div id="create-plan-section">
        <form id="create-plan-form" action="/manage/create-plan">
            <div>

                <h3>Years</h3>
                <section>
                    <div id="createPlanYearContainer" tag="year">
                        <h1 class="create-plan-year-labels">Start Year</h1>
                        <select id="start-year" class="create-plan-years required"></select>

                        <h1 class="create-plan-year-labels">End Year</h1>
                        <select id="end-year" class="create-plan-years"></select>
                        <p id="create-plan-mandatory-label">* Start year may not exceed end year</p>
                    </div>
                </section>

                <h3>Goals</h3>
                <section>
                    <div id="createPlanGoalContainer" tag="goal"></div>
                    <p id="create-plan-mandatory-label">* Top box is required</p>
                </section>

                <h3>Objectives</h3>
                <section>
                    <div id="createPlanObjectiveContainer" tag="obj"></div>
                    <p id="create-plan-mandatory-label">(*) Required</p>
                </section>

            </div>
        </form>
    </div>
@stop
