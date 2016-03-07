@extends('app')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/wizard.css"></link>

@stop

@section('content')

    <div id="wizard-goal-selection">

        <h1 id="wizard-goal-title">Select Goals</h1>

        <div class="text-boxes">
            <p>
                {!! Form::textarea('Goal 1', '', array('class' => 'goal-text-boxes')) !!}
            </p>

            <p>
                {!! Form::textarea('Goal 2', '', array('class' => 'goal-text-boxes')) !!}
            </p>

            <p>
                {!! Form::textarea('Goal 3', '', array('class' => 'goal-text-boxes')) !!}
            </p>
        </div>

        <div class="wizard-button-area-goals">
            @include ('wizard.partials.buttons', ['nextButtonAction' => 'WizardController@createGoals'])
        </div>

    </div>
@stop
