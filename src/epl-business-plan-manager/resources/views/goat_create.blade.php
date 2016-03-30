<!DOCTYPE html>
<html lang="en">

    <head>
    </head>

    <body>
        <div class="view-goal-form">
            <h3>Create</h3>
            <hr>
            {!! Form::model($goat, ['method' => 'POST', 'action' => ['ViewPlanController@createGoat', $parentId]]) !!}
                    @include ('goat_form', ['submitButtonText' => 'Create'])
            {!! Form::close() !!}
        </div>
    </body>

</html>

