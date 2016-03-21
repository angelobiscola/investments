<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('Name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('billet[name]', old('name'), ['class' => 'form-control', 'id' => 'name']) !!}

        @if ($errors->has('name'))
            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('template') ? ' has-error' : '' }}">
    {!! Form::label('template', 'template', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text ('billet[template]', old('representation'), ['class' => 'form-control']) !!}

        @if ($errors->has('representation'))
            <span class="help-block"><strong>{{ $errors->first('representation') }}</strong></span>
        @endif
    </div>
</div>


