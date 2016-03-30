<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<h3>Create</h3>

{!! Form::model($goat, ['method' => 'POST', 'action' => ['ViewPlanController@createGoat', $parentId]]) !!}
        @include ('goat_form', ['submitButtonText' => 'Create'])
{!! Form::close() !!}
</body> 
</html>

