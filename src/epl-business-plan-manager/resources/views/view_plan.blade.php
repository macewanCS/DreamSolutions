@extends('app')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/view_plan.css"></link>
<link rel="stylesheet" type="text/css" href="/css/jquery.dropdown.min.css"></link>
<script src="/js/jquery-1.12.1.min.js"></script>
<script src="/js/jquery.tablesorter.combined.js"></script>
<script src='/js/jquery.dropdown.min.js'></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script src="js/view.plan.js"></script>
<script src="//cdn.rawgit.com/noelboss/featherlight/1.4.0/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
<link href="//cdn.rawgit.com/noelboss/featherlight/1.4.0/release/featherlight.min.css" type="text/css" rel="stylesheet" />

@stop

@section('content')

<div id="view-plan-area">
    <div id="filter-bar">
        <ul id="filter-categories">
            <li>Filter by:</li>
            <li><a href='#' data-jq-dropdown="#hierarchy-dropdown">Hierarchy</a></li>
            <li><a href='#' data-jq-dropdown="#priority-dropdown">Priority</a></li>
            <li><a href='#' data-jq-dropdown="#goaltype-dropdown">Goal Type</a></li>
            <li><a href='#' data-jq-dropdown="#deptteam-dropdown">Dept/Team</a></li>
            <li><a href='#' data-jq-dropdown="#lead-dropdown">Lead</a></li>
            <li><a href='#' data-jq-dropdown="#collaborator-dropdown">Collaborator</a></li>
            <li><a href='#' data-jq-dropdown="#date-dropdown">Due date</a></li>
            <li><a href='#' data-jq-dropdown="#status-dropdown">Status</a></li>
        </ul>
        {!! Form::button('Reset View', ['id' => 'reset']); !!}
    </div>
    <table id="view-plan-table">
        <thead>
            <th class="hidden">Goal Type</th>
            <th colspan=3 class="sorter-priority">Priority</th>
            <th>Task</th>
            <th class="hidden"></th>
            <th>Dept/Team</th>
            <th>Lead</th>
            <th>Collab</th>
            <th>Due</th>
            <th colspan=2>Status</th>
        </thead>
        <tbody>
            @foreach ($bp as $index => $goat)

            <tr class = "{{ $goat->type == 'G' ? "goal" :
                           ($goat->type == 'O' ? "objective" :
                           ($goat->type == 'A' ? "action" :
                           ("task"))) }} {{ ($goat->goal_type == 'B' ? 'goat-bp' : 'goat-dept')}}">

                @if ($goat->type == 'G' || $goat->type == 'O')
                    <td class="hidden">{{ $goat->type }}</td>
                    <td class="caret"></td>
                    <td colspan="9">
                    @if ($goat->goal_type == 'B')
                    {{ $goat->type == 'G' ? "Goal : " : "Objective : " }}
                    @endif
                    {{$goat->description}}
                    </td>
                    <td>
                    </td>

                @else

                    <td class="hidden">{{ $goat->type }}</td>
                    <td class="caret"></td>
                    <td><!-- for goal/objective descriptions (otherwise with priority filter) --></td>
                    <td class="priority-{{$goat->priority}}">{{ ' HML'[min([$goat->priority, 3])] }}</td>
                    <td>{{ $goat->description }}</td>
                    <td class="hidden">{{ $goat->goal_type == 'B' ? 'Business Plan' : 'Department' }}</td>
                    <td style="white-space: nowrap;">{{ $goat->department ? $goat->department->name : 'None' }}</td>
                    <!-- TODO: turn into lists -->
                    <td style="white-space: nowrap;">@foreach ($goat->userLeads as $user) {{ $user->name() }} <br>@endforeach</td>
                    <td style="white-space: nowrap;">@foreach ($goat->userCollaborators as $user) {{ $user->name() }} <br>@endforeach</td>
                    <td style="white-space: nowrap;">{{ $goat->due_date}}</td>

                    <td style="white-space: nowrap;">
                    @if ($goat->complete)
                        <span class='complete'>Complete</span>
                    @elseif ($goat->due_date < Carbon\Carbon::now() )
                        <span class='overdue'>Overdue</span>
                    @else
                        <span class='in-progress'>In Progress</span>
                    @endif
                    </td>

                    <td style="white-space: nowrap;">
                        <a href="/view/{{ $goat->id }}" data-featherlight="ajax"><img src="images/note.png" width=15px height=15px></a>
                        @if (in_array($goat->department_id, $leadOf))
                        <img src="images/edit.png" width=15px height=15px>  
                        @endif

                    </td>

                @endif

            </tr>

            @endforeach

        </tbody>
    </table>
