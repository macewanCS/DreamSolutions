
    <h3>Edit: {!! $dept->name !!}</h3>

    {!! Form::model($dept, ['method' => 'PATCH', 'action' => ['DepartmentController@update', $dept->id]]) !!}
        @include ('admin.department_form', ['submitButtonText' => 'Update'])
    {!! Form::close() !!}