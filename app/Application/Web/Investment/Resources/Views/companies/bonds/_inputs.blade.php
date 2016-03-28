<div class="form-group{{ $errors->has('prospect_id') ? ' has-error' : '' }}">
    {!! Form::label('Prospect', 'Prospect', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <select class="form-control" name="bond[prospect_id]">

            <option>Select..</option>
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
        @if ($errors->has('prospect_id'))
            <span class="help-block"><strong>{{ $errors->first('prospect_id') }}</strong></span>
        @endif

    </div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('Name', 'Name', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('bond[name]', null, ['class' => 'form-control']) !!}

        @if ($errors->has('quota'))
            <span class="help-block"><strong>{{ $errors->first('quota') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
    {!! Form::label('Total', 'Total', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <div class="input-group">
            <div class="input-group-addon">$</div>
            {!! Form::text ('bond[total]', null, ['class' => 'form-control']) !!}
            <div class="input-group-addon">.00</div>
        </div>

        @if ($errors->has('total'))
            <span class="help-block"><strong>{{ $errors->first('total') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('quota') ? ' has-error' : '' }}">
    {!! Form::label('Quota', 'Quota', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('bond[quota]', null , ['class' => 'form-control']) !!}

        @if ($errors->has('quota'))
            <span class="help-block"><strong>{{ $errors->first('quota') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
    {!! Form::label('Rate', 'Rate', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('bond[rate]', null , ['class' => 'form-control']) !!}

        @if ($errors->has('rate'))
            <span class="help-block"><strong>{{ $errors->first('rate') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('mode_rate') ? ' has-error' : '' }}">
    {!! Form::label('Mode Rate', 'Mode Rate', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <select class="form-control" name="bond[rate_mode]" id="bond[rate_mode]">

            @if($bond != '')
                @if($bond->rate_mode == 1)
                    <option name="Month" value="1" selected> Month </option>
                    <option value="2">Years</option>
                @else
                    <option value="1">Month</option>
                    <option name="Years" value="2" selected> Years </option>
                @endif
            @else
                <option value="1">Month</option>
                <option value="2">Years</option>
            @endif

        </select>

        @if ($errors->has('mode_rate'))
            <span class="help-block"><strong>{{ $errors->first('mode_rate') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('opportunity') ? ' has-error' : '' }}">
    {!! Form::label('Opportunity Expire', 'Opportunity Expire', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">

       {!! Form::date('bond[opportunity]', \Carbon\Carbon::now(), ['class' => 'control']) !!}

        @if ($errors->has('opportunity'))
            <span class="help-block"><strong>{{ $errors->first('opportunity') }}</strong></span>
        @endif
    </div>
</div>





