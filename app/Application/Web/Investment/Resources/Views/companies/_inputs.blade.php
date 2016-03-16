<div class="form-group{{ $errors->has('razao_social') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">razao_social</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="company[razao_social]" value="{{ old('razao_social') }}">

        @if ($errors->has('razao_social'))
            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">cnpj</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="company[cnpj]" value="{{ old('cnpj') }}">

        @if ($errors->has('cnpj'))
            <span class="help-block"><strong>{{ $errors->first('cnpj') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('cnae_principal') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">cnae_principal</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="company[cnae_principal]" value="{{ old('cnae_principal') }}" placeholder="Brasil">

        @if ($errors->has('cnae_principal'))
            <span class="help-block"><strong>{{ $errors->first('cnae_principal') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">telefone</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="company[telefone]" value="{{ old('telefone') }}">

        @if ($errors->has('telefone'))
            <span class="help-block"><strong>{{ $errors->first('telefone') }}</strong></span>
        @endif
    </div>
</div>




