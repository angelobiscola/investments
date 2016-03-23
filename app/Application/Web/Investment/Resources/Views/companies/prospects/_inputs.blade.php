<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('Name', 'Name', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('prospect[name]', $prospect['name'], ['class' => 'form-control']) !!}

        @if ($errors->has('name'))
            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
        @endif

    </div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('Description', 'Description', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('prospect[description]', $prospect['description'], ['class' => 'form-control']) !!}

        @if ($errors->has('description'))
            <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
        @endif

    </div>
</div>





