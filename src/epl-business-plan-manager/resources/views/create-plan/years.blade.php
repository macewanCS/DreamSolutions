@extends('app')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/create-plan.css"></link>

@stop

@section('content')
    <div id="create-plan-year-section">

        <h1 id="create-plan-year-title">Select Years</h1>

        <div id="create-plan-year-inputs">

            <select class="create-plan-years">
                <?php
                    foreach(range(date('Y'), (int)date("Y") + 10) as $startYear) {
                        echo "\t<option value='".$startYear."'>".$startYear."</option>\n\r";
                    }
                ?>
            </select>

            <p id="create-plan-year-separator"> - </p>

            <select class="create-plan-years">
                <?php
                foreach(range(date('Y') + 1, (int)date("Y") + 10) as $endYear) {
                    echo "\t<option value='".$endYear."'>".$endYear."</option>\n\r";
                }
                ?>
            </select>
        </div>

        {!! Form::open(array('action' => 'CreatePlanController@createBP')) !!}
        {!! Form::submit('Next', ['class' => 'create-plan-button']) !!}

    </div>
@stop
