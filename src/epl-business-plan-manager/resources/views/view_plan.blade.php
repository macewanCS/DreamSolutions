@extends('app')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/view_plan.css"></link>
	<script src="public/js/jquery-1.12.1.min.js"></script>
	<script src="public/js/jquery.tablesorter.min.js"></script>
@stop

@section('content')
	
	<div id="view-plan-area">
		<table class="tablesorter">
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

				<tr class = {{ $goat->type == 'G' ? "goal" :
							   ($goat->type == 'O' ? "objective" :
							   ($goat->type == 'A' ? "action" :
							   ("task"))) }}>

				@if ($goat->type == 'G' || $goat->type == 'O')
					
					<td colspan="8">{{ $goat->description }}</td>
				
				@else

					<td>{{ $goat->priority }}</td>
					<td>{{ $goat->description }}</td>
					<td>Department</td>
					<td>IT Department</td>
					<td>Dan</td>
					<td>Vicky</td>
					<td>{{ $goat->due_date}}</td>
					@if ($goat->complete)
						<td>Complete</td>
					@else
						<td>In Progress</td>	
					@endif

				@endif

				</tr>

			@endforeach

			</tbody>
		</table>
	</div>

@stop