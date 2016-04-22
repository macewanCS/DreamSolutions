<table id="admin-manage-department-table">
    <thead id="admin-table-head">
        <th class="admin-table-heading">Name</th>
        <th class="admin-table-heading">Department</th>
        <th class="admin-table-heading">Team</th>
    </thead>

    <tr>
        <td>{!! Form::text('name', null) !!}</td>
        <td class="admin-radio-button">{!! Form::radio('isTeam', '0') !!}</td>
        <td class="admin-radio-button">{!! Form::radio('isTeam', '1') !!}</td>
    </tr>
</table>

<p>{!! Form::submit($submitButtonText, ['class' => 'admin-submit-button']) !!}</p>