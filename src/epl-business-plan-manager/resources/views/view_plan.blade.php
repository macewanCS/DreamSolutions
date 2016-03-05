@extends('app')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/view_plan.css"></link>
<script src="/js/jquery-1.12.1.min.js"></script>
<script src="/js/jquery.tablesorter.js"></script>
@stop

@section('content')

<div id="view-plan-area">
	<table id="view-plan-table">
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
						<!-- TODO: Check for overdue -->
						<td>In Progress</td>
					@endif

					@endif

				</tr>

				@endforeach

			</tbody>
		</table>
	</div>

	@stop