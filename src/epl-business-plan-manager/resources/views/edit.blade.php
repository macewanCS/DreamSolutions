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

		</div>

		<div id="bottom">
		</div>

	</div>

@stop