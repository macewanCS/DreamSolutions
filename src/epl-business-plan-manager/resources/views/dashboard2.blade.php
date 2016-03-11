@extends('app')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/dashboard2.css"></link>
@stop

@section('content')

	<div id="profile">
	<div id="profile-left">
		<div id="profile-info">
			<img src="images/user_pics/{{$pic}}.jpg" alt="profile picture" height=200 width=200>
			<h3> {{ $user->first_name }}  {{ $user->last_name }} </h3>

			<h4> {{ $dept[0]->name }} </h4>
		</div>

			<div id="profile-stats">
				<h2 style="color: blue; padding-top: 20px;"> {{ $user->in_progress }} </h2>
					<h5> In Progress </h5>
				<h2 style="color: green;"> {{ $user->completed }} </h2>
				<h5> Completed </h5>
				<h2 style="color: red;"> {{ $user->overdue }} </h2>
				<h5> Overdue </h5>
			</div>

			
		</div>

			<div id="profile-right">
				<h2 style="margin-left: 5%">Tasks in Progress</h2>
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

						@foreach ($tasks as $task)

						@if (!$task->complete)
							<tr>
							<td><p>{{ $task->description }}</p></td>
							<td>{{ $task->due_date }}</td>
							<td style="white-space: nowrap;">In progress</td>
							<td><img src="images/edit.jpeg" alt="edit" title="edit" height="20px" widht="20px"></td>


							@endif
							</tr>
						@endforeach
					</tbody>
				</table><br><br>

				<h2 style="margin-left: 5%">Recent Activity</h2>
				<table id="recent">
					<thead>
					<tr>
						<th>Task</th>
						<th>Due Date</th>
						<th>Status</th>
					</tr>
					</thead>
					<tbody>

						<td><p> Implement approved recommendations from the 2015 Public Computing Report</p></td>
						<td>2016/06/30</td>
						<td>Implemented #7</td>
					</tbody>
				</table>

			</div>
			</div>
		

@stop
