@extends('app')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/edit.css"></link>
@stop

@section('content')

	<div id="edit-content">
		
		<div id="left">
			<table style="width: 550px">
				<tbody>
					@foreach($fields as $field)
						<tr>
							<td style="padding: 10px 20px; width: 100px">{{ $field[0] }}:</td>
							<td>{{ $field[1] }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div id="right">

			@if ($needsResize)
				<table style="overflow-y:scroll; height:250px; display:block; scroll-behavior: smooth;">
			@else
				<table>
			@endif
				<thead>
					<tr>
						<th>Update</th>
						<th>Author</th>
						<th width="50px">Type</th>
						<th width="100px">Date</th>
					</tr>
				</thead>
				<tbody>
					@if ($empty)
					<tr>
						<td colspan="4" style="padding-left: 145px;"><h4>No activity for this task yet</h4></td>
					</tr>
					@endif
					@foreach ($changes as $change)
						<tr>
							<td>{{$change->description}}</td>
							<td>{{$change->fname}} {{$change->lname}}</td>
							@if ($change->change_type === 'S')
								<td>Status</td>
							@else 
								<td>Note</td>
							@endif
							<td>{{ Carbon\Carbon::parse($change->updated_at)}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>


		<div id="bottom">
				<br><br>
			 	{!! Form::open() !!}
                {!! Form::label('Enter Status Update:', null, ['class' => 'label']) !!}<br><br>
                <div id="options">
	                {!! Form::label('Note', null, ['class' => 'options']) !!}
	                {!! Form::radio('option', 'Note', false, ['class' => 'options']) !!}
	                {!! Form::label('Status', null, ['class' => 'options']) !!}
				 	{!! Form::radio('option', 'Status', true, ['class' => 'options']) !!}<br>
				</div>
                {!! Form::textarea('statusUpdate', null, ['class' => 'text-area', 'required']) !!}<br>
                {!! Form::checkbox('complete', 1, $task->complete, ['class' => 'field']) !!}
                {!! Form::label('Task Complete', null, ['class' => 'clabel']) !!}
                {!! Form::submit('submit', ['class' => 'button']) !!}
                {!! Form::close() !!}
		</div>

	</div>

@stop