<table>

    <tr>
        <td class="view-form-label">{!! Form::label('department', 'Department: ') !!}</td>
        <td>
        <select name='department'   >
        @if (Auth::user()->is_bplead)
            @foreach (App\Department::all() as $dept)
            <option value={{$dept->id}} {{ $goat->department_id == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
            @endforeach
        @elseif ($goat->type == 'A')
            @foreach (Auth::user()->leadOf as $dept)
            <option value={{ $dept->id }}>{{ $dept->name }}</option>
            @endforeach
        @elseif ($goat->department_id)
            <option value={{ $goat->department_id}} selected>{{ $goat->department->name }}</option>
        @else
            <option value={{ $goat->parent->department_id}} selected>{{ $goat->parent->department->name }}</option>
        @endif
        </select>
        </td>
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


        @if ($goat->goat_level() == 3 || $goat->goat_level() == 4)
            <tr>
                <td class="view-form-label">{!! Form::label('success_measure', 'Success Measure: ') !!}</td>
                <td>{!! Form::textarea('success_measure', null, ['class' => 'view-form-textarea', 'rows' => '4', 'cols' => '45']) !!}</td>
            </tr>
        @endif

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