@extends('app')

@section('content')

<div id="profile-left">
		<div id="profile-info">
			<img src="images/empty-profile.jpg" alt="profile picture" height=200 width=200>
			<h3> {{ $fname }}  {{ $lname }} </h3>
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
		
	</div>

@stop