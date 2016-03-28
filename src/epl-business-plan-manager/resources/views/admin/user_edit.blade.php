
    <h1>Edit: {!! $user->name() !!}</h1>

    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
        @include ('admin.user_form', ['submitButtonText' => 'Update User'])
    {!! Form::close() !!}