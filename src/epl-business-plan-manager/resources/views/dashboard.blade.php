@extends('app')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/dashboard.css"></link>
@stop

@section('content')
	
	<div id="profile-left">
		<div id="profile-info">
			<img src="images/empty-profile.jpg" alt="profile picture" height=200 width=200>
			<h3> {{ $user->first_name }}  {{ $user->last_name }} </h3>
			<h4> IT Department </h4>
		</div>

			<div id="profile-stats">
				<h2 style="color: blue; padding-top: 20px;"> 14 </h2>
				<h5> In Progress </h5>
				<h2 style="color: green;"> 26 </h2>
				<h5> Completed </h5>
				<h2 style="color: red;"> 0 </h2>
				<h5> Overdue </h5>
			</div>
		</div>

		<div id="profile-right">
			<table>
				<thead>
				<tr>
					<th>Action</th>
					<th>Task</th>
					<th>Due Date</th>
					<th>Status</th>
				</tr>
				</thead>
				<tbody>
					<td>1.13</td>
					<td><p> Implement approved recommendations fro mthe 2015 Public Computing Report</p></td>
					<td>2016/06/30</td>
					<td>Implemented #7</td>
				</tbody>
			</table>
		</div>
	</div>	
@stop
