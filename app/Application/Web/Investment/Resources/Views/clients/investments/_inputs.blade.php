<div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">value</label>

    <div class="col-md-6">
        <input type="text" class="form-control" id="value" name="investment[name]" value="{{ old('value') }}" disabled>

        @if ($errors->has('value'))
            <span class="help-block"><strong>{{ $errors->first('value') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('quato') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">quato</label>

    <div class="col-md-6">
        <input type="text" class="form-control" id="quato" name="investment[quato]" value="{{ old('quato') }}">

        @if ($errors->has('representation'))
            <span class="help-block"><strong>{{ $errors->first('representation') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('mode') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">mode</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="investment[mode]" value="{{ old('mode') }}">

        @if ($errors->has('mode'))
            <span class="help-block"><strong>{{ $errors->first('mode') }}</strong></span>
        @endif
    </div>
</div>

Data Invoice



@section('scripts')
    @parent
    <script>
        $(function()
        {

            $( "#quato" ).change(function()
            {

                var newvalue = $(this).val()*100000.00;
                $('#value').val(newvalue);

            })

        });
    </script>
@stop


