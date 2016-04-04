<div class="form-group{{ $errors->has('prospect.name') ? ' has-error' : '' }}">
    {!! Form::label('Name', 'Name', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('prospect[name]',null, ['class' => 'form-control']) !!}

        @if ($errors->has('prospect.name'))
            <span class="help-block"><strong>{{ $errors->first('prospect.name') }}</strong></span>
        @endif

    </div>
</div>

<div class="form-group{{ $errors->has('prospect.description') ? ' has-error' : '' }}">
    {!! Form::label('Description', 'Description', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('prospect[description]', null, ['class' => 'form-control']) !!}

        @if ($errors->has('prospect.description'))
            <span class="help-block"><strong>{{ $errors->first('prospect.description') }}</strong></span>
        @endif

    </div>
</div>





