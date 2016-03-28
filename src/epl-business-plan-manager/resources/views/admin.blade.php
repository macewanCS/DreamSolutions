@extends('app')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/admin.css"></link>
@stop

@section('content')

<div class="container">
    <table id="users-table">
        <thead>
            <th><a href="?sort=username">Username</a></th>
            <th><a href="?sort=name">Name</th>
            <th>Departments/Teams</a></th>
            <th>Status</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name() }}</td>
                <td>None?</td>
                <td>Active</td>
                <td><img src="images/edit.jpeg" width=20px height=20px /></td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {!! $users->appends($query)->render() !!}

</div>

@stop