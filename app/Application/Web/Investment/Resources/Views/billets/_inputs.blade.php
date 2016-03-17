<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Name</label>

    <div class="col-md-6">
        <input type="text" class="form-control" id="name" name="billet[name]" value="{{ old('name') }}">

        @if ($errors->has('name'))
            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('template') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">template</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="billet[template]" value="{{ old('representation') }}">

        @if ($errors->has('representation'))
            <span class="help-block"><strong>{{ $errors->first('representation') }}</strong></span>
        @endif
    </div>
</div>

