
    <h3>Create a new department or team</h3>

    {!! Form::model($dept = new App\Department, ['url' => '/admin/depts']) !!}
        @include ('admin.department_form', ['submitButtonText' => 'Create'])
    {!! Form::close() !!}