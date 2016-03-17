<div class="form-group{{ $errors->has('agencia') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">agencia</label>

    <div class="col-md-6">
        <input type="text" class="form-control" id="agencia" name="info[agencia]" value="{{ old('agencia') }}">Num da agencia, sem digito

        @if ($errors->has('agencia'))
            <span class="help-block"><strong>{{ $errors->first('agencia') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('agencia_dv') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">agencia_dv</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="info[agencia_dv]" value="{{ old('agencia_dv') }}">Digito do Num da agencia

        @if ($errors->has('agencia_dv'))
            <span class="help-block"><strong>{{ $errors->first('agencia_dv') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('conta') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">conta</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="info[conta]" value="{{ old('conta') }}">Num da conta, sem digito

        @if ($errors->has('conta'))
            <span class="help-block"><strong>{{ $errors->first('conta') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('conta_dv') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">conta_dv</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="info[conta_dv]" value="{{ old('conta_dv') }}">Digito conta

        @if ($errors->has('conta_dv'))
            <span class="help-block"><strong>{{ $errors->first('conta_dv') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('carteira') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">carteira</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="info[conta_dv]" value="{{ old('carteira') }}">Código da Carteira: pode ser 06 ou 03

        @if ($errors->has('carteira'))
            <span class="help-block"><strong>{{ $errors->first('carteira') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('contrato') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">contrato</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="info[contrato]" value="{{ old('contrato') }}">

        @if ($errors->has('contrato'))
            <span class="help-block"><strong>{{ $errors->first('contrato') }}</strong></span>
        @endif
    </div>
</div>
