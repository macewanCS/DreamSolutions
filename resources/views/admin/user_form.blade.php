<h2 class="admin-sub-heading">Personal Information</h2>

<div class="admin-input-area">
    <div>
        <span class="admin-label">
            {!! Form::label('first_name', 'First name:') !!}
        </span>

        {!! Form::text('first_name', null) !!}
    </div>

    <div>
        <span class="admin-label">
            {!! Form::label('last_name', 'Last name:') !!}
        </span>

            {!! Form::text('last_name', null) !!}
    </div>

    <div>
        <span class="admin-label">
            {!! Form::label('username', 'Username:') !!}
        </span>
        {!! Form::text('username', null) !!}
    </div>

    <div>
        <span class="admin-label">
            {!! Form::label('password', 'Password:') !!}
        </span>

        {!! Form::password('password', null) !!}
    </div>

    <div>
        <span class="admin-label">
            {!! Form::label('email', 'Email:') !!}
        </span>

        {!! Form::text('email', null) !!}
    </div>
</div>

<h2 class="admin-sub-heading">Permissions</h2>
{!! Form::label('bp_lead', 'BP Lead?') !!}
{!! Form::checkbox('bp_lead') !!}

<table>
    <thead id="admin-table-head">
        <th>Department</th>
        <th>Lead</th>
        <th>Member</th>
        <th>None</th>
    </thead>
    <tbody>
@foreach ($depts as $dept)
    <tr>
    <td>{!! Form::label($dept->name, $dept->name) !!}</td>
    <td class="admin-radio-button">{!! Form::radio($dept->id, 'T', $user->permission($dept) == 'T') !!}</td>
    <td class="admin-radio-button">{!! Form::radio($dept->id, 'M', $user->permission($dept) == 'M') !!}</td>
    <td class="admin-radio-button">{!! Form::radio($dept->id, '', !$user->permission($dept)) !!}</td>
    </tr>
@endforeach
    </tbody>
</table>


<p>{!! Form::submit($submitButtonText, ['class' => 'admin-submit-button']) !!}</p>