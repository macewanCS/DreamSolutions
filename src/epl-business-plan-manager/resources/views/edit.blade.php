@extends('app')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/edit.css"></link>
@stop

@section('content')

	<div id="edit-content">
		
		<div id="left">
			<table>
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
			<table>
				<thead>
					<tr>
						<th>Date</th>
						<th>Author</th>
						<th>Type</th>
						<th>Update</th>
					</tr>
				</thead>
				<tbody>
					
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