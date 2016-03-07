<div class="create-plan-previous-button">
    {!! Form::open(array('method' => 'patch')) !!}
        {!! Form::submit('Previous', ['class' => 'create-plan-button']) !!}
    {!! Form::close() !!}
</div>

<div class="create-plan-next-button">
    {!! Form::open(array('action' => array($nextButtonAction))) !!}
        {!! Form::submit('Next', ['class' => 'create-plan-button']) !!}
    {!! Form::close() !!}
</div>