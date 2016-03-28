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
						<td><a href="edit/{{$task->id}}"><img src="images/edit.jpeg" alt="edit" title="edit" height="20px" width="20px"></a></td>


						@endif
						</tr>
					@endforeach
				</tbody>
			</table><br><br>

			<h3 style="margin-left: 5%">My Recent Activity:</h3>
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
					@foreach ($recent as $task)
					<tr>
						<td><p>{{$task->task}}</p></td>
						<td><p>{{$task->description}}</p></td>
						<td>{{ Carbon\Carbon::parse($task->updated_at)}}	</td>
						<!-- <td><a href="edit/{{$task->goat_id}}"><img src="images/edit.jpeg" alt="edit" title="edit" height="20px" width="20px"></a></td> -->
					</tr>
					@endforeach
				</tbody>
			</table>

		
			
		</div>

	</div>
	

@stop
