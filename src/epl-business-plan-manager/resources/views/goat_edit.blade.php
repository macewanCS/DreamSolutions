<!DOCTYPE html>
<html lang="en">

    <head>
    </head>

    <body>
        <div class="view-goal-form">
                <h3>Editing: {!! $goat->description!!}</h3>
                <hr>
                {!! Form::model($goat, ['method' => 'PATCH', 'action' => ['ViewPlanController@updateGoat', $goat->id]]) !!}
                        @include ('goat_form', ['submitButtonText' => 'Update'])
                {!! Form::close() !!}
        </div>
    </body>

</html>

