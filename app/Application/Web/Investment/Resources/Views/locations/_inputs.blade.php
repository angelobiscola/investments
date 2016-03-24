<div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }}">
    {!! Form::label('zip_code', 'Zip_code', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <div class="input-group">
            {!! Form::text ('location[zip_code]', null , ['class' => 'form-control', 'id'=>'zip_code', 'placeholder' => 'Cep...']) !!}

              <span class="input-group-btn">
                <button class="btn btn-default" id="get_code"  type="button">Consulta!</button>
              </span>
        </div>

        @if ($errors->has('zip_code'))
            <span class="help-block"><strong>{{ $errors->first('zip_code') }}</strong></span>
        @endif
    </div>

</div>

<div id="control">
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        {!! Form::label('Address', 'Address', ['class' => 'col-md-4 control-label']) !!}

        <div class="col-md-6">
            {!! Form::text ('location[address]', null , ['class' => 'form-control', 'id'=>'address']) !!}

            @if ($errors->has('address'))
                <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
            @endif
        </div>

    </div>


    <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
        {!! Form::label('number', 'Number', ['class' => 'col-md-4 control-label']) !!}

        <div class="col-md-6">
            {!! Form::text ('location[number]', null , ['class' => 'form-control', 'id'=>'number']) !!}

            @if ($errors->has('number'))
                <span class="help-block"><strong>{{ $errors->first('number') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
        {!! Form::label('city', 'City', ['class' => 'col-md-4 control-label']) !!}

        <div class="col-md-6">
            {!! Form::text ('location[city]', null , ['class' => 'form-control', 'id'=>'city']) !!}

            @if ($errors->has('city'))
                <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
        {!! Form::label('district', 'District', ['class' => 'col-md-4 control-label']) !!}

        <div class="col-md-6">
            {!! Form::text ('location[district]', null , ['class' => 'form-control', 'id'=>'district']) !!}

            @if ($errors->has('district'))
                <span class="help-block"><strong>{{ $errors->first('district') }}</strong></span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('state_abbr') ? ' has-error' : '' }}">
        {!! Form::label('state_abbr', 'State_abbr', ['class' => 'col-md-4 control-label']) !!}

        <div class="col-md-6">
            {!! Form::text ('location[state_abbr]', null , ['class' => 'form-control', 'id'=>'state_abbr']) !!}

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