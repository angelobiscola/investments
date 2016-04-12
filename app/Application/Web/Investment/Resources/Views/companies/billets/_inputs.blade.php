@inject('templates', 'App\Domains\Billet\Template' )

<div class="form-group{{ $errors->has('billet.name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nome', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('billet[name]', null , ['class' => 'form-control', 'id' => 'name']) !!}
        Nome Boleto.

        @if ($errors->has('billet.name'))
            <span class="help-block"><strong>{{ $errors->first('billet.name') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('billet.agency') ? ' has-error' : '' }}">
    {!! Form::label('agencia', 'Agência', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('billet[agency]', null , ['class' => 'form-control', 'id' => 'agency']) !!}
        Num da agencia, sem digito

        @if ($errors->has('billet.agency'))
            <span class="help-block"><strong>{{ $errors->first('billet.agency') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('billet.agency_dv') ? ' has-error' : '' }}">
    {!! Form::label('agency_dv', 'Agência_DV', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('billet[agency_dv]', null , ['class' => 'form-control']) !!}
        Digito do Num da agencia

        @if ($errors->has('billet.agency_dv'))
            <span class="help-block"><strong>{{ $errors->first('billet.agency_dv') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('billet.account') ? ' has-error' : '' }}"
        >
    {!! Form::label('account', 'Conta', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('billet[account]', null , ['class' => 'form-control']) !!}
        Num da conta, sem digito

        @if ($errors->has('billet.account'))
            <span class="help-block"><strong>{{ $errors->first('billet.account') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('billet.account_dv') ? ' has-error' : '' }}">
    {!! Form::label('account_dv', 'Conta_DV', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('billet[account_dv]', null , ['class' => 'form-control']) !!}
        Digito conta

        @if ($errors->has('billet.account_dv'))
            <span class="help-block"><strong>{{ $errors->first('billet.account_dv') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('billet.wallet') ? ' has-error' : '' }}">
    {!! Form::label('wallet', 'Carteira', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('billet[wallet]', null , ['class' => 'form-control']) !!}
        Código da Carteira: pode ser 06 ou 03

        @if ($errors->has('billet.wallet'))
            <span class="help-block"><strong>{{ $errors->first('billet.wallet') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('billet.identification') ? ' has-error' : '' }}">
    {!! Form::label('idetification', 'Identificação', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text ('billet[identification]', null , ['class' => 'form-control']) !!}
        Identificação

        @if ($errors->has('billet.identification'))
            <span class="help-block"><strong>{{ $errors->first('billet.identification') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('billet.contract') ? ' has-error' : '' }}">
    {!! Form::label('contract', 'Contrato', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('billet[contract]', null , ['class' => 'form-control']) !!}
        Contrato

        @if ($errors->has('billet.contract'))
            <span class="help-block"><strong>{{ $errors->first('billet.contract') }}</strong></span>
        @endif
    </div>
</div>

@if($billet == null)
    <div class="form-group {{ $errors->has() ? ' has-error' : '' }}">
@else
    <div class="form-group {{ $errors->has('billet.template_id') ? ' has-error' : '' }}">
@endif

    {!! Form::label('template_id', 'Modelo_ID', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <select class="form-control" id="billet[template_id]" name="billet[template_id]">

            <option name="" value="">Select..</option>

            @foreach($templates->All() as $p)

                @if($billet != '')
                    <option name="{!! $p->name !!}" value="{!! $p->id !!}" @if($billet->template_id == $p->id ) selected @endif> {!! $p->name !!} </option>
                @else
                     <option name="{!! $p->name !!}" value="{!! $p->id !!}"> {!! $p->name !!} </option>
                @endif

            @endforeach

        </select>
        @if ($errors->has('billet.template_id'))
            <span class="help-block"><strong>{{ $errors->first('billet.template_id') }}</strong></span>
        @endif

    </div>
</div>







