@extends('app')

@section('head')
  <link rel="stylesheet" type="text/css" href="/css/manage_plan.css"></link>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
  {!! Html::script('build/js/all.js') !!}
@stop

@section('content')
    <div id="manage-plan-area">

      @if (Auth::user()->is_bplead)
        <div style="height: 25px">
            <div id="createBusinessPlan">
                <a id="cBP" style="color: #004B8E;" href="{{ action('CreatePlanController@show') }}">Create Business Plan</a>
            </div>
        </div>
      @endif

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
            <div class="container">
              <nav class="goat-nav">
                <ul class="nav nav-pills">
                @if (Auth::user()->is_bplead)
                  <li class="active"><a data-toggle="pill" href="#cgoal">Goal</a></li>
                  <li><a data-toggle="pill" href="#cobjective">Objective</a></li>
                  <li><a data-toggle="pill" href="#caction">Action</a></li>
                @else
                    <li class="active"><a data-toggle="pill" href="#caction">Action</a></li>
                @endif
                  <li><a data-toggle="pill" href="#ctask">Task</a></li>
                </ul>
              </nav>

            <div class="tab-content">
              <h3>Create</h3>

              @if (Auth::user()->is_bplead)
                <div id="cgoal" class="tab-pane fade in active">
              @else
                <div id="cgoal" class="tab-pane fade">
              @endif
                  {!! Form::open(['url' => 'manage', 'action' => ['managePlanController@store']]) !!}
                  {!! Form::hidden('type','G') !!}
                  <input id="businessItem" name="businessItem" type="checkbox" value="B" checked="checked">Business Plan Item?</input><br>
                  {!! Form::label('Business Plan Year') !!}<br>
                  <select class="bId" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
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
                <select class="bId" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                  <option default selected disabled>Select BP Year</option>
                  @foreach ($businessPlans as $businessPlan)
                    <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                  @endforeach
                </select><br>
                {!! Form::label('Goal') !!}<br>
                <select class="goalId" name="goalId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                {!! Form::label('Objective description') !!}<br>
                {!! Form::textarea('objectiveDescription', null, ['cols' => '35', 'rows' => '1']) !!}<br>
                {!! Form::submit('submit', ['class' => 'button']) !!}
                {!! Form::close() !!}
              </div>

              @if (!Auth::user()->is_bplead)
                <div id="caction" class="tab-pane fade in active">
              @else
                <div id="caction" class="tab-pane fadee">
              @endif
                {!! Form::open(['url' => 'manage', 'action' => ['managePlanController@store']]) !!}
                <div id="action-left">
                  {!! Form::hidden('type','A') !!}
                  {!! Form::label('Business Plan Year') !!}<br>
                  <select class="bId" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                    <option default selected disabled>Select BP Year</option>
                    @foreach ($businessPlans as $businessPlan)
                      <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                    @endforeach
                  </select><br>
                  {!! Form::label('Goal') !!}<br>
                  <select class="goalId" name="goalId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                  {!! Form::label('Objective') !!}<br>
                  <select class="objId" name="objId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                  {!! Form::label('Action description') !!}<br>
                  {!! Form::textarea('actionDescription', null, ['cols' => '35', 'rows' => '1']) !!}<br>
                </div>
                <div id="action-right">
                  <div id="cActionLeadsContainer" tag="lead">
                    {!! Form::label('Lead') !!}<br>
                    <!-- {!! Form::text('leadName', null, ['class' => 'leadName']) !!} -->
                    <select class=".js-basic-mulitple" multiple="multiple" name="leadName[]" style="width: 250px;">
                        @foreach ($users as $user)
                            <option value={!! $user->id !!}>{!! $user->first_name . ' ' . $user->last_name !!}</option>
                        @endforeach
                    </select>
                  </div>
                  <div id="cActionCollaboratorsContainer" tag="co">
                    {!! Form::label('Collaborator') !!}<br>
                    <select class=".js-basic-mulitple" multiple="multiple" name="collaboratorName[]" style="width: 250px;">
                        @foreach ($users as $user)
                            <option value={!! $user->id !!}>{!! $user->first_name . ' ' . $user->last_name !!}</option>
                        @endforeach
                    </select>
                  </div>
                  {!! Form::label('End date') !!}<br>
                  {!! Form::date('end', \Carbon\Carbon::now()) !!}<br>
                  {!! Form::label('Priority') !!}<br>
                  {!! Form::select('priority', ['1' => 'High', '2' => 'Medium', '3' => 'Low']) !!}<br>
                  {!! Form::submit('submit', ['class' => 'button']) !!}
                </div>
                {!! Form::close() !!}
              </div>

              <div id="ctask" class="tab-pane fade">
                {!! Form::open(['url' => 'manage', 'action' => ['managePlanController@store']]) !!}
                <div id="task-left">
                  {!! Form::hidden('type','T') !!}
                  {!! Form::label('Business Plan Year') !!}<br>
                  <select class="bId" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                    <option default selected disabled>Select BP Year</option>
                    @foreach ($businessPlans as $businessPlan)
                      <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                    @endforeach
                  </select><br>
                  {!! Form::label('Goal') !!}<br>
                  <select class="goalId" name="goalId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                  {!! Form::label('Objective') !!}<br>
                  <select class="objId" name="objId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                  {!! Form::label('Action') !!}<br>
                  <select class="actionId" name="actionId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                  {!! Form::label('Task description') !!}<br>
                  {!! Form::textarea('taskDescription', null, ['cols' => '35', 'rows' => '1']) !!}<br>
                </div>
                <div id="task-right">
                  <div id="cAaskLeadsContainer" tag="lead">
                  {!! Form::label('Lead') !!}<br>
                  <select class=".js-basic-mulitple" multiple="multiple" name="leadName[]" style="width: 250px;">
                        @foreach ($users as $user)
                            <option value={!! $user->id !!}>{!! $user->first_name . ' ' . $user->last_name !!}</option>
                        @endforeach
                    </select>
                  </div>
                  <div id="cAaskCollaboratorsContainer" tag="co">
                  {!! Form::label('Collaborator') !!}<br>
                  <select class=".js-basic-mulitple" multiple="multiple" name="collaboratorName[]" style="width: 250px;">
                        @foreach ($users as $user)
                            <option value={!! $user->id !!}>{!! $user->first_name . ' ' . $user->last_name !!}</option>
                        @endforeach
                    </select>
                  </div>
                  {!! Form::label('End date') !!}<br>
                  {!! Form::date('end', \Carbon\Carbon::now()) !!}<br>
                  {!! Form::label('Priority') !!}<br>
                  {!! Form::select('priority', ['1' => 'High', '2' => 'Medium', '3' => 'Low']) !!}<br>
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
                @if (Auth::user()->is_bplead)
                  <li class="active"><a data-toggle="pill" href="#cgoal">Goal</a></li>
                  <li><a data-toggle="pill" href="#cobjective">Objective</a></li>
                  <li><a data-toggle="pill" href="#caction">Action</a></li>
                @else
                    <li class="active"><a data-toggle="pill" href="#caction">Action</a></li>
                @endif
                  <li><a data-toggle="pill" href="#utask">Task</a></li>
                </ul>
              </nav>

              <div class="tab-content">
                <h3>Update</h3>
                  @if (Auth::user()->is_bplead)
                    <div id="ugoal" class="tab-pane fade in active">
                  @else
                    <div id="ugoal" class="tab-pane fade">
                  @endif
                  {!! Form::open(['url' => 'manage', 'method' => 'PATCH']) !!}
                  {!! Form::hidden('type','G') !!}
                  {!! Form::label('Business Plan Year') !!}<br>
                  <select class="bId" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                    <option default selected disabled>Select BP Year</option>
                    @foreach ($businessPlans as $businessPlan)
                      <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                    @endforeach
                  </select><br>
                  {!! Form::label('Goal') !!}<br>
                  <select class="goalId" name="goalId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                  {!! Form::label('Goal description') !!}<br>
                  {!! Form::textarea('goalDescription', null, ['cols' => '35', 'rows' => '1', 'class' => 'goalDescription']) !!}<br>
                  {!! Form::submit('submit', ['class' => 'button']) !!}
                  {!! Form::close() !!}
                </div>

                <div id="uobjective" class="tab-pane fade">
                  {!! Form::open(['url' => 'manage', 'method' => 'PATCH', 'action' => ['managePlanController@update']]) !!}
                    {!! Form::hidden('type','O') !!}
                    {!! Form::label('Business Plan Year') !!}<br>
                    <select class="bId" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                      <option default selected disabled>Select BP Year</option>
                      @foreach ($businessPlans as $businessPlan)
                        <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                      @endforeach
                    </select><br>
                    {!! Form::label('Goal') !!}<br>
                    <select class="goalId" name="goalId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Objective') !!}<br>
                    <select class="objId" name="objId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Objective description') !!}<br>
                    {!! Form::textarea('objectiveDescription', null, ['cols' => '35', 'rows' => '1', 'class' => 'objectiveDescription']) !!}<br>
                    {!! Form::submit('submit', ['class' => 'button']) !!}
                  {!! Form::close() !!}
                </div>

                  @if (!Auth::user()->is_bplead)
                    <div id="uaction" class="tab-pane fade in active">
                  @else
                    <div id="uaction" class="tab-pane fadee">
                  @endif
                  {!! Form::open(['url' => 'manage', 'method' => 'PATCH', 'action' => ['managePlanController@update']]) !!}
                  <div id="action-left">
                    {!! Form::hidden('type','A') !!}
                    {!! Form::label('Business Plan Year') !!}<br>
                    <select class="bId" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                      <option default selected disabled>Select BP Year</option>
                      @foreach ($businessPlans as $businessPlan)
                        <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                      @endforeach
                    </select><br>
                    {!! Form::label('Goal') !!}<br>
                    <select class="goalId" name="goalId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Objective') !!}<br>
                    <select class="objId" name="objId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Action') !!}<br>
                    <select class="actionId" name="actionId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Action description') !!}<br>
                    {!! Form::textarea('actionDescription', null, ['cols' => '35', 'rows' => '1', 'class' => 'actionDescription']) !!}<br>
                  </div>
                  <div id="action-right">
                    <div id="uActionLeadsContainer" tag="lead">
                      {!! Form::label('Lead') !!}<br>
                      <select id="uActionLeads" class=".js-basic-mulitple" multiple="multiple" name="leadName[]" style="width: 250px;">
                        @foreach ($users as $user)
                            <option value={!! $user->id !!}>{!! $user->first_name . ' ' . $user->last_name !!}</option>
                        @endforeach
                    </select>
                    </div>
                    <div id="uActionCollaboratorsContainer" tag="co">
                        {!! Form::label('Collaborator') !!}<br>
                        <select id="uActionCollabs" class=".js-basic-mulitple" multiple="multiple" name="collaboratorName[]" style="width: 250px;">
                        @foreach ($users as $user)
                            <option value={!! $user->id !!}>{!! $user->first_name . ' ' . $user->last_name !!}</option>
                        @endforeach
                    </select>
                    </div>
                    {!! Form::label('End date') !!}<br>
                    <input name="end" class="dDate" value="" type="date"></input><br>
                    {!! Form::label('Priority') !!}<br>
                    {!! Form::select('priority', ['1' => 'High', '2' => 'Medium', '3' => 'Low'], null, ['class' => 'uActionPriority']) !!}<br>
                    {!! Form::submit('submit', ['class' => 'button']) !!}
                  </div>
                  {!! Form::close() !!}
                </div>

                <div id="utask" class="tab-pane fade">
                  {!! Form::open(['url' => 'manage', 'method' => 'PATCH']) !!}
                  <div id="task-left">
                    {!! Form::hidden('type','T') !!}
                    {!! Form::label('Business Plan Year') !!}<br>
                    <select class="bId" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                      <option default selected disabled>Select BP Year</option>
                      @foreach ($businessPlans as $businessPlan)
                        <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                      @endforeach
                    </select><br>
                    {!! Form::label('Goal') !!}<br>
                    <select class="goalId" name="goalId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Objective') !!}<br>
                    <select class="objId" name="objId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Action') !!}<br>
                    <select class="actionId" name="actionId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Task') !!}<br>
                    <select class="taskId" name="taskId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Task description') !!}<br>
                    {!! Form::textarea('taskDescription', null, ['cols' => '35', 'rows' => '1', 'class' => 'taskDescription']) !!}<br>
                  </div>
                  <div id="task-right">
                    <div id="uAaskLeadsContainer" tag="lead">
                      {!! Form::label('Lead') !!}<br>
                      <select id="uTaskLeads" class=".js-basic-mulitple" multiple="multiple" name="leadName[]" style="width: 250px;">
                        @foreach ($users as $user)
                            <option value={!! $user->id !!}>{!! $user->first_name . ' ' . $user->last_name !!}</option>
                        @endforeach
                    </select>
                    </div>
                    <div id="uAaskCollaboratorsContainer" tag="co">
                      {!! Form::label('Collaborator') !!}<br>
                      <select id="uTaskCollabs" class=".js-basic-mulitple" multiple="multiple" name="collaboratorName[]" style="width: 250px;">
                        @foreach ($users as $user)
                            <option value={!! $user->id !!}>{!! $user->first_name . ' ' . $user->last_name !!}</option>
                        @endforeach
                    </select>
                    </div>
                    {!! Form::label('End date') !!}<br>
                    <input name="end" class="dDate" value="" type="date"></input><br>
                    {!! Form::label('Priority') !!}<br>
                    {!! Form::select('priority', ['1' => 'High', '2' => 'Medium', '3' => 'Low'], null, ['class' => 'uTaskPriority']) !!}<br>
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
                @if (Auth::user()->is_bplead)
                  <li class="active"><a data-toggle="pill" href="#cgoal">Goal</a></li>
                  <li><a data-toggle="pill" href="#cobjective">Objective</a></li>
                  <li><a data-toggle="pill" href="#caction">Action</a></li>
                @else
                    <li class="active"><a data-toggle="pill" href="#caction">Action</a></li>
                @endif
                  <li><a data-toggle="pill" href="#dtask">Task</a></li>
                </ul>
              </nav>

              <div class="tab-content">
                <h3>Delete</h3>
                  @if (Auth::user()->is_bplead)
                    <div id="dgoal" class="tab-pane fade in active">
                  @else
                    <div id="dgoal" class="tab-pane fade">
                  @endif
                  {!! Form::open(['url' => 'manage', 'method' => 'DELETE']) !!}
                  {!! Form::hidden('type','G') !!}
                  {!! Form::label('Business Plan Year') !!}<br>
                  <select class="bId" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                    <option default selected disabled>Select BP Year</option>
                    @foreach ($businessPlans as $businessPlan)
                      <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                    @endforeach
                  </select><br>
                  {!! Form::label('Goal') !!}<br>
                  <select class="goalId" name="goalId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                  {!! Form::submit('submit', ['class' => 'button']) !!}
                  {!! Form::close() !!}
                </div>

                <div id="dobjective" class="tab-pane fade">
                  {!! Form::open(['url' => 'manage', 'method' => 'DELETE', 'action' => ['managePlanController@destroy']]) !!}
                  {!! Form::hidden('type','O') !!}
                  {!! Form::label('Business Plan Year') !!}<br>
                  <select class="bId" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                    <option default selected disabled>Select BP Year</option>
                    @foreach ($businessPlans as $businessPlan)
                      <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                    @endforeach
                  </select><br>
                  {!! Form::label('Goal') !!}<br>
                  <select class="goalId" name="goalId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                  {!! Form::label('Objective') !!}<br>
                  <select class="objId" name="objId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                  {!! Form::submit('submit', ['class' => 'button']) !!}
                  {!! Form::close() !!}
                </div>

                  @if (!Auth::user()->is_bplead)
                    <div id="daction" class="tab-pane fade in active">
                  @else
                    <div id="daction" class="tab-pane fadee">
                  @endif
                  {!! Form::open(['url' => 'manage', 'method' => 'DELETE', 'action' => ['managePlanController@destroy']]) !!}
                  <div id="action-left">
                    {!! Form::hidden('type','A') !!}
                    {!! Form::label('Business Plan Year') !!}<br>
                    <select class="bId" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                      <option default selected disabled>Select BP Year</option>
                      @foreach ($businessPlans as $businessPlan)
                        <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                      @endforeach
                    </select><br>
                    {!! Form::label('Goal') !!}<br>
                    <select class="goalId" name="goalId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Objective') !!}<br>
                    <select class="objId" name="objId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Action') !!}<br>
                    <select class="actionId" name="actionId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                  </div>
                  <div id="action-right">
                  {!! Form::label('Lead') !!}<br>
                    <table id="dActionLeads"></table><br>
                    {!! Form::label('Collaborator') !!}<br>
                    <table id="dActionCollabs"></table><br>
                    {!! Form::label('End date') !!}<br>
                    <input name="end" class="dDate" readonly="readonly" value="" type="date"></input><br>
                    {!! Form::label(null, 'Priority: ') !!}
                    {!! Form::label(null, null, ['class' => 'actionPriority']) !!}<br>
                    {!! Form::submit('submit', ['class' => 'button']) !!}
                  </div>
                  {!! Form::close() !!}
                </div>

                <div id="dtask" class="tab-pane fade">
                  {!! Form::open(['url' => 'manage', 'method' => 'DELETE', 'action' => ['managePlanController@destroy']]) !!}
                  <div id="task-left">
                    {!! Form::hidden('type','T') !!}
                    {!! Form::label('Business Plan Year') !!}<br>
                    <select class="bId" name="bId" style="margin-bottom: 10px; margin-top: 1px;">
                      <option default selected disabled>Select BP Year</option>
                      @foreach ($businessPlans as $businessPlan)
                        <option value={!! $businessPlan->id !!}>{!! $businessPlan->start->year . '-' . $businessPlan->end->year !!}</option>
                      @endforeach
                    </select><br>
                    {!! Form::label('Goal') !!}<br>
                    <select class="goalId" name="goalId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Objective') !!}<br>
                    <select class="objId" name="objId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Action') !!}<br>
                    <select class="actionId" name="actionId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                    {!! Form::label('Task') !!}<br>
                    <select class="taskId" name="taskId" style="margin-bottom: 10px; margin-top: 1px; width: 250px;"></select><br>
                  </div>
                  <div id="task-right">
                    {!! Form::label('Lead') !!}<br>
                    <table id="dTaskLeads">
                    </table><br>
                    {!! Form::label('Collaborator') !!}<br>
                    <table id="dTaskCollabs">
                    </table><br>
                    {!! Form::label('End date') !!}<br>
                    <input name="end" class="dDate" readonly="readonly" value="" type="date"></input><br>
                    {!! Form::label(null, 'Priority: ') !!}
                    {!! Form::label(null, null, ['class' => 'taskPriority']) !!}<br>
                    {!! Form::submit('submit', ['class' => 'button']) !!}
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
        @if (count($errors))
          <div style="color: #f00; display: flex; align-items: center; justify-content: center;"><ul>
            @foreach ($errors->all() as $error)
              <li>{!! $error !!}</li>
            @endforeach
          </ul></div>
        @endif
      </div>
    </div>
@stop
