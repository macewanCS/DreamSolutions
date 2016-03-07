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
                @if (($i + 1) != $numGoals)
                    <div class="goal-area">
                        {!! Form::label('Goal '.$i.': ', '', array('class' => 'goal-text-label')) !!}
                        {!! Form::textarea('Goal '.$i, '', array('class' => 'goal-text-box')) !!}
                    </div>
                @else
                    <div class="last-goal-area">
                        {!! Form::label('Goal '.$i.': ', '', array('class' => 'goal-text-label')) !!}
                        {!! Form::textarea('Goal '.$i, '', array('class' => 'goal-text-box')) !!}
                        {!! Form::button('+', array('id' => 'add-goal-action')) !!}
                    </div>
                @endif
            @endfor

        </div>


        <div class="wizard-button-area-goals">
            @include ('wizard.partials.buttons', ['nextButtonAction' => 'WizardController@createGoals'])
        </div>

    </div>
@stop
