@extends('app')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/wizard.css"></link>

@stop

@section('content')
    <div id="wizard-year-section">

        <h1 id="wizard-year-title">Select Years</h1>

        <div id="wizard-year-inputs">

            <select class="wizard-years">
                <?php
                    foreach(range(date('Y'), (int)date("Y") + 10) as $startYear) {
                        echo "\t<option value='".$startYear."'>".$startYear."</option>\n\r";
                    }
                ?>
            </select>

            <p id="wizard-year-separator"> - </p>

            <select class="wizard-years">
                <?php
                foreach(range(date('Y') + 1, (int)date("Y") + 10) as $endYear) {
                    echo "\t<option value='".$endYear."'>".$endYear."</option>\n\r";
                }
                ?>
            </select>
        </div>

        {!! Form::open(array('action' => 'WizardController@createBP')) !!}
        {!! Form::submit('Next', ['class' => 'wizard-button']) !!}

    </div>
@stop
