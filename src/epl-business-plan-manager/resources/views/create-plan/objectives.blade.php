@extends('app')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/create-plan.css"></link>

@stop

@section('content')

    <div id="create-plan-objective-selection">

        <h1 id="create-plan-objective-title">Select Objectives</h1>


        <div class="create-plan-button-area">
            @include ('create-plan.partials.buttons', ['nextButtonAction' => 'CreatePlanController@createObjectives'])
        </div>

    </div>
@stop