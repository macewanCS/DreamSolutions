<div>
    {!! Form::label('department', 'Department: ') !!}
    {!! Form::label('department', Auth::user()->leadOf()->first()->name) !!}
</div>

    @if ($goat->goat_level() == 1)
    <div>
        {!! Form::label('goal', 'Goal:') !!}
        {!! Form::textarea('description', null) !!}
    </div>
    @endif

    @if ($goat->goat_level() > 1)
    <div>
        {!! Form::label('goal', 'Goal:') !!}
        {!! Form::label('description', $goat->get_parent(1)->description) !!}
    </div>
    @endif

    @if ($goat->goat_level() == 2)
    <div>
        {!! Form::label('objective', 'Objective: ') !!}
        {!! Form::textarea('description', null) !!}
    </div>
    @endif

    @if ($goat->goat_level() > 2)
    <div>
        {!! Form::label('objective', 'Objective: ') !!}
        {!! Form::label('objective', $goat->get_parent(2)->description) !!}
    </div>
    @endif

    @if ($goat->goat_level() == 3)
    <div>
    {!! Form::label('action', 'Action: ') !!}
    {!! Form::textarea('description', null) !!}
    </div>
    @endif

    @if ($goat->goat_level() > 3)
    <div>
    {!! Form::label('action', 'Action: ') !!}
    {!! Form::label('action', $goat->get_parent(3)->description) !!}
    </div>
    @endif

    @if ($goat->goat_level() == 4)
    <div>
    {!! Form::label('task', 'Task: ') !!}
    {!! Form::textarea('description', null) !!}
    </div>
    @endif


    @if ($goat->goat_level() >= 3)
    <div>
    Leads:
    <select name="leads[]" class="select-multiple" multiple="multiple">
      @foreach ($users as $user)
        <option value="{{ $user->id }}" {{ $goat->userLeads->contains($user) ? 'selected' : '' }}>{{ $user->name() }}</option>
      @endforeach
    </select>
    </div>

    <div>
    Collaborators:
    <select name="collabs[]" class="select-multiple" multiple="multiple">
      @foreach ($users as $user)
        <option value="{{ $user->id }}" {{ $goat->userCollaborators->contains($user) ? 'selected' : '' }}>{{ $user->name() }}</option>
      @endforeach
    </select>
    </div>

    <div>
    {!! Form::label('due_date', 'Due date: ') !!}
    {!! Form::date('due_date', null) !!}
    </div>

    <div>
    {!! Form::label('priority', 'Priority: ') !!}
    {!! Form::select('priority', array('1' => 'High', '2' => 'Medium', '3' => 'Low')) !!}
    </div>
    @endif

    <p>{!! Form::submit($submitButtonText) !!}</p>
</div>