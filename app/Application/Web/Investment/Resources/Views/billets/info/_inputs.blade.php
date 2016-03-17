<div class="form-group{{ $errors->has('agency') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">agencia</label>

    <div class="col-md-6">
        <input type="text" class="form-control" id="agency" name="info[agency]" value="{{ old('agency') }}">Num da agencia, sem digito

        @if ($errors->has('agency'))
            <span class="help-block"><strong>{{ $errors->first('agency') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('agency_dv') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">agency_dv</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="info[agency_dv]" value="{{ old('agency_dv') }}">Digito do Num da agencia

        @if ($errors->has('agency_dv'))
            <span class="help-block"><strong>{{ $errors->first('agency_dv') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('account') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">account</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="info[account]" value="{{ old('account') }}">Num da conta, sem digito

        @if ($errors->has('account'))
            <span class="help-block"><strong>{{ $errors->first('account') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('account_dv') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">account_dv</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="info[account_dv]" value="{{ old('account_dv') }}">Digito conta

        @if ($errors->has('account_dv'))
            <span class="help-block"><strong>{{ $errors->first('account_dv') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('wallet') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">wallet</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="info[wallet]" value="{{ old('wallet') }}">Código da Carteira: pode ser 06 ou 03

        @if ($errors->has('wallet'))
            <span class="help-block"><strong>{{ $errors->first('wallet') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('contract') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">contract</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="info[contract]" value="{{ old('contract') }}">

        @if ($errors->has('contract'))
            <span class="help-block"><strong>{{ $errors->first('contract') }}</strong></span>
        @endif
    </div>
</div>
