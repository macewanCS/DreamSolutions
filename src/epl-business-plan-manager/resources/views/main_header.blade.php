@extends('app')

@section('header')

<body>
    <div id="header-area">
        <header id="main-header">
            <img id="epl-logo" src="images/epl-logo.jpg" alt="EPL Logo">
            <h3>Business Plan Manager</h3>
        </header>   
        <div id="nav">
            <ul>
                <li><a href="#dashboard"  class="active">Dashboard</a></li>
                <li><a href="#view_plan">View Plan</a></li>
                <li><a href="#manage_plan">Manage Plan</a></li>
                
            </ul>
            <input type="text" name="search" placeholder="Search" style="float: right;">
        </div>
    </div>

</body>
</html>
@stop
