<div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">zip_code</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="location[zip_code]" value="{{ old('zip_code') }}">

        @if ($errors->has('zip_code'))
            <span class="help-block"><strong>{{ $errors->first('zip_code') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Address</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="location[address]" value="{{ old('address') }}">

        @if ($errors->has('address'))
            <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
        @endif
    </div>

</div>


<div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">number</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="location[number]" value="{{ old('number') }}">

        @if ($errors->has('number'))
            <span class="help-block"><strong>{{ $errors->first('number') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">city</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="location[city]" value="{{ old('city') }}">

        @if ($errors->has('city'))
            <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">district</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="location[district]" value="{{ old('district') }}">

        @if ($errors->has('district'))
            <span class="help-block"><strong>{{ $errors->first('district') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">state</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="location[state]" value="{{ old('state') }}">

        @if ($errors->has('state'))
            <span class="help-block"><strong>{{ $errors->first('state') }}</strong></span>
        @endif
    </div>
</div>

