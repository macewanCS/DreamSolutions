
    <h1 class="admin-heading">Editing: {!! $dept->name !!}</h1>
    <hr>
    {!! Form::model($dept, ['method' => 'PATCH', 'action' => ['DepartmentController@update', $dept->id]]) !!}
        @include ('admin.department_form', ['submitButtonText' => 'Update'])
    {!! Form::close() !!}