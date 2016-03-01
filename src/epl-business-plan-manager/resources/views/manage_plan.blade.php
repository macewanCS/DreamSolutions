@extends('app')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/manage_plan.css"></link>
    {!! Html::script('js/addTextBox.js') !!}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@stop

@section('content')
    <div id="manage-plan-area">

        <div style="height: 25px">
            <div style="float: left">
                <label>Business Plan Year: </label>
                <select>
                    <option>Load years here</option>
                </select>
            </div>

            <div style="float: right;">
                <a href="{{ action('WizardController@create') }}">Create Business Plan</a>
            </div>
        </div>

        <!-- Top level tab container for create, update, delete -->
        <div class="duc-tabs">
            <nav>
                <ul class="duc-tab-links">
                    <li class="active"><a data-toggle="tab" href="#create">Create</a></li>
                    <li><a data-toggle="tab" href="#update">Update</a></li>
                    <li><a data-toggle="tab" href="#delete">Delete</a></li>
                </ul>
            </nav>

            <div class="tab-content">
                <!-- partials go in here? How to override create, update, delete button? -->
                <div id="create" class="tab fade in active">
                    {!! Form::open() !!}
                        @include('partials/goat_tab_content', ['submitButton' => 'Create'])
                    {!! Form::close() !!}
                </div>

                <div id="update" class="tab fade">
                    {!! Form::open() !!}
                        @include('partials/goat_tab_content', ['submitButton' => 'Update'])
                    {!! Form::close() !!}
                </div>

                <div id="delete" class="tab fade">
                    {!! Form::open() !!}
                        @include('partials/goat_tab_content', ['submitButton' => 'Delete'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@stop
