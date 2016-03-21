<div class="form-group{{ $errors->has('agency') ? ' has-error' : '' }}">
    {!! Form::label('agencia', 'Agência', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('info[agency]', old('agency'), ['class' => 'form-control', 'id' => 'agency']) !!}
        Num da agencia, sem digito

        @if ($errors->has('agency'))
            <span class="help-block"><strong>{{ $errors->first('agency') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('agency_dv') ? ' has-error' : '' }}">
    {!! Form::label('agency_dv', 'agency_dv', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('info[agency_dv]', old('agency_dv'), ['class' => 'form-control']) !!}
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
        {!! Form::text ('info[account]', old('account'), ['class' => 'form-control']) !!}
        Num da conta, sem digito

        @if ($errors->has('account'))
            <span class="help-block"><strong>{{ $errors->first('account') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('account_dv') ? ' has-error' : '' }}">
    {!! Form::label('account_dv', 'account_dv', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('info[account_dv]', old('account_dv'), ['class' => 'form-control']) !!}
        Digito conta

        @if ($errors->has('account_dv'))
            <span class="help-block"><strong>{{ $errors->first('account_dv') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('wallet') ? ' has-error' : '' }}">
    {!! Form::label('wallet', 'wallet', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('info[wallet]', old('wallet'), ['class' => 'form-control']) !!}
        Código da Carteira: pode ser 06 ou 03

        @if ($errors->has('wallet'))
            <span class="help-block"><strong>{{ $errors->first('wallet') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('contract') ? ' has-error' : '' }}">
    {!! Form::label('contract', 'contract', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('info[contract]', old('contract'), ['class' => 'form-control']) !!}

        @if ($errors->has('contract'))
            <span class="help-block"><strong>{{ $errors->first('contract') }}</strong></span>
        @endif
    </div>
</div>
