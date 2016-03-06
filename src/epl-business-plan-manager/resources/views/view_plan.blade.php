@extends('app')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/view_plan.css"></link>
<script src="/js/jquery-1.12.1.min.js"></script>
<script src="/js/jquery.tablesorter.combined.js"></script>
<script>
$(function() {
	$("#view-plan-table").tablesorter({
		widgets : ["filter"],

		widgetOptions: {
			filter_columnFilters : true,
		}
	});

	$('button#reset').click(function() {
		$("#view-plan-table").trigger('sortReset').trigger('filterReset');
		return false;
	});

	$('#view-plan-table').bind('sortEnd', function() {
		$.tablesorter.setFilters( $('#view-plan-table'), ['A|T'], true);
	});
});

</script>
@stop

@section('content')

<div id="view-plan-area">
	<div id="filter-bar">
		{!! Form::button('Reset View', ['id' => 'reset']); !!}
	</div>
	<table id="view-plan-table">
		<thead>
			<th class="hidden">Goal Type</th>
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
			@foreach ($bp as $index => $goat)

			<tr class = {{ $goat->type == 'G' ? "goal" :
							($goat->type == 'O' ? "objective" :
							($goat->type == 'A' ? "action" :
							("task"))) }}>

					@if ($goat->type == 'G' || $goat->type == 'O')
					
						<td class="hidden">{{ $goat->type }}</td>
						<td colspan="8">{{ $goat->description }}</td>

					@else

						<td class="hidden">{{ $goat->type }}</td>
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