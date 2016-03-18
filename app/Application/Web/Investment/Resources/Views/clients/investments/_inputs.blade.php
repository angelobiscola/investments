<div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">value</label>

    <div class="col-md-6">
        <input type="text" class="form-control" id="value" name="investment[value]" value="{{ old('value') }}" readonly>

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

<div class="form-group{{ $errors->has('bank') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">bank</label>

    <div class="col-md-6">
          <select class="form-control" name="data[bank]">

              <option>Select..</option>
             @foreach($billets as $b)
                <option value="{!! $b->template !!}">{!! $b->name !!}</option>
             @endforeach

        </select>
        @if ($errors->has('bank'))
            <span class="help-block"><strong>{{ $errors->first('bank') }}</strong></span>
        @endif

    </div>
</div>

<div class="form-group{{ $errors->has('deadline') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Deadline</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="data[deadline]" value="{{ old('deadline') }}">

        @if ($errors->has('deadline'))
            <span class="help-block"><strong>{{ $errors->first('deadline')}}</strong></span>
        @endif
    </div>
</div>



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


