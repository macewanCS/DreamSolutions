
    <h1>Create a new user</h1>

    {!! Form::model($user = new App\User, ['url' => '/admin/users']) !!}
        @include ('admin.user_form', ['submitButtonText' => 'Create User'])
    {!! Form::close() !!}