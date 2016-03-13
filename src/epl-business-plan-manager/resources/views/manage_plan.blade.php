@extends('app')

@section('head')
  <link rel="stylesheet" type="text/css" href="/css/manage_plan.css"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <!-- {!! Html::script('build/js/all.js') !!} -->
  <script>
  $(document).ready(function() {
    $('#bId').on('change', function(e){
      console.log('Im in the on change listener.');
      console.log('This is the event: ');
      console.log(e);

      var b_Id = e.target.value;
      console.log('This is b_Id: ' + b_Id);

      $.get('/ajax-goal?b_Id=' + b_Id, function(data){
        console.log('Im in the ajax get.');
        console.log(data);
        $('#goalId').empty();
        $('#goalId').append('<option default selected disabled>Select Goal</option>');
        $.each(data, function(index, goalObj){
          $('#goalId').append('<option value="' + goalObj.id + '">' + goalObj.description + '</option>');
        });
      });
    });
  });
  </script>
@stop

@section('content')
    <div id="manage-plan-area">

      <div style="height: 25px">
          <div id="createBusinessPlan">
              <a href="{{ action('CreatePlanController@show') }}">Create Business Plan</a>
          </div>
      </div>

      <!-- Top level tab container for create, update, delete -->
      <div class="container">
        <nav class="duc-nav">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#create">Create</a></li>
            <li><a data-toggle="tab" href="#update">Update</a></li>
            <li><a data-toggle="tab" href="#delete">Delete</a></li>
          </ul>
        </nav>

        <div class="tab-content">
          <div id="create" class="tab-pane fade in active">
            <!-- <h3>Create</h3> -->
            <div class="container">
              <nav class="goat-nav">
                <ul class="nav nav-pills">
                  <li class="active"><a data-toggle="pill" href="#cgoal">Goal</a></li>
                  <li><a data-toggle="pill" href="#cobjective">Objective</a></li>
                  <li><a data-toggle="pill" href="#caction">Action</a></li>
                  <li><a data-toggle="pill" href="#ctask">Task</a></li>
                </ul>
              </nav>

            <div class="tab-content">
              <h3>Create</h3>

              <div id="cgoal" class="tab-pane fade in active">
                {!! Form::open(['url' => 'manage', 'action' => ['managePlanController@store']]) !!}
                {!! Form::hidden('type','G') !!}
                {!! Form::label('Business Plan Year') !!}<br>
                <select name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                  <option default selected disabled>Select BP Year</option>
                  @foreach ($businessPlans as $businessPlan)
                    <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                  @endforeach
                </select><br>
                {!! Form::label('Goal description') !!}<br>
                {!! Form::textarea('goalDescription', null, ['cols' => '35', 'rows' => '1']) !!}<br>
                {!! Form::submit('submit', ['class' => 'button']) !!}
                {!! Form::close() !!}
              </div>

              <div id="cobjective" class="tab-pane fade">
                {!! Form::open(['url' => 'manage', 'action' => ['managePlanController@store']]) !!}
                {!! Form::hidden('type','O') !!}
                {!! Form::label('Business Plan Year') !!}<br>
                <select name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                  <option default selected disabled>Select BP Year</option>
                  @foreach ($businessPlans as $businessPlan)
                    <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                  @endforeach
                </select><br>
                {!! Form::label('Goal') !!}<br>
                <select name="goalList" style="margin-bottom: 10px; margin-top: 1px; width: 250px;">
                  <option default selected disabled>Select Goal</option>
                  <!-- For each goat bp_id that equals the currently selected bp->id load the ones that match. -->
                  @foreach ($goats as $goat)
                      <option value={!! $goat->id !!}>{!! $goat->description !!}</option>
                  @endforeach
                </select><br>
                {!! Form::label('Objective description') !!}<br>
                {!! Form::textarea('objectiveDescription', null, ['cols' => '35', 'rows' => '1']) !!}<br>
                {!! Form::submit('submit', ['class' => 'button']) !!}
                {!! Form::close() !!}
              </div>

              <div id="caction" class="tab-pane fade">
                {!! Form::open(['url' => 'manage', 'action' => ['managePlanController@store']]) !!}
                <div id="action-left">
                  {!! Form::hidden('type','A') !!}
                  {!! Form::label('Business Plan Year') !!}<br>
                  <select id="bob" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                    <option default selected disabled>Select BP Year</option>
                    @foreach ($businessPlans as $businessPlan)
                      <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                    @endforeach
                  </select><br>
                  {!! Form::label('Goal') !!}<br>
                  {!! Form::select('size', ['Tmp' => 'Load goals here']) !!}<br>
                  {!! Form::label('Objective') !!}<br>
                  {!! Form::select('size', ['Tmp' => 'Load objectives here']) !!}<br>
                  {!! Form::label('Action description') !!}<br>
                  {!! Form::textarea('actionDescription', null, ['cols' => '35', 'rows' => '1']) !!}<br>
                  {!! Form::label('End date') !!}<br>
                  {!! Form::date('end', \Carbon\Carbon::now()) !!}<br>
                </div>
                <div id="action-right">
                  <div id="cActionLeadsContainer" tag="lead">
                  {!! Form::label('Lead') !!}<br>
                  {!! Form::text('leadName') !!}
                  {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("cActionLeadsContainer")']) !!}
                  </div>
                  <div id="cActionCollaboratorsContainer" tag="co">
                      {!! Form::label('Collaborator') !!}<br>
                      {!! Form::text('collaboratorName') !!}
                      {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("cActionCollaboratorsContainer")']) !!}
                  </div>
                    {!! Form::label('Priority') !!}<br>
                    {!! Form::select('size', array('H' => 'High', 'M' => 'Medium', 'L' => 'Low')) !!}
                    {!! Form::submit('submit', ['class' => 'button']) !!}
                </div>
                {!! Form::close() !!}
              </div>

              <div id="ctask" class="tab-pane fade">
                {!! Form::open(['url' => 'manage', 'action' => ['managePlanController@store']]) !!}
                <div id="task-left">
                  {!! Form::hidden('type','T') !!}
                  {!! Form::label('Business Plan Year') !!}<br>
                  <select id="bob" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                    <option default selected disabled>Select BP Year</option>
                    @foreach ($businessPlans as $businessPlan)
                      <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                    @endforeach
                  </select><br>
                  {!! Form::label('Goal') !!}<br>
                  {!! Form::select('size', array('Tmp' => 'Load goals here')) !!}<br>
                  {!! Form::label('Objective') !!}<br>
                  {!! Form::select('size', ['Tmp' => 'Load objectives here']) !!}<br>
                  {!! Form::label('Action') !!}<br>
                  {!! Form::select('size', ['Tmp' => 'Load actions here']) !!}<br>
                  {!! Form::label('Task description') !!}<br>
                  {!! Form::textarea('taskDescription', null, ['cols' => '35', 'rows' => '1']) !!}<br>
                  {!! Form::label('End date') !!}<br>
                  {!! Form::date('end', \Carbon\Carbon::now()) !!}<br>
                </div>
                <div id="task-right">
                  <div id="cAaskLeadsContainer" tag="lead">
                  {!! Form::label('Lead') !!}<br>
                  {!! Form::text('leadName') !!}
                  {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("cAaskLeadsContainer")']) !!}
                  </div>
                  <div id="cAaskCollaboratorsContainer" tag="co">
                  {!! Form::label('Collaborator') !!}<br>
                  {!! Form::text('collaboratorName') !!}
                  {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("cAaskCollaboratorsContainer")']) !!}
                  </div>
                  {!! Form::label('Priority') !!}<br>
                  {!! Form::select('size', array('H' => 'High', 'M' => 'Medium', 'L' => 'Low')) !!}
                  {!! Form::submit('submit', ['class' => 'button']) !!}
                </div>
                {!! Form::close() !!}
              </div>
            </div>
            </div>
          </div>

          <div id="update" class="tab-pane fade">
            <div class="container">
              <nav class="goat-nav">
                <ul class="nav nav-pills">
                  <li class="active"><a data-toggle="pill" href="#ugoal">Goal</a></li>
                  <li><a data-toggle="pill" href="#uobjective">Objective</a></li>
                  <li><a data-toggle="pill" href="#uaction">Action</a></li>
                  <li><a data-toggle="pill" href="#utask">Task</a></li>
                </ul>
              </nav>

              <div class="tab-content">
                <h3>Update</h3>
                <div id="ugoal" class="tab-pane fade in active">
                  {!! Form::open(['url' => 'manage', 'method' => 'PATCH']) !!}
                  {!! Form::hidden('type','G') !!}
                  {!! Form::label('Business Plan Year') !!}<br>
                  <select id="bId" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                    <option default selected disabled>Select BP Year</option>
                    @foreach ($businessPlans as $businessPlan)
                      <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                    @endforeach
                  </select><br>
                  {!! Form::label('Goal') !!}<br>
                  <select id="goalId" name="goalId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                  {!! Form::label('Goal description') !!}<br>
                  {!! Form::textarea('goalDescription', null, ['cols' => '35', 'rows' => '1']) !!}<br>
                  {!! Form::submit('submit', ['class' => 'button']) !!}
                  {!! Form::close() !!}
                </div>

                <div id="uobjective" class="tab-pane fade">
                  {!! Form::open(['url' => 'manage', 'method' => 'PATCH', 'action' => ['managePlanController@update']]) !!}
                    {!! Form::hidden('type','O') !!}
                    {!! Form::label('Business Plan Year') !!}<br>
                    <select name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                      <option default selected disabled>Select BP Year</option>
                      @foreach ($businessPlans as $businessPlan)
                        <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                      @endforeach
                    </select><br>
                    {!! Form::label('Goal') !!}<br>
                    <select id="goalId" name="goalId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Objective') !!}<br>
                    <select id="objId" name="objId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Objective description') !!}<br>
                    {!! Form::textarea('objectiveDescription', null, ['cols' => '35', 'rows' => '1']) !!}<br>
                    {!! Form::submit('submit', ['class' => 'button']) !!}
                  {!! Form::close() !!}
                </div>
                <div id="uaction" class="tab-pane fade">
                  {!! Form::open(['url' => 'manage', 'method' => 'PATCH', 'action' => ['managePlanController@update']]) !!}
                  <div id="action-left">
                    {!! Form::label('Goal') !!}<br>
                    {!! Form::select('size', array('Tmp' => 'Load goals here')) !!}<br>
                    {!! Form::label('Objective') !!}<br>
                    {!! Form::select('size', array('Tmp' => 'Load objectives here')) !!}<br>
                    {!! Form::label('Action') !!}<br>
                    {!! Form::select('size', array('Tmp' => 'Load actions here')) !!}<br>
                    <div id="uActionLeadsContainer" tag="lead">
                      {!! Form::label('Lead') !!}<br>
                      {!! Form::text('leadName') !!}
                      {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("uActionLeadsContainer")']) !!}
                    </div>
                    <div id="uActionCollaboratorsContainer" tag="co">
                        {!! Form::label('Collaborator') !!}<br>
                        {!! Form::text('collaboratorName') !!}
                        {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("uActionCollaboratorsContainer")']) !!}
                    </div>
                    {!! Form::label('End date') !!}<br>
                    {!! Form::date('end', \Carbon\Carbon::now()) !!}<br>
                  </div>
                  <div id="action-right">
                    {!! Form::label('Action description') !!}<br>
                    {!! Form::textarea('actionDescription', null, ['cols' => '35', 'rows' => '1']) !!}<br>
                    {!! Form::label('Priority') !!}<br>
                    {!! Form::select('size', array('H' => 'High', 'M' => 'Medium', 'L' => 'Low')) !!}
                    {!! Form::submit('submit', ['class' => 'button']) !!}
                  </div>
                  {!! Form::close() !!}
                </div>
                <div id="utask" class="tab-pane fade">
                  {!! Form::open(['url' => 'manage', 'method' => 'PATCH']) !!}
                  <div id="task-left">
                    {!! Form::hidden('type','T') !!}
                    {!! Form::label('Business Plan Year') !!}<br>
                    <select class="yearDrop" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                      <option default selected disabled>Select BP Year</option>
                      @foreach ($businessPlans as $businessPlan)
                        <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                      @endforeach
                    </select><br>
                    {!! Form::label('Goal') !!}<br>
                    <select class="goalDrop" name="goalList" style="margin-bottom: 10px; margin-top: 1px; width: 250px;">
                      <option default selected disabled>Select Goal</option>
                      <!-- For each goat bp_id that equals the currently selected bp->id load the ones that match. -->
                    </select><br>
                    {!! Form::label('Objective') !!}<br>
                    <select class="objDrop" name="objectiveList" style="margin-bottom: 10px; margin-top: 1px; width: 250px;">
                      <option default selected disabled>Select Objective</option>
                      <!-- For each goat bp_id that equals the currently selected bp->id load the ones that match. -->
                    </select><br>
                    {!! Form::label('Action') !!}<br>
                    <select class="actionDrop" name="actionList" style="margin-bottom: 10px; margin-top: 1px; width: 250px;">
                      <option default selected disabled>Select Action</option>
                      <!-- For each goat bp_id that equals the currently selected bp->id load the ones that match. -->
                    </select><br>
                    {!! Form::label('Task description') !!}<br>
                    <select class="taskDrop" name="taskList" style="margin-bottom: 10px; margin-top: 1px; width: 250px;">
                      <option default selected disabled>Select Task</option>
                      <!-- For each goat bp_id that equals the currently selected bp->id load the ones that match. -->
                    </select><br>
                    <div id="uAaskLeadsContainer" tag="lead">
                      {!! Form::label('Lead') !!}<br>
                      {!! Form::text('leadName') !!}
                      {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("uAaskLeadsContainer")']) !!}
                    </div>
                    <div id="uAaskCollaboratorsContainer" tag="co">
                      {!! Form::label('Collaborator') !!}<br>
                      {!! Form::text('collaboratorName') !!}
                      {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("uAaskCollaboratorsContainer")']) !!}
                    </div>
                    {!! Form::label('End date') !!}<br>
                    {!! Form::date('end', \Carbon\Carbon::now()) !!}<br>
                  </div>
                  <div id="task-right">
                    {!! Form::label('Task description') !!}<br>
                    {!! Form::textarea('taskDescription', null, ['cols' => '35', 'rows' => '1']) !!}<br>
                    {!! Form::label('Priority') !!}<br>
                    {!! Form::select('size', array('H' => 'High', 'M' => 'Medium', 'L' => 'Low')) !!}
                    {!! Form::submit('submit', ['class' => 'button']) !!}
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>

          <div id="delete" class="tab-pane fade">
            <div class="container">
              <nav class="goat-nav">
                <ul class="nav nav-pills">
                  <li class="active"><a data-toggle="pill" href="#dgoal">Goal</a></li>
                  <li><a data-toggle="pill" href="#dobjective">Objective</a></li>
                  <li><a data-toggle="pill" href="#daction">Action</a></li>
                  <li><a data-toggle="pill" href="#dtask">Task</a></li>
                </ul>
              </nav>

              <div class="tab-content">
                <h3>Delete</h3>
                <div id="dgoal" class="tab-pane fade in active">
                  {!! Form::open(['url' => 'manage', 'method' => 'DELETE']) !!}
                  {!! Form::hidden('type','G') !!}
                  {!! Form::label('Business Plan Year') !!}<br>
                  <select name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                    <option default selected disabled>Select BP Year</option>
                    @foreach ($businessPlans as $businessPlan)
                      <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                    @endforeach
                  </select><br>
                  {!! Form::label('Goal') !!}<br>
                  <select name="goalId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;">
                    <option default selected disabled>Select Goal</option>
                    <!-- For each goat bp_id that equals the currently selected bp->id load the ones that match. -->
                    @foreach ($goats as $goat)
                    <option value={!! $goat->id !!}>{!! $goat->description !!}</option>
                    @endforeach
                  </select><br>
                  {!! Form::label('Goal description') !!}<br>
                  {!! Form::textarea('objectiveDescription', null, ['readonly', 'cols' => '35', 'rows' => '1']) !!}<br>
                  {!! Form::submit('submit', ['class' => 'button']) !!}
                  {!! Form::close() !!}
                </div>

                <div id="dobjective" class="tab-pane fade">
                  {!! Form::open(['url' => 'manage', 'method' => 'DELETE', 'action' => ['managePlanController@destroy']]) !!}
                  <div id="objective-left">
                    {!! Form::label('Goal') !!}<br>
                    {!! Form::select('size', array('Tmp' => 'Load goals here')) !!}<br>
                    {!! Form::label('Objective') !!}<br>
                    {!! Form::select('size', array('Tmp' => 'Load objectives here')) !!}<br>
                  </div>
                  <div id="objective-right">
                    {!! Form::label('Objective description') !!}<br>
                    {!! Form::textarea('objectiveDescription', null, ['readonly', 'cols' => '35', 'rows' => '1']) !!}<br>
                    {!! Form::submit('submit', ['class' => 'button']) !!}
                  </div>
                  {!! Form::close() !!}
                </div>
                <div id="daction" class="tab-pane fade">
                  {!! Form::open(['url' => 'manage', 'method' => 'DELETE', 'action' => ['managePlanController@destroy']]) !!}
                  <div id="action-left">
                    {!! Form::label('Goal') !!}<br>
                    {!! Form::select('size', array('Tmp' => 'Load goals here')) !!}<br>
                    {!! Form::label('Objective') !!}<br>
                    {!! Form::select('size', array('Tmp' => 'Load objectives here')) !!}<br>
                    {!! Form::label('Action') !!}<br>
                    {!! Form::select('size', array('Tmp' => 'Load actions here')) !!}<br>
                    {!! Form::label('Lead') !!}<br>
                    <table>
                      <!-- For each -->
                    </table><br>
                    <!-- //{!! Form::text('leadName', null, ['readonly']) !!}<br> -->
                    {!! Form::label('Collaborator') !!}<br>
                    <table>
                      <!-- For each -->
                    </table><br>
                    <!-- //{!! Form::text('collaboratorName', null, ['readonly']) !!}<br> -->
                    {!! Form::label('End date') !!}<br>
                    {!! Form::date('end', \Carbon\Carbon::now(), ['readonly']) !!}<br>
                  </div>
                  <div id="action-right">
                    {!! Form::label('Action description') !!}<br>
                    {!! Form::textarea('actionDescription', null, ['readonly', 'cols' => '35', 'rows' => '1']) !!}<br>
                    {!! Form::label('Priority') !!}<br>
                    {!! Form::select('size', array('H' => 'High', 'M' => 'Medium', 'L' => 'Low')) !!}
                    {!! Form::submit('submit', ['class' => 'button']) !!}
                  </div>
                  {!! Form::close() !!}
                </div>
                <div id="dtask" class="tab-pane fade">
                  {!! Form::open(['url' => 'manage', 'method' => 'DELETE', 'action' => ['managePlanController@destroy']]) !!}
                  <div id="task-left">
                    {!! Form::label('Goal') !!}<br>
                    {!! Form::select('size', array('Tmp' => 'Load goals here')) !!}<br>
                    {!! Form::label('Objective') !!}<br>
                    {!! Form::select('size', array('Tmp' => 'Load objectives here')) !!}<br>
                    {!! Form::label('Action') !!}<br>
                    {!! Form::select('size', array('Tmp' => 'Load actions here')) !!}<br>
                    {!! Form::label('Task description') !!}<br>
                    {!! Form::select('size', array('Tmp' => 'Load tasks here')) !!}<br>
                  </div>
                  <div id="task-right">
                    {!! Form::label('Lead') !!}<br>
                    <table>
                      <!-- For each -->
                    </table><br>
                    <!-- //{!! Form::text('leadName', null, ['readonly']) !!}<br> -->
                    {!! Form::label('Collaborator') !!}<br>
                    <table>
                      <!-- For each -->
                    </table><br>
                    <!-- //{!! Form::text('collaboratorName', null, ['readonly']) !!}<br> -->
                    {!! Form::label('End date') !!}<br>
                    {!! Form::date('end', \Carbon\Carbon::now(), ['readonly']) !!}<br>
                    {!! Form::label('Priority') !!}<br>
                    {!! Form::select('size', array('H' => 'High', 'M' => 'Medium', 'L' => 'Low')) !!}
                    {!! Form::submit('submit', ['class' => 'button']) !!}
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop
