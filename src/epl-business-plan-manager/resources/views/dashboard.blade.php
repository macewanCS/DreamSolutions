@extends('app')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/dashboard.css"></link>
@stop

@section('content')
	
	<div id="profile-left">
		<div id="profile-info">
			<img src="images/empty-profile.jpg" alt="profile picture" height=200 width=200>
			<h3> {{ $user->first_name }}  {{ $user->last_name }} </h3>
			<h4> IT Department </h4>
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
				</tr>
				</thead>
				<tbody>
					
					@foreach ($tasks as $task)
						<tr>
						<td><p>{{ $task->description }}</p></td>
						<td>{{ $task->due_date }}</td>
						
						@if (!$task->complete)
				        	<td>In progress</td>
				        
				        @else
				        	<td>Complete</td>
				        
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
					
					<td><p> Implement approved recommendations fro mthe 2015 Public Computing Report</p></td>
					<td>2016/06/30</td>
					<td>Implemented #7</td>
				</tbody>
			</table>
		</div>
	</div>	
@stop
