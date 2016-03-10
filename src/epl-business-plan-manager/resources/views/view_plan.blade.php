@extends('app')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/view_plan.css"></link>
<link rel="stylesheet" type="text/css" href="/css/jquery.dropdown.min.css"></link>
<script src="/js/jquery-1.12.1.min.js"></script>
<script src="/js/jquery.tablesorter.combined.js"></script>
<script src='/js/jquery.dropdown.min.js'></script>

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
            <th colspan=3>Priority</th>
            <th>Task</th>
            <th>Type</th>
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
                    <td colspan="10">
                    @if ($goat->goal_type == 'B')
                    {{ $goat->type == 'G' ? "Goal : " : "Objective : " }}
                    @endif
                    {{$goat->description}}
                    </td>

                @else

                    <td class="hidden">{{ $goat->type }}</td>
                    <td class="caret"></td>
                    <td><!-- for goal/objective descriptions (otherwise with priority filter) --></td>
                    <td>{{ $goat->priority }}</td>
                    <td>{{ $goat->description }}</td>
                    <td style="white-space: nowrap;">{{ $goat->goal_type == 'B' ? 'Business Plan' : 'Department' }}</td>
                    <td style="white-space: nowrap;">IT Department</td>
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

                    <td><!-- blank space for edit buttons etc --></td>

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
        <li><label><input type="checkbox" col=3 filter='1'/>High</label></li>
        <li><label><input type="checkbox" col=3 filter='2'/>Medium</label></li>
        <li><label><input type="checkbox" col=3 filter='3'/>Low</label></li>
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
        Department searchable dropdown goes here
    </div>
</div>

<div id="lead-dropdown" class="jq-dropdown jq-dropdown-tip">
    <div class="jq-dropdown-panel">
        Person/department searchable dropdown goes here
    </div>
</div>

<div id="lead-dropdown" class="jq-dropdown jq-dropdown-tip">
    <div class="jq-dropdown-panel">
        Person/department searchable dropdown goes here
    </div>
</div>

<div id="collaborator-dropdown" class="jq-dropdown jq-dropdown-tip">
    <div class="jq-dropdown-panel">
        Person/department searchable dropdown goes here
    </div>
</div>

<div id="date-dropdown" class="jq-dropdown jq-dropdown-tip">
    <div class="jq-dropdown-panel">
        Start date picker, and also end date picker
    </div>
</div>

<div id="status-dropdown" class="jq-dropdown jq-dropdown-tip">
    <ul class="jq-dropdown-menu">
        <li><label><input type="checkbox" col=10 filter='In Progress'/>In Progress</label></li>
        <li><label><input type="checkbox" col=10 filter='Overdue'/>Overdue</label></li>
        <li><label><input type="checkbox" col=10 filter='Complete'/>Complete</label></li>
    </ul>
</div>

<script>
    var unsorted = true;
    var unfiltered = true;
    var filterDict = {};
    var filters = [];

    $(function() {
        $("#view-plan-table").tablesorter({
            duplicateSpan: false,
            widgets : ["filter"],
        });

        $('button#reset').click(function() {
            allowNesting(true);
            $('.hide-children').each(function() { $(this).removeClass('hide-children'); });
            $('.jq-dropdown :checkbox').each(function() { $(this).attr('checked', false); });
            $("#view-plan-table").trigger('sortReset').trigger('filterReset');
            expandAll();
            $('#goal-box').removeAttr('disabled');
            $('#objective-box').removeAttr('disabled');
            if ($('#goal-box').parent().parent().is("strike")) {
                $('#goal-box').parent().unwrap();
                $('#objective-box').parent().unwrap();
            }

            unsorted = true;
            unfiltered = true;
            filterDict = {};
            filters = [];
            return false;
        });

        $('#view-plan-table').bind('sortEnd', function() {
            if (unsorted) {
                allowNesting(false);
                expandAll();
                filters[0] = [];
                addFilters("0", ['A', 'T']);
                $('#goal-box').attr('disabled', true).parent().wrap("<strike>");
                $('#objective-box').attr('disabled', true).parent().wrap("<strike>");
                $('#action-box').prop('checked', true);
                $('#task-box').prop('checked', true);
                $('#view-plan-table').trigger('search', [filters]);
                unsorted = false;
            }
        });

        $('.jq-dropdown :checkbox').change(function() {
            if (unfiltered)
                allowNesting(false);

            if (this.checked) {
                addFilters($(this).attr('col'), [$(this).attr('filter')]);
                unfiltered = false;
            } else {
                removeFilters($(this).attr('col'), [$(this).attr('filter')]);
                if (allEmpty(filters) && unsorted) {
                    unfiltered = true;
                    allowNesting(true);
                }
            }

            if ( !unsorted && filters[0] == "") filters[0] = "A|T";
            $('#view-plan-table').trigger('search', [filters]);

        });

        function allEmpty($array) {
            var result = true;
            $.each($array, function(i, val) {
                if (val != "" && val != undefined) {
                    result = false;
                    return false;
                }
            });
            return result;
        }

        function allowNesting($bool) {
            if ($bool) {
                $('td.down-caret').each(function() { $(this).removeClass('down-caret'); } );
                $('td.no-caret').each(function() { $(this).removeClass('no-caret'); $(this).addClass('caret'); });
            } else {
                $('td.caret').each(function() { $(this).removeClass('caret'); $(this).addClass('no-caret'); })
            }
        }
    });

    function addFilters($key, $values) {
        if ( !($key in filterDict) ) {
            filterDict[$key] = {};
        }

        $.each( $values, function(i, val) {
            filterDict[$key][val] = true;
        });

        filterDictToFilters();
    }

    function removeFilters($key, $values) {
        $.each( $values, function(i, val) {
            delete filterDict[$key][val];
        });

        filterDictToFilters();
    }

    function filterDictToFilters() {
        // flatten dictionary "set" into array
        var array = [];

        $.each(filterDict, function(i, val) {
            array[i] = Object.keys(val);
        });

        // connect different "set" elements with '|' (or)
        $.each(array, function(i, val) {
            if (array[i] != undefined) filters[i] = val.join('|');
        });
    }

    function expandAll() {
        $('#view-plan-table tbody').find('tr').each(function() {
            $(this).removeClass('hidden');
        });
    }

    function getHierarchy($row) {
        if      ($row.hasClass('goal')) return 0;
        else if ($row.hasClass('objective')) return 1;
        else if ($row.hasClass('action')) return 2;
        else if ($row.hasClass('task')) return 3;
    }

    $(document).ready(function() {
        $('tr.goal, tr.objective, tr.action').click(function() {
            if (unsorted && unfiltered) {
                var show = true;
                $(this).toggleClass('hide-children');
                if ($(this).hasClass('hide-children'))
                    show = false;

                $(this).children('td').eq(1).toggleClass('down-caret');
                $level = getHierarchy($(this));
                $row = $(this).next();
                while ( $level - getHierarchy($row) < 0 ) {
                    if ($row.hasClass('hide-children') && show) {
                        $row.removeClass('hidden');
                        var skip_until = getHierarchy($row);
                        $row = $row.next();
                        while (skip_until - getHierarchy($row) < 0) $row = $row.next();
                    } else {
                        $row.toggleClass('hidden', !show);
                        $row = $row.next();
                    }
                }
            }
        });
    });
</script>
@stop