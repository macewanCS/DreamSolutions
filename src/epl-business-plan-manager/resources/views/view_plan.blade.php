@extends('app')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/view_plan.css"></link>
@stop

@section('content')
	
	<div id="view-plan-area">
		<table>
			<thead>
			<th>Action</th>
			<th>Priority</th>
			<th>Task</th>
			<th>Goal Type</th>
			<th>Dept/Team</th>
			<th>Lead</th>
			<th>Collaborators</th>
			<th>Due Date</th>
			<th>Status</th>
			</thead>
			<tbody>
			@foreach ($bp as $goat)

				<tr>

				@if ($goat->type == 'G')
					
					<td colspan="9" id="goal">{{ $goat->description }}</td>
						
				@elseif ($goat->type == 'O')
					
					<td colspan="9" id="objective">{{ $goat->description }}</td>
				
				@elseif ($goat->type == 'A') 

					<td id="norm">{{ $goat->actionId }}</td>
					<td id="norm">{{ $goat->priority }}</td>
					<td id="norm">{{ $goat->description }}</td>
					<td id="norm">Department</td>
					<td id="norm">IT Department</td>
					<td id="norm">Lead</td>
					<td id="norm">John and Vicky</td>
					<td id="norm">{{ $goat->due_date}}</td>
					<td id="norm">In progress</td>

				@elseif ($goat->type == 'T')

					<td id="norm">{{ $goat->actionId }}</td>
					<td id="norm">{{ $goat->priority }}</td>
					<td id="norm">{{ $goat->description }}</td>
					<td id="norm">Department</td>
					<td id="norm">IT Department</td>
					<td id="norm">Lead</td>
					<td id="norm">John and Vicky</td>
					<td id="norm">{{ $goat->due_date}}</td>
					<td id="norm">In progress</td>

				@endif

				</tr>

			@endforeach

			</tbody>
		</table>
	</div>

@stop