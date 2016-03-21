<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Name</label>

    <div class="col-md-6">

        <input type="text" class="form-control" name="prospect[name]" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
        @endif

    </div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Description</label>

    <div class="col-md-6">

        <input type="text" class="form-control" name="prospect[description]" value="{{ old('description') }}">

        @if ($errors->has('description'))
            <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
        @endif

    </div>
</div>





