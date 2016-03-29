@extends('app')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/admin.css"></link>
<script src="/js/jquery-1.12.1.min.js"></script>
<link href="//cdn.rawgit.com/noelboss/featherlight/1.4.0/release/featherlight.min.css" type="text/css" rel="stylesheet" />
@stop

@section('content')

<div class="container">
    <div id="filter-bar">
        <p><a href="/admin/users">Manage Users</a> | <a href="/admin/depts">Manage Departments</a></p>
        <p><a href="/admin/depts/create" data-featherlight="ajax">Create a new department or team</a></p>
    </div>
    <table id="admin-table">
        <thead>
            <th>Name</th>
            <th>Type</th>
            <th>Leads</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($depts as $dept)
            <tr>
                <td>{{ $dept->name }}</td>
                <td>{{ $dept->isTeam ? "Team" : "Department" }}</td>
                <td>
                @foreach ($dept->leads as $lead)
                    {!! $lead->name() !!} <br />
                @endforeach
                </td>
                <td><a href="/admin/depts/{{$dept->id}}/edit" data-featherlight="ajax"><img src="/images/edit.jpeg" width=20px height=20px /></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {!! $depts->render() !!}

</div>

<script src="//cdn.rawgit.com/noelboss/featherlight/1.4.0/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
@stop