@extends('app')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/view_plan.css"></link>
@stop

@section('content')
	
	<div id="view-plan-area">
		<table>
			<thead>
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
					
					<td colspan="8" id="goal">{{ $goat->description }}</td>
						
				@elseif ($goat->type == 'O')
					
					<td colspan="8" id="objective">{{ $goat->description }}</td>
				
				@elseif ($goat->type == 'A') 

					<td id="action">{{ $goat->priority }}</td>
					<td id="action">{{ $goat->description }}</td>
					<td id="action">Department</td>
					<td id="action">IT Department</td>
					<td id="action">Dan</td>
					<td id="action">Vicky</td>
					<td id="action">{{ $goat->due_date}}</td>
					@if ($goat->complete)
						<td id="action">Complete</td>
					@elseif (!$goat->complete)
						<td id="action">In Progress</td>	
					@endif

				@elseif ($goat->type == 'T')

					
					<td id="norm">{{ $goat->priority }}</td>
					<td id="norm">{{ $goat->description }}</td>
					<td id="norm">Department</td>
					<td id="norm">IT Department</td>
					<td id="norm">Vicky</td>
					<td id="norm">John</td>
					<td id="norm">{{ $goat->due_date}}</td>
					@if ($goat->complete)
						<td id="norm">Complete</td>
					@elseif (!$goat->complete)
						<td id="norm">In Progress</td>	
					@endif

				@endif

				</tr>

			@endforeach

			</tbody>
		</table>
	</div>

@stop