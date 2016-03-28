@extends('app')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/dashboard.css"></link>
@stop

@section('content')

	<div id="profile">

		<div id="profile-right" >

		<h2 style="margin-left: 5px">Hello, {{$user->first_name}}</h2>
			<h3 style="margin-left: 5%">Your Tasks:</h3>

			<table id="todo">
				<thead>
				<tr>
					<th>Task</th>
					<th>Due Date</th>
					<th>Status</th>
					<th></th>
				</tr>
				</thead>
				<tbody>

					@if ($tasksEmpty)
					<tr>
						<td colspan="4" style="padding-left: 315px;"><h4>You have no assigned tasks at the moment</h4></td>
					</tr>
					@endif
					@foreach ($tasks as $task)

					@if (!$task->complete)
						<tr>
						<td>{{ $task->description }}</td>
						<td>{{ $task->due_date }}</td>
						<td style="white-space: nowrap;">In progress</td>
						<td><a href="edit/{{$task->id}}"><img src="images/edit.jpeg" alt="edit" title="edit" height="20px" width="20px"></a></td>


						@endif
						</tr>
					@endforeach
				</tbody>
			</table><br><br>

			<h3 style="margin-left: 5%">Your Activity:</h3>
			<table id="recent">
				<thead>
				<tr>
					<th>Task</th>
					<th>Update</th>
					<th>Date</th>
					<!-- <th></th> -->
				</tr>
				</thead>
				<tbody>
					@if ($recentEmpty)
					<tr>
						<td colspan="3" style="padding-left: 360px;"><h4>No recent activity to show</h4></td>
					</tr>
					@endif
					@foreach ($recent as $task)
					<tr>
						<td>{{$task->task}}</td>
						<td>{{$task->description}}</td>
						<td>{{ Carbon\Carbon::parse($task->updated_at)}}	</td>
						<!-- <td><a href="edit/{{$task->goat_id}}"><img src="images/edit.jpeg" alt="edit" title="edit" height="20px" width="20px"></a></td> -->
					</tr>
					@endforeach
				</tbody>
			</table>



		</div>

	</div>


@stop
