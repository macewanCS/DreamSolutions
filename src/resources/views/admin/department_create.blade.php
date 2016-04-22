
    <h1 class="admin-heading">New Department/Team</h1>
    <hr>
    {!! Form::model($dept = new App\Department, ['url' => '/admin/depts']) !!}
        @include ('admin.department_form', ['submitButtonText' => 'Create'])
    {!! Form::close() !!}