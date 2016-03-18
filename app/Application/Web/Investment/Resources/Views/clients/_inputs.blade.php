<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Name</label>

    <div class="col-md-6">
        <input type="text" class="form-control" id="name" name="client[name]" value="{{ old('name') }}">

        @if ($errors->has('name'))
            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">phone</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="client[phone]" value="{{ old('phone') }}">

        @if ($errors->has('phone'))
            <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">email</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="client[email]" value="{{ old('email') }}">

        @if ($errors->has('email'))
            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
        @endif
    </div>
</div>

<h4>Data Type <b>[{!! $type !!}]</b></h4>
@include('investment::clients._inputs_p'.$type)


