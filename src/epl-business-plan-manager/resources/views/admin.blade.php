@extends('app')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/admin.css"></link>
<script src="/js/jquery-1.12.1.min.js"></script>
<script src="/js/admin.js"></script>
@stop

@section('content')

<div class="container">
    <div id="filter-bar">
        Find users in:
        <select id="select-dept">
        <option selected disabled></option>
        <option value=''>All</option>
        @foreach ($depts as $dept)
        <option value="{{$dept->id}}">{{$dept->name}}</option>
        @endforeach
        </select>
    </div>
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
                <td>
                @foreach ($user->departments as $dept)
                    {{ $dept->name . ($dept->pivot->permission_level == 'T' ? ': Lead' : '') }}
                @endforeach
                </td>
                <td>Active</td>
                <td><img src="images/edit.jpeg" width=20px height=20px /></td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {!! $users->appends($query)->render() !!}

</div>

@stop