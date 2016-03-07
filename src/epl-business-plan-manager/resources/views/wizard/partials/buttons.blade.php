<div class="wizard-previous-button">
    {!! Form::open(array('method' => 'patch')) !!}
        {!! Form::submit('Previous', ['class' => 'wizard-button']) !!}
    {!! Form::close() !!}
</div>

<div class="wizard-next-button">
    {!! Form::open(array('action' => array($nextButtonAction))) !!}
        {!! Form::submit('Next', ['class' => 'wizard-button']) !!}
    {!! Form::close() !!}
</div>