
<div>
{!! Form::label('name', 'Name:') !!}
{!! Form::text('name', null) !!}
</div>

{!! Form::label('isTeam', 'Department') !!}
{!! Form::radio('isTeam', '0') !!}
&nbsp;&nbsp;&nbsp;
{!! Form::label('isTeam', 'Team') !!}
{!! Form::radio('isTeam', '1') !!}

<p>{!! Form::submit($submitButtonText) !!}</p>