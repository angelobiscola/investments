<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('billet[name]', $billet['name'], ['class' => 'form-control', 'id' => 'name']) !!}
        Nome Boleto.

        @if ($errors->has('name'))
            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('agency') ? ' has-error' : '' }}">
    {!! Form::label('agencia', 'agency', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('billet[agency]', $billet['agency'], ['class' => 'form-control', 'id' => 'agency']) !!}
        Num da agencia, sem digito

        @if ($errors->has('agency'))
            <span class="help-block"><strong>{{ $errors->first('agency') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('agency_dv') ? ' has-error' : '' }}">
    {!! Form::label('agency_dv', 'agency_dv', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('billet[agency_dv]', $billet['agency_dv'], ['class' => 'form-control']) !!}
        Digito do Num da agencia

        @if ($errors->has('agency_dv'))
            <span class="help-block"><strong>{{ $errors->first('agency_dv') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('account') ? ' has-error' : '' }}"
        >
    {!! Form::label('account', 'account', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('billet[account]', $billet['account'], ['class' => 'form-control']) !!}
        Num da conta, sem digito

        @if ($errors->has('account'))
            <span class="help-block"><strong>{{ $errors->first('account') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('account_dv') ? ' has-error' : '' }}">
    {!! Form::label('account_dv', 'account_dv', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('billet[account_dv]', $billet['account_dv'], ['class' => 'form-control']) !!}
        Digito conta

        @if ($errors->has('account_dv'))
            <span class="help-block"><strong>{{ $errors->first('account_dv') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('wallet') ? ' has-error' : '' }}">
    {!! Form::label('wallet', 'wallet', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('billet[wallet]', $billet['wallet'], ['class' => 'form-control']) !!}
        Código da Carteira: pode ser 06 ou 03

        @if ($errors->has('wallet'))
            <span class="help-block"><strong>{{ $errors->first('wallet') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('wallet') ? ' has-error' : '' }}">
    {!! Form::label('idetification', 'identification', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('billet[identification]', $billet['identification'], ['class' => 'form-control']) !!}
        Identificação

        @if ($errors->has('identification'))
            <span class="help-block"><strong>{{ $errors->first('identification') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('contract') ? ' has-error' : '' }}">
    {!! Form::label('contract', 'contract', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('billet[contract]', $billet['contract'], ['class' => 'form-control']) !!}
        Contrato

        @if ($errors->has('contract'))
            <span class="help-block"><strong>{{ $errors->first('contract') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('contract') ? ' has-error' : '' }}">
    {!! Form::label('template_id', 'template_id', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        @include('investment::elements._templates')
        Template

        @if ($errors->has('template_id'))
            <span class="help-block"><strong>{{ $errors->first('template_id') }}</strong></span>
        @endif
    </div>
</div>







