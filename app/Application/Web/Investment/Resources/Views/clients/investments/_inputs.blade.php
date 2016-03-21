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
        {!! Form::date('data[deadline]', \Carbon\Carbon::now(), ['class' => 'control']) !!}
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


