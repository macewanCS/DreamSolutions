
<div>
{!! Form::label('first_name', 'First name:') !!}
{!! Form::text('first_name', null) !!}
</div>

<div>
{!! Form::label('last_name', 'Last name:') !!}
{!! Form::text('last_name', null) !!}
</div>

<div>
{!! Form::label('username', 'Username:') !!}
{!! Form::text('username', null) !!}
</div>

<div>
{!! Form::label('password', 'Password:') !!}
{!! Form::password('password', null) !!}
</div>

<div>
{!! Form::label('email', 'Email:') !!}
{!! Form::text('email', null) !!}


<h2>Permissions</h2>
{!! Form::label('bp_lead', 'BP Lead?') !!}
{!! Form::checkbox('bp_lead') !!}

<table>
    <thead>
        <th>Department</th>
        <th>Lead</th>
        <th>Member</th>
        <th>None</th>
    </thead>
    <tbody>
@foreach ($depts as $dept)
    <tr>
    <td>{!! Form::label($dept->name, $dept->name) !!}</td>
    <td>{!! Form::radio($dept->id, 'T', $user->permission($dept) == 'T') !!}</td>
    <td>{!! Form::radio($dept->id, 'M', $user->permission($dept) == 'M') !!}</td>
    <td>{!! Form::radio($dept->id, '', !$user->permission($dept)) !!}</td>
    </tr>
@endforeach
    </tbody>
</table>


<p>{!! Form::submit($submitButtonText) !!}</p>