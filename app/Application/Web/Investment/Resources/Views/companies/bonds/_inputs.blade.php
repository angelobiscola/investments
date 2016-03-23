<div class="form-group{{ $errors->has('prospect_id') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Prospect</label>

    <div class="col-md-6">
        <select class="form-control" name="bond[prospect_id]">

            <option>Select..</option>
            @foreach($prospects as $p)
                <option value="{!! $p->id !!}">{!! $p->name !!}</option>
            @endforeach

        </select>
        @if ($errors->has('prospect_id'))
            <span class="help-block"><strong>{{ $errors->first('prospect_id') }}</strong></span>
        @endif

    </div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Name</label>

    <div class="col-md-6">
            <input type="text" class="form-control" name="bond[name]" value="{{ old('name') }}">

        @if ($errors->has('name'))
            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
    </div>
</div>



<div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Total</label>

    <div class="col-md-6">
        <div class="input-group">
            <div class="input-group-addon">$</div>
            <input type="text" class="form-control" name="bond[total]" value="{{ old('total') }}">
            <div class="input-group-addon">.00</div>
        </div>

        @if ($errors->has('total'))
            <span class="help-block"><strong>{{ $errors->first('total') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('quota') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Quota</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="bond[quota]" value="{{ old('quota') }}">

        @if ($errors->has('quota'))
            <span class="help-block"><strong>{{ $errors->first('quota') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Rate</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="bond[rate]" value="{{ old('rate') }}">

        @if ($errors->has('rate'))
            <span class="help-block"><strong>{{ $errors->first('rate') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('mode_rate') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Mode Rate</label>

    <div class="col-md-6">
        <select class="form-control" name="bond[mode_rate]">
            <option value="1">Month</option>
            <option value="2">Years</option>
        </select>

        @if ($errors->has('mode_rate'))
            <span class="help-block"><strong>{{ $errors->first('mode_rate') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('opportunity') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Opportunity Expire</label>

    <div class="col-md-6">

       {!! Form::date('bond[opportunity]', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}

        @if ($errors->has('opportunity'))
            <span class="help-block"><strong>{{ $errors->first('opportunity') }}</strong></span>
        @endif
    </div>
</div>





