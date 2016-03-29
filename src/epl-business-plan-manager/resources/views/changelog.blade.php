@extends('app')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/changelog.css"></link>
@stop

@section('content')

<div class="container">
    <div id="filter-bar">
    </div>
    <table id="change-table">
        <thead>
            <th>Date</th>
            <th style='white-space: nowrap'>Goal type</th>
            <th>Goal description</th>
            <th style='white-space: nowrap'>Change Type</th>
            <th>Change Description</th>
            <th style='white-space: nowrap'>User</th>
        </thead>
        <tbody>
            @foreach ($changes as $change)
            <tr>
                <td style='white-space: nowrap'>{{ $change->created_at->toDateString() }}</td>
                <td>{{ ($change->goat->goal_type == 'B' ? "BP: " . ($change->goat->type == 'A' ? 'Action' : 'Task') : "Dept") }}
                <td>{{ $change->goat->description }}</td>
                <td>{{ $change->change_type == 'S' ? 'Status' : 'Note'}}</td>
                <td>{{ $change->description }}</td>
                <td style='white-space: nowrap'>{{ $change->user->name() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $changes->render() }}
</div>

@stop