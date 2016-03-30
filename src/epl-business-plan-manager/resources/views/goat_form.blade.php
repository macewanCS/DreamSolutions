<table>

    <tr>
        <td class="view-form-label">{!! Form::label('department', 'Department: ') !!}</td>
        <td>{!! Form::label('department', Auth::user()->leadOf()->first()->name) !!}</td>
    </tr>

    @if ($goat->goat_level() == 1)
        <tr>
            <td class="view-form-label">{!! Form::label('goal', 'Goal:') !!}</td>
            <td>{!! Form::textarea('description', null, ['class' => 'view-form-textarea', 'rows' => '4', 'cols' => '45']) !!}</td>
        </tr>
    @endif

    @if ($goat->goat_level() > 1)
        <tr>
            <td class="view-form-label">{!! Form::label('goal', 'Goal:') !!}</td>
            <td>{!! Form::label('description', $goat->get_parent(1)->description) !!}</td>
        </tr>
    @endif

    @if ($goat->goat_level() == 2)
        <tr>
            <td class="view-form-label">{!! Form::label('objective', 'Objective: ') !!}</td>
            <td>{!! Form::textarea('description', null, ['class' => 'view-form-textarea', 'rows' => '4', 'cols' => '45']) !!}</td>
        </tr>
    @endif

    @if ($goat->goat_level() > 2)
        <tr>
            <td class="view-form-label">{!! Form::label('objective', 'Objective: ') !!}</td>
            <td>{!! Form::label('objective', $goat->get_parent(2)->description) !!}</td>
        </tr>
    @endif

    @if ($goat->goat_level() == 3)
        <tr>
            <td class="view-form-label">{!! Form::label('action', 'Action: ') !!}</td>
            <td>{!! Form::textarea('description', null, ['class' => 'view-form-textarea', 'rows' => '4', 'cols' => '45']) !!}</td>
        </tr>
    @endif

    @if ($goat->goat_level() > 3)
        <tr>
            <td class="view-form-label">{!! Form::label('action', 'Action: ') !!}</td>
            <td>{!! Form::label('action', $goat->get_parent(3)->description) !!}</td>
        </tr>
    @endif

    @if ($goat->goat_level() == 4)
        <tr>
            <td class="view-form-label">{!! Form::label('task', 'Task: ') !!}</td>
            <td>{!! Form::textarea('description', null, ['class' => 'view-form-textarea', 'rows' => '4', 'cols' => '45']) !!}</td>
        </tr>
    @endif


    @if ($goat->goat_level() >= 3)
        <tr>
            <td class="view-form-label">Leads:</td>
            <td>
                <select name="leads[]" class="select-multiple view-form-select" multiple="multiple">
                  @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $goat->userLeads->contains($user) ? 'selected' : '' }}>{{ $user->name() }}</option>
                  @endforeach
                </select>
            </td>
        </tr>

        <tr>
            <td class="view-form-label">Collaborators:
            <td>
                <select name="collabs[]" class="select-multiple view-form-select" multiple="multiple">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $goat->userCollaborators->contains($user) ? 'selected' : '' }}>{{ $user->name() }}</option>
                @endforeach
                </select>
            </td>
        </tr>

        <tr>
            <td class="view-form-label">{!! Form::label('due_date', 'Due date: ') !!}</td>
            <td>{!! Form::date('due_date', null) !!}</td>
        </tr>
        <tr>
            <td class="view-form-label">{!! Form::label('priority', 'Priority: ') !!}</td>
            <td>{!! Form::select('priority', array('1' => 'High', '2' => 'Medium', '3' => 'Low'), [ 'class' => 'view-form-select']) !!}</td>
        </tr>
    @endif
</table>

<p>{!! Form::submit($submitButtonText, ['class' => 'view-form-button']) !!}</p>