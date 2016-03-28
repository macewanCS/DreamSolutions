@extends('app')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/admin.css"></link>
@stop

@section('content')

<div class="container">
    <table id="users-table">
        <thead>
            <th>Username</th>
            <th>Name</th>
            <th>Departments/Teams</th>
            <th>Status</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <td>{{ $user->username }}</td>
                <td>{{ $user->name() }}</td>
                <td>None?</td>
                <td>Active</td>
                <td>abc</td>
            @endforeach
        </tbody>
    </table>


    {!! $users->render() !!}

</div>

@stop