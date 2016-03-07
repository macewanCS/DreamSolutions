@extends('app')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/wizard.css"></link>

@stop

@section('content')

    <div id="wizard-objective-selection">

        <h1 id="wizard-objective-title">Select Objectives</h1>


        <div class="wizard-button-area">
            @include ('wizard.partials.buttons', ['nextButtonAction' => 'WizardController@createObjectives'])
        </div>

    </div>
@stop