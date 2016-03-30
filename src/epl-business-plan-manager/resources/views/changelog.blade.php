@extends('app')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/changelog.css"></link>
<link rel="stylesheet" type="text/css" href="/css/jquery.dropdown.min.css"></link>
<script src="/js/jquery-1.12.1.min.js"></script>
<script src='/js/jquery.dropdown.min.js'></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script src="js/changelog.js"></script>
@stop

@section('content')

<div class="container">
    <div id="filter-bar">
        <ul id="filter-categories">
            <li>Filter by:</li>
            <li><a href='#' data-jq-dropdown="#date-dropdown">Date</a></li>
            <li><a href='#' data-jq-dropdown="#changetype-dropdown">Change Type</a></li>
            <li><a href='#' data-jq-dropdown="#deptteam-dropdown">Dept/Team</a></li>
            <li><a href='#' data-jq-dropdown="#user-dropdown">User</a></li>
        </ul>

        <button id="clear-filters" onclick="location.href='?'">Clear Filters</button>
        <button id="update-filters" >Update Filters</button>

    </div>
    <table id="change-table">
        <thead>
            <th>Date</th>
            <th style='white-space: nowrap'>Goal type</th>
            <th>Goal description</th>
            <th style='white-space: nowrap'>Change Type</th>
            <th>Change Description</th>
            <th>Dept/Team</th>
            <th style='white-space: nowrap'>User</th>
        </thead>
        <tbody>
            @foreach ($changes as $change)
            <tr>
                <td>{{ $change->created_at }}</td>
                <td>{{ ($change->goat->goal_type == 'B' ? "BP: " . ($change->goat->type == 'A' ? 'Action' : 'Task') : "Dept") }}
                <td>{{ $change->goat->description }}</td>
                <td>{{ $change->change_type == 'S' ? 'Status' : 'Note'}}</td>
                <td>{{ $change->description }}</td>
                <td>{{ $change->goat->department ? $change->goat->department->name : 'None'}}</td>
                <td style='white-space: nowrap'>{{ $change->user->name() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $changes->appends($query)->render() }}
</div>

<div id="date-dropdown" class="jq-dropdown jq-dropdown-tip">
    <div class="jq-dropdown-panel">
        From <input type="date" id="start-date" class="date-filter" value={{ array_key_exists('start', $query) ? $query['start'] : '' }}> 
        to <input type="date" id="end-date" class="date-filter" value={{ array_key_exists('end', $query) ? $query['end'] : '' }}>
    </div>
</div>

<div id="changetype-dropdown" class="jq-dropdown jq-dropdown-tip">
    <ul class="jq-dropdown-menu">
        <li><label><input name="changetype" type="radio" value='' {{ array_key_exists('type', $query) && $query['type'] ? '' : 'checked' }}/>All</label></li>
        <li><label><input name="changetype" type="radio" value='S' {{ array_key_exists('type', $query) && $query['type']  == 'S' ? 'checked' : '' }}/>Status</label></li>
        <li><label><input name="changetype" type="radio" value='N' {{ array_key_exists('type', $query) && $query['type']  == 'N' ? 'checked' : '' }}/>Note</label></li>
    </ul>
</div>

<div id="deptteam-dropdown" class="jq-dropdown jq-dropdown-tip">
    <div class="jq-dropdown-panel">
        <select class="select-multiple" id='deptteam-filter'>
            <option value="all">All</option>
          @foreach ($depts as $dept)
            <option value="{{ $dept->id }}" {{ array_key_exists('dept', $query) && $query['dept']  == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
          @endforeach
        </select>
    </div>
</div>

<div id="user-dropdown" class="jq-dropdown jq-dropdown-tip">
    <div class="jq-dropdown-panel">
        <select class="select-multiple" id='user-filter'>
                <option value="all">All</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ array_key_exists('user', $query) && $query['user']  == $user->id ? 'selected' : '' }}>{{ $user->name() }}</option>
            @endforeach
        </select>
    </div>
</div>
@stop