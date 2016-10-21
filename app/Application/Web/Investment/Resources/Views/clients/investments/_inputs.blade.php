<div class="form-group{{ $errors->has('mode') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Payment mode</label>

    <div class="col-md-6">
        <select class="form-control" name="investment[mode]">

            <option>Select..</option>
                <option value="0">Monthly</option>
                <option value="1">End of the investment</option>
            </select>
        @if ($errors->has('mode'))
            <span class="help-block"><strong>{{ $errors->first('mode') }}</strong></span>
        @endif

    </div>
</div>

<div class="form-group{{ $errors->has('deadline') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Dead line</label>

    <div class="col-md-6">
        {!! Form::date('data[deadline]', \Carbon\Carbon::now()->addDay(2), ['class' => 'form-control']) !!}
        @if ($errors->has('deadline'))
            <span class="help-block"><strong>{{ $errors->first('deadline')}}</strong></span>
        @endif
    </div>
</div>
