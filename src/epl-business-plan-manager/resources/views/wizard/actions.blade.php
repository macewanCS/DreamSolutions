@extends('app')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/wizard.css"></link>

@stop

@section('content')

    <div id="wizard-action-selection">

        <h1 id="wizard-action-title">Select Actions</h1>



        <div class="wizard-button-area">
            @include ('wizard.partials.buttons', ['nextButtonAction' => 'WizardController@createActions'])
        </div>


    </div>
@stop