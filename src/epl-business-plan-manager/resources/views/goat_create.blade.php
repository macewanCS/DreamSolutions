<!DOCTYPE html>
<html lang="en">

    <head>
    </head>

    <body>
        <div class="view-goal-form">

            @if ($goat->goat_level() == 1)
                <h3>Create: Goal</h3>
            @elseif ($goat->goat_level() == 2)
                <h3>Create: Objective</h3>
            @elseif ($goat->goat_level() == 3w)
                <h3>Create: Action</h3>
            @elseif ($goat->goat_level() == 4)
                <h3>Create: Task</h3>
            @endif

            <hr>
            {!! Form::model($goat, ['method' => 'POST', 'action' => ['ViewPlanController@createGoat', $parentId]]) !!}
                    @include ('goat_form', ['submitButtonText' => 'Create'])
            {!! Form::close() !!}
        </div>
    </body>

</html>

