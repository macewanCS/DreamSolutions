
    <h1 class="admin-heading">Editing: {!! $user->name() !!}</h1>
    <hr>
    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
        @include ('admin.user_form', ['submitButtonText' => 'Update'])
    {!! Form::close() !!}