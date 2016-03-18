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
							<td style="padding: 10px 20px">{{ $field[0] }}:</td>
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
						<th>Date</th>
						<th>Author</th>
						<th>Type</th>
						<th>Update</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($changes as $change)
						<tr>
							<td>{{ Carbon\Carbon::parse($change->updated_at)}}</td>
							<td>{{$change->user_id}}</td>
							@if ($change->type === 'S')
								<td>Status</td>
							@else 
								<td>Note</td>
							@endif
							<td>{{$change->description}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div id="bottom">
			 	{!! Form::open() !!}
                {!! Form::label('Enter Status Update:', null, ['class' => 'label']) !!}<br>
                {!! Form::textarea('statusUpdate', null, ['class' => 'text-area']) !!}<br>
                {!! Form::checkbox('agree', 1, null, ['class' => 'field']) !!}
                {!! Form::label('Task Complete', null, ['class' => 'clabel']) !!}
                {!! Form::submit('submit', ['class' => 'button']) !!}
                {!! Form::close() !!}
		</div>

	</div>

@stop