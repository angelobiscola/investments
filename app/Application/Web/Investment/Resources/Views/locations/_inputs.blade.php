
    <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">zip_code</label>

        <div class="col-md-6">
            <div class="input-group">
                <input type="text" id="zip_code" class="form-control" name="location[zip_code]" value="{{ old('zip_code') }}" placeholder="Cep...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" id="get_code"  type="button">Consulta!</button>
                  </span>
            </div><!-- /input-group -->

            @if ($errors->has('zip_code'))
                <span class="help-block"><strong>{{ $errors->first('zip_code') }}</strong></span>
            @endif
        </div>

    </div>

<div id="control">
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Address</label>

        <div class="col-md-6">
            <input type="text" id="address" class="form-control" name="location[address]" value="{{ old('address') }}">

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
            <input type="text" id="city" class="form-control" name="location[city]" value="{{ old('city') }}">

            @if ($errors->has('city'))
                <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">district</label>

        <div class="col-md-6">
            <input type="text" id="district" class="form-control" name="location[district]" value="{{ old('district') }}">

            @if ($errors->has('district'))
                <span class="help-block"><strong>{{ $errors->first('district') }}</strong></span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('state_abbr') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">state_abbr</label>

        <div class="col-md-6">
            <input type="text" id="state_abbr" class="form-control" name="location[state_abbr]" value="{{ old('state_abbr') }}">

            @if ($errors->has('state_abbr'))
                <span class="help-block"><strong>{{ $errors->first('state') }}</strong></span>
            @endif
        </div>
    </div>
</div>


@section('scripts')
    @parent
       <script>
            $(document).ready(function() {

                $( "#get_code" ).click(function()
                {
                    var btn = $(this);
                    var old = 'Consulta!';
                    var zip_code = $("input#zip_code").val();
                    btn.html('Aguarde! Consultando..');

                    $.getJSON("https://viacep.com.br/ws/"+zip_code+"/json/", function( json )
                    {
                        console.log(json);
                    })
                    .done(function(json)
                    {
                        $('#address').val(json.logradouro);
                        $('#district').val(json.bairro);
                        $('#city').val(json.localidade);
                        $('#state_abbr').val(json.uf);
                        btn.html(old);

                    })
                    .fail(function()
                    {
                        $('#address').val('');
                        $('#district').val('');
                        $('#city').val('');
                        $('#state_abbr').val('');
                        $('#result').html('Cep não encontrado');
                        btn.html(':( Nova Consulta');
                    })

                });

            });
       </script>

@stop