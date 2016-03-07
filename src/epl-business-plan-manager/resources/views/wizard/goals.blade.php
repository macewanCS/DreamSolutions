@extends('app')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/wizard.css"></link>

@stop

@section('content')

    <div id="wizard-goal-selection">

        <h1 id="wizard-goal-title">Select Goals</h1>

        <div class="text-boxes">

            <div class="goal-area">
                {!! Form::label('Goal 1: ', '', array('class' => 'goal-text-label')) !!}
                {!! Form::textarea('Goal 1', '', array('class' => 'goal-text-box')) !!}
            </div>

            <div class="goal-area">
                {!! Form::label('Goal 2: ', '', array('class' => 'goal-text-label')) !!}
                {!! Form::textarea('Goal 2', '', array('class' => 'goal-text-box')) !!}
            </div>

            <div class="goal-area">
                {!! Form::label('Goal 3: ', '', array('class' => 'goal-text-label')) !!}
                {!! Form::textarea('Goal 3', '', array('class' => 'goal-text-box')) !!}
            </div>

        </div>

        <div class="wizard-button-area-goals">
            @include ('wizard.partials.buttons', ['nextButtonAction' => 'WizardController@createGoals'])
        </div>

    </div>
@stop
