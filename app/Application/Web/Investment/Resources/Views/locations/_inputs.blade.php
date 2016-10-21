<div class="form-group{{ $errors->has('location.zip_code') ? ' has-error' : '' }}">
    {!! Form::label('zip_code', 'Cep *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <div class="input-group">
            {!! Form::text ('location[zip_code]', null , ['class' => 'form-control cep', 'id'=>'zip_code']) !!}

              <span class="input-group-btn">
                <button class="btn btn-default" id="get_code"  type="button">Consulta!</button>
              </span>
        </div>

        @if ($errors->has('location.zip_code'))
            <span class="help-block"><strong>{{ $errors->first('location.zip_code') }}</strong></span>
        @endif
    </div>

</div>

<div id="control">
    <div class="form-group{{ $errors->has('location.address') ? ' has-error' : '' }}">
        {!! Form::label('Address', 'Endereço *', ['class' => 'col-md-4 control-label']) !!}

        <div class="col-md-6">
            {!! Form::text ('location[address]', null , ['class' => 'form-control', 'id'=>'address']) !!}

            @if ($errors->has('location.address'))
                <span class="help-block"><strong>{{ $errors->first('location.address') }}</strong></span>
            @endif
        </div>

    </div>


    <div class="form-group{{ $errors->has('location.number') ? ' has-error' : '' }}">
        {!! Form::label('number', 'Número *', ['class' => 'col-md-4 control-label']) !!}

        <div class="col-md-6">
            {!! Form::text ('location[number]', null , ['class' => 'form-control', 'id'=>'number']) !!}

            @if ($errors->has('location.number'))
                <span class="help-block"><strong>{{ $errors->first('location.number') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('location.complement') ? ' has-error' : '' }}">
        {!! Form::label('complement', 'Complemento *', ['class' => 'col-md-4 control-label']) !!}

        <div class="col-md-6">
            {!! Form::text ('location[complement]', null , ['class' => 'form-control', 'id'=>'complement']) !!}

            @if ($errors->has('location.complement'))
                <span class="help-block"><strong>{{ $errors->first('location.complement') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('location.city') ? ' has-error' : '' }}">
        {!! Form::label('city', 'Cidade *', ['class' => 'col-md-4 control-label']) !!}

        <div class="col-md-6">
            {!! Form::text ('location[city]', null , ['class' => 'form-control', 'id'=>'city']) !!}

            @if ($errors->has('location.city'))
                <span class="help-block"><strong>{{ $errors->first('location.city') }}</strong></span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('location.district') ? ' has-error' : '' }}">
        {!! Form::label('district', 'Bairro *', ['class' => 'col-md-4 control-label']) !!}

        <div class="col-md-6">
            {!! Form::text ('location[district]', null , ['class' => 'form-control', 'id'=>'district']) !!}

            @if ($errors->has('location.district'))
                <span class="help-block"><strong>{{ $errors->first('location.district') }}</strong></span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('location.state_abbr') ? ' has-error' : '' }}">
        {!! Form::label('state_abbr', 'UF *', ['class' => 'col-md-4 control-label']) !!}

        <div class="col-md-6">
            {!! Form::text ('location[state_abbr]', null , ['class' => 'form-control', 'id'=>'state_abbr']) !!}

            @if ($errors->has('location.state_abbr'))
                <span class="help-block"><strong>{{ $errors->first('location.state_abbr') }}</strong></span>
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