</div>


<div id="hierarchy-dropdown" class="jq-dropdown jq-dropdown-tip">
    <ul class="jq-dropdown-menu">
        <li><label><input type="checkbox" col=0 filter='G' id="goal-box"/>Goal</label></li>
        <li><label><input type="checkbox" col=0 filter='O' id="objective-box"/>Objective</label></li>
        <li><label><input type="checkbox" col=0 filter='A' id="action-box"/>Action</label></li>
        <li><label><input type="checkbox" col=0 filter='T' id="task-box"/>Task</label></li>
    </ul>
</div>

<div id="priority-dropdown" class="jq-dropdown jq-dropdown-tip">
    <ul class="jq-dropdown-menu">
        <li><label><input type="checkbox" col=3 filter='H'/>High</label></li>
        <li><label><input type="checkbox" col=3 filter='M'/>Medium</label></li>
        <li><label><input type="checkbox" col=3 filter='L'/>Low</label></li>
    </ul>
</div>

<div id="goaltype-dropdown" class="jq-dropdown jq-dropdown-tip">
    <ul class="jq-dropdown-menu">
        <li><label><input type="checkbox" col=5 filter='Business Plan' />Business Plan</label></li>
        <li><label><input type="checkbox" col=5 filter='Department'/>Department</label></li>
    </ul>
</div>

<div id="deptteam-dropdown" class="jq-dropdown jq-dropdown-tip">
    <div class="jq-dropdown-panel">
        <select class="user-select-multiple" col='6' multiple="multiple">
          @foreach ($depts as $dept)
            <option value="{{ $dept->name }}">{{ $dept->name }}</option>
          @endforeach
        </select>
    </div>
</div>

<div id="lead-dropdown" class="jq-dropdown jq-dropdown-tip">
    <div class="jq-dropdown-panel">
        <select class="user-select-multiple" col='7' multiple="multiple">
          @foreach ($users as $user)
            <option value="{{ $user->name() }}">{{ $user->name() }}</option>
          @endforeach
        </select>
    </div>
</div>

<div id="collaborator-dropdown" class="jq-dropdown jq-dropdown-tip">
    <div class="jq-dropdown-panel">
        <select class="user-select-multiple" col='8' multiple="multiple">
            @foreach ($users as $user)
                <option value="{{ $user->name() }}">{{ $user->name() }}</option>
            @endforeach
        </select>
    </div>
</div>

<div id="date-dropdown" class="jq-dropdown jq-dropdown-tip">
    <div class="jq-dropdown-panel">
        From <input type="date" id="from-date" class="date-filter" col='9'> 
        to <input type="date" id="to-date" class="date-filter" col='9'>
    </div>
</div>

<div id="status-dropdown" class="jq-dropdown jq-dropdown-tip">
    <ul class="jq-dropdown-menu">
        <li><label><input type="checkbox" col=10 filter='In Progress'/>In Progress</label></li>
        <li><label><input type="checkbox" col=10 filter='Overdue'/>Overdue</label></li>
        <li><label><input type="checkbox" col=10 filter='Complete'/>Complete</label></li>
    </ul>
</div>
@stop