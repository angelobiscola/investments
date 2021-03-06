@if($bond == null)
    <div class="form-group{{ $errors->has() ? ' has-error' : '' }}">
@else
    <div class="form-group{{ $errors->has('prospect_id') ? ' has-error' : '' }}">
@endif

            {!! Form::label('Prospect', 'Prospecto *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <select class="form-control" name="bond[prospect_id]">

            <option name="" value="">Select..</option>
            @foreach($prospects as $p)

                @if($bond != '')
                    @if($bond->prospect_id == $p->id)
                        <option name="{!! $p->name !!}" value="{!! $p->id !!}" selected> {!! $p->name !!} </option>
                    @endif
                @else
                    <option name="{!! $p->name !!}" value="{!! $p->id !!}"> {!! $p->name !!} </option>
                @endif

            @endforeach

        </select>
        @if ($errors->has('bond.prospect_id'))
            <span class="help-block"><strong>{{ $errors->first('bond.prospect_id') }}</strong></span>
        @endif

    </div>
</div>

<div class="form-group{{ $errors->has('bond.name') ? ' has-error' : '' }}">
    {!! Form::label('Name', 'Nome *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('bond[name]', null, ['class' => 'form-control']) !!}

        @if ($errors->has('bond.name'))
            <span class="help-block"><strong>{{ $errors->first('bond.name') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bond.total') ? ' has-error' : '' }}">
    {!! Form::label('Total', 'Total *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <div class="input-group">
            <div class="input-group-addon">$</div>
            {!! Form::text ('bond[total]', null, ['class' => 'form-control']) !!}
        </div>

        @if ($errors->has('bond.total'))
            <span class="help-block"><strong>{{ $errors->first('bond.total') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('bond.quota') ? ' has-error' : '' }}">
    {!! Form::label('Quota', 'Quota *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('bond[quota]', null , ['class' => 'form-control']) !!}

        @if ($errors->has('bond.quota'))
            <span class="help-block"><strong>{{ $errors->first('bond.quota') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bond.rate') ? ' has-error' : '' }}">
    {!! Form::label('Rate', 'Taxa *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('bond[rate]', null , ['class' => 'form-control']) !!}

        @if ($errors->has('bond.rate'))
            <span class="help-block"><strong>{{ $errors->first('bond.rate') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bond.mode_rate') ? ' has-error' : '' }}">
    {!! Form::label('Mode Rate', 'Taxa ao *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <select class="form-control" name="bond[rate_mode]" id="bond[rate_mode]">

            @if($bond != '')
                @if($bond->rate_mode == 1)
                    <option value="1" selected> Mês </option>
                    <option value="2">Ano</option>
                @else
                    <option value="1">Mês</option>
                    <option value="2" selected> Ano </option>
                @endif
            @else
                <option value="1">Mês</option>
                <option value="2">Ano</option>
            @endif

        </select>

        @if ($errors->has('bond.mode_rate'))
            <span class="help-block"><strong>{{ $errors->first('bond.mode_rate') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bond.ir') ? ' has-error' : '' }}">
    {!! Form::label('IR', 'Imposto de Renda *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('bond[ir]', null , ['class' => 'form-control']) !!}

        @if ($errors->has('bond.ir'))
            <span class="help-block"><strong>{{ $errors->first('bond.ir') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('bond.opportunity') ? ' has-error' : '' }}">
    {!! Form::label('Opportunity Expire', 'Expira *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">

       {!! Form::date('bond[opportunity]', \Carbon\Carbon::now(), ['class' => 'control']) !!}

        @if ($errors->has('bond.opportunity'))
            <span class="help-block"><strong>{{ $errors->first('bond.opportunity') }}</strong></span>
        @endif
    </div>
</div>





