@extends('app')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/dashboard.css"></link>
@stop

@section('content')

	<div id="profile">


		<div id="profile-right">

			

			<h3 style="margin-left: 5%">My Tasks:</h3>

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
						<td><a href="edit/{{$task->id}}"><img src="images/edit.jpeg" alt="edit" title="edit" height="20px" widht="20px"></a></td>


						@endif
						</tr>
					@endforeach
				</tbody>
			</table><br><br>

			<h3 style="margin-left: 5%">Recent Activity:</h3>
			<table id="recent">
				<thead>
				<tr>
					<th>Task</th>
					<th>Due Date</th>
					<th>Status</th>
					<th></th>
				</tr>
				</thead>
				<tbody>

					<td><p> Implement approved recommendations from the 2015 Public Computing Report</p></td>
					<td>2016/06/30</td>
					<td>Implemented #7</td>
					<td><a href="edit/{{$task->id}}"><img src="images/edit.jpeg" alt="edit" title="edit" height="20px" widht="20px"></a></td>
				</tbody>
			</table>

		
			
		</div>

	</div>
	

@stop
