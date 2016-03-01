<!-- Top level container for goal, objective, action, task -->
<div class="goat-tabs">
    <nav>
        <ul class="goat-tabs-links">
            <li class="active"><a data-toggle="tab" href="#goal">Goal</a></li>
            <li><a data-toggle="tab" href="#objective">Objective</a></li>
            <li><a data-toggle="tab" href="#action">Action</a></li>
            <li><a data-toggle="tab" href="#task">Task</a></li>
        </ul>
    </nav>
</div>

<div class="tab-content">
    <div id="goal" class="tab fade in active">
        <div>
            {!! Form::label('Goal description') !!}<br>
            {!! Form::textarea('goalDescription') !!}<br>
            {!! Form::submit($submitButton, ['class' => 'button']) !!}
        </div>
    </div>

    <div id="objective" class="tab fade">
        <div id="objective-left">
            {!! Form::label('Goal') !!}<br>
            {!! Form::select('size', array('Tmp' => 'Load goals here')) !!}
        </div>
        <div id="objective-right">
            {!! Form::label('Objective description') !!}<br>
            {!! Form::textarea('objectiveDescription') !!}<br>
            {!! Form::submit($submitButton, ['class' => 'button']) !!}
        </div>
    </div>

    <div id="action" class="tab fade">
        <div id="action-left">
            {!! Form::label('Goal') !!}<br>
            {!! Form::select('size', array('Tmp' => 'Load goals here')) !!}<br>
            {!! Form::label('Objective') !!}<br>
            {!! Form::select('size', array('Tmp' => 'Load objectives here')) !!}<br>
            <div id="actionLeadsContainer" tag="lead">
            {!! Form::label('Lead') !!}<br>
            {!! Form::text('leadName') !!}
            {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("actionLeadsContainer")']) !!}
            </div>
            <div id="actionCollaboratorsContainer" tag="co">
            {!! Form::label('Collaborator') !!}<br>
            {!! Form::text('collaboratorName') !!}
            {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("actionCollaboratorsContainer")']) !!}
            </div>
            {!! Form::label('End date') !!}<br>
            {!! Form::date('end', \Carbon\Carbon::now()) !!}<br>
        </div>
        <div id="action-right">
            {!! Form::label('Action description') !!}<br>
            {!! Form::textarea('actionDescription') !!}<br>
            {!! Form::label('Priority') !!}<br>
            {!! Form::select('size', array('H' => 'High', 'M' => 'Medium', 'L' => 'Low')) !!}
            {!! Form::submit($submitButton, ['class' => 'button']) !!}
        </div>
    </div>

    <div id="task" class="tab fade">
        <div id="task-left">
            {!! Form::label('Goal') !!}<br>
            {!! Form::select('size', array('Tmp' => 'Load goals here')) !!}<br>
            {!! Form::label('Objective') !!}<br>
            {!! Form::select('size', array('Tmp' => 'Load objectives here')) !!}<br>
            {!! Form::label('Action') !!}<br>
            {!! Form::select('size', array('Tmp' => 'Load actions here')) !!}<br>
            <div id="taskLeadsContainer" tag="lead">
            {!! Form::label('Lead') !!}<br>
            {!! Form::text('leadName') !!}
            {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("taskLeadsContainer")']) !!}
            </div>
            <div id="taskCollaboratorsContainer" tag="co">
            {!! Form::label('Collaborator') !!}<br>
            {!! Form::text('collaboratorName') !!}
            {!! Form::button('+', ['class' => 'addTextBox', 'onclick' => 'addTextBox("taskCollaboratorsContainer")']) !!}
            </div>
            {!! Form::label('End date') !!}<br>
            {!! Form::date('end', \Carbon\Carbon::now()) !!}<br>
        </div>
        <div id="task-right">
            {!! Form::label('Task description') !!}<br>
            {!! Form::textarea('taskDescription') !!}<br>
            {!! Form::label('Priority') !!}<br>
            {!! Form::select('size', array('H' => 'High', 'M' => 'Medium', 'L' => 'Low')) !!}
            {!! Form::submit($submitButton, ['class' => 'button']) !!}
        </div>
    </div>
</div>
