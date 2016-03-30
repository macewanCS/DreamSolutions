<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<h3>Edit: {!! $goat->description!!}</h3>

{!! Form::model($goat, ['method' => 'PATCH', 'action' => ['ViewPlanController@updateGoat', $goat->id]]) !!}
        @include ('goat_form', ['submitButtonText' => 'Create'])
{!! Form::close() !!}
</body> 
</html>

