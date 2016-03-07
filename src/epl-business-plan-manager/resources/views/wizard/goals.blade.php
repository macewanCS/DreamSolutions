@extends('app')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/wizard.css"></link>

@stop

@section('content')

    <div id="wizard-goal-selection">

        <h1 id="wizard-goal-title">Enter Goals</h1>

        <div class="text-boxes">
            <?php $numGoals = 4; ?>
            @for ($i = 1; $i < $numGoals; $i++)
                <div class="goal-area">
                    {!! Form::label('Goal '.$i.': ', '', array('class' => 'goal-text-label')) !!}
                    {!! Form::textarea('Goal '.$i, '', array('class' => 'goal-text-box')) !!}
                </div>
            @endfor

        <div class="wizard-button-area-goals">
            @include ('wizard.partials.buttons', ['nextButtonAction' => 'WizardController@createGoals'])
        </div>

    </div>
@stop
