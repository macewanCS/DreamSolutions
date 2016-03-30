
    <h1 class="admin-heading">New User</h1>
    <hr>
    {!! Form::model($user = new App\User, ['url' => '/admin/users']) !!}
        @include ('admin.user_form', ['submitButtonText' => 'Create', 'users' => $users])
    {!! Form::close() !!}