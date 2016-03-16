<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Name</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="person[name]" value="{{ old('name') }}">

        @if ($errors->has('name'))
            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
    </div>
</div>

@if($pj)
<div class="form-group{{ $errors->has('representation') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">representation</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="person[representation]" value="{{ old('representation') }}">

        @if ($errors->has('representation'))
            <span class="help-block"><strong>{{ $errors->first('representation') }}</strong></span>
        @endif
    </div>
</div>
@endif

<div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">nationality</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="person[nationality]" value="{{ old('nationality') }}" placeholder="Brasil">

        @if ($errors->has('nationality'))
            <span class="help-block"><strong>{{ $errors->first('nationality') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('marital_state') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">marital_state</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="person[marital_state]" value="{{ old('marital_state') }}">

        @if ($errors->has('marital_state'))
            <span class="help-block"><strong>{{ $errors->first('nationality') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">birth_date</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="person[birth_date]" value="{{ old('birth_date') }}">

        @if ($errors->has('birth_date'))
            <span class="help-block"><strong>{{ $errors->first('birth_date') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">profession</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="person[profession]" value="{{ old('profession') }}">

        @if ($errors->has('profession'))
            <span class="help-block"><strong>{{ $errors->first('birth_date') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('identity') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">identity</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="person[identity]" value="{{ old('identity') }}">

        @if ($errors->has('identity'))
            <span class="help-block"><strong>{{ $errors->first('identity') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('organ_issuer') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">organ_issuer</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="person[organ_issuer]" value="{{ old('organ_issuer') }}">

        @if ($errors->has('organ_issuer'))
            <span class="help-block"><strong>{{ $errors->first('organ_issuer') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">cpf</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="person[cpf]" value="{{ old('cpf') }}">

        @if ($errors->has('cpf'))
            <span class="help-block"><strong>{{ $errors->first('cpf') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">phone</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="person[phone]" value="{{ old('phone') }}">

        @if ($errors->has('phone'))
            <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('cell_phone') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">cell_phone</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="person[cell_phone]" value="{{ old('cell_phone') }}">

        @if ($errors->has('cell_phone'))
            <span class="help-block"><strong>{{ $errors->first('cell_phone') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">email</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="person[email]" value="{{ old('email') }}">

        @if ($errors->has('email'))
            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
        @endif
    </div>
</div>




