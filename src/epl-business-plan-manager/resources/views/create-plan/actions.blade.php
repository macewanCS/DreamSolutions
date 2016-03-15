@extends('app')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/create-plan.css"></link>

@stop

@section('content')

    <div id="create-plan-action-selection">

        <h1 id="create-plan-action-title">Select Actions</h1>

        <div class="create-plan-button-area">
            @include ('create-plan.partials.buttons', ['nextButtonAction' => 'CreatePlanController@createActions'])
        </div>


    </div>
@stop