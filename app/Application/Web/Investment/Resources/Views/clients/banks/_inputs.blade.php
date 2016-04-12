<div class="form-group{{ $errors->has('bank.name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nome Banco *', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('bank[name]', null , ['class' => 'form-control', 'id' => 'name']) !!}

        @if ($errors->has('bank.name'))
            <span class="help-block"><strong>{{ $errors->first('bank.name') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bank.agency') ? ' has-error' : '' }}">
    {!! Form::label('agencia', 'Numero da agência *', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('bank[agency]', null , ['class' => 'form-control', 'id' => 'agency']) !!}
        @if ($errors->has('bank.agency'))
            <span class="help-block"><strong>{{ $errors->first('bank.agency') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bank.account') ? ' has-error' : '' }}">
    {!! Form::label('account', 'Numero Conta *', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('bank[account]', null , ['class' => 'form-control']) !!}

        @if ($errors->has('bank.account'))
            <span class="help-block"><strong>{{ $errors->first('bank.account') }}</strong></span>
        @endif
    </div>
</div>

@if(isset($bank))
    <div class="form-group {{ $errors->has('bank.type') ? ' has-error' : '' }}">
    @else
        <div class="form-group {{ $errors->has() ? ' has-error' : '' }}">
            @endif
            {!! Form::label('type', 'Tipo da conta *', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">

                <select class="form-control" id="bank[type]" name="bank[type]">
                    @if(isset($bank))
                        <option value="">Selecione...</option>
                        <option value="c" @if($bank->type == 'c') selected @endif>Corrente</option>
                        <option value="p" @if($bank->type == 'p') selected @endif>Poupança</option>
                    @else
                        <option value="">Selecione...</option>
                        <option value="c">Corrente</option>
                        <option value="p">Poupança</option>
                    @endif
                </select>

                @if ($errors->has('bank.type'))
                    <span class="help-block"><strong>{{ $errors->first('bank.type') }}</strong></span>
                @endif
            </div>
        </div>



<div class="form-group{{ $errors->has('bank.city') ? ' has-error' : '' }}">
    {!! Form::label('city', 'Cidade', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('bank[city]', null , ['class' => 'form-control']) !!}
        @if ($errors->has('bank.city'))
            <span class="help-block"><strong>{{ $errors->first('bank.city') }}</strong></span>
        @endif
    </div>
</div>