<input type="hidden" name="client[type]" value="{!! $type !!}">

<div class="form-group{{ $errors->has('client.name') ? ' has-error' : '' }}">
    {!! Form::label('Name', 'Name', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('client[name]', null  , ['class' => 'form-control', 'id'=>'name']) !!}

        @if ($errors->has('client.name'))
            <span class="help-block"><strong>{{ $errors->first('client.name') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('client.phone') ? ' has-error' : '' }}">
    {!! Form::label('phone', 'Phone', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('client[phone]', null , ['class' => 'form-control phone']) !!}

        @if ($errors->has('client.phone'))
            <span class="help-block"><strong>{{ $errors->first('client.phone') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('client.email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'E-mail', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('client[email]',null , ['class' => 'form-control', 'id' => 'email']) !!}

        @if ($errors->has('client.email'))
            <span class="help-block"><strong>{{ $errors->first('client.email') }}</strong></span>
        @endif
    </div>
</div>

<h4>Data Type <b>[{!! $type !!}]</b></h4>
@include('investment::clients._inputs_p'.$type)

