<!-- Modal -->
<div class="modal fade" id="captchaCPF" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Captcha</h4>
            </div>
            <div class="modal-body">
                <img id="cpfImgCaptcha" src="" height="150"/><br /><br />
                <input type="text" class="form-control" id="cpfCaptcha" placeholder="Informe os caracteres da imagem acima" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="consultarCPF">Consultar</button>
            </div>
        </div>
    </div>
    <input type="hidden" id="cpfCookie" value="">
</div>

<div class="form-group{{ $errors->has('physical.birth_date') ? ' has-error' : '' }}">
    {!! Form::label('birth_date', 'Data Nascimento *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('physical[birth_date]', null , ['class' => 'form-control data', 'id' => 'birth_date', 'placeholder' => 'Nascimento (DDMMYYYY)']) !!}

        @if ($errors->has('physical.birth_date'))
            <span class="help-block"><strong>{{ $errors->first('physical.birth_date') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('physical.cpf') ? ' has-error' : '' }}">
    {!! Form::label('cpf', 'CPF *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <div class="input-group">
            {!! Form::text ('physical[cpf]', null , ['class' => 'form-control cpf', 'id'=>'cpf', 'placeholder' => 'cpf...']) !!}
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button" data-toggle="modal" data-target="#captchaCPF">Consulta!</button>
                  </span>
        </div>

        @if ($errors->has('physical.cpf'))
            <span class="help-block"><strong>{{ $errors->first('physical.cpf') }}</strong></span>
        @endif
    </div>

</div>

<div class="form-group{{ $errors->has('physical.nationality') ? ' has-error' : '' }}">
    {!! Form::label('nationality', 'Nacionalidade *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
            {!! Form::text ('physical[nationality]', null , ['class' => 'form-control', 'placeholder' => 'Brasil']) !!}

        @if ($errors->has('physical.nationality'))
            <span class="help-block"><strong>{{ $errors->first('physical.nationality') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('physical.natural') ? ' has-error' : '' }}">
    {!! Form::label('natural', 'Natural *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('physical[natural]', null , ['class' => 'form-control', 'placeholder' => 'Curiitba']) !!}

        @if ($errors->has('physical.natural'))
            <span class="help-block"><strong>{{ $errors->first('physical.natural') }}</strong></span>
        @endif
    </div>
</div>

@if(isset($client))
<div class="form-group {{ $errors->has('physical.genre') ? ' has-error' : '' }}">
@else
<div class="form-group {{ $errors->has() ? ' has-error' : '' }}">
@endif

    {!! Form::label('genre', 'Genero *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">

        <select class="form-control" id="physical[genre]" name="physical[genre]">
            @if(isset($client))
                <option name="" value="">Selecione...</option>
                <option id="m" name="m" value="m" @if($client->Physical->genre == 'm') selected @endif>Masculino</option>
                <option id="f" name="f" value="f" @if($client->Physical->genre == 'f') selected @endif>Feminino</option>
            @else
                <option name="" value="">Selecione...</option>
                <option id="m" name="m" value="m">Masculino</option>
                <option id="f" name="f" value="f">Feminino</option>
            @endif
        </select>

        @if ($errors->has('physical.genre'))
            <span class="help-block"><strong>{{ $errors->first('physical.genre') }}</strong></span>
        @endif

    </div>
</div>

@if(isset($client))
<div class="form-group {{ $errors->has('marital_status') ? ' has-error' : '' }}">
@else
<div class="form-group {{ $errors->has() ? ' has-error' : '' }}">
@endif

    {!! Form::label('marital_status', 'Estado Civil *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <select class="form-control" id="physical[marital_status]" name="physical[marital_status]">
              @if(isset($client))
                <option id="solteiro"   name="solteiro(a)" value="solteiro"   @if($client->Physical->marital_status == 'solteiro')   selected @endif>Solteiro(a)</option>
                <option id="casado"     name="casado"      value="casado"     @if($client->Physical->marital_status == 'casado')     selected @endif>Casado(a)</option>
                <option id="separado"   name="separado"    value="separado"   @if($client->Physical->marital_status == 'separado')   selected @endif>Separado(a)</option>
                <option id="divorciado" name="divorciado"  value="divorciado" @if($client->Physical->marital_status == 'divorciado') selected @endif>Divorciado(a)</option>
                <option id="viúvo"      name="viúvo"       value="viúvo"      @if($client->Physical->marital_status == 'viúvo')      selected @endif>Viúvo(a)</option>
            @else
                <option name="" value="">Estado Civil</option>
                <option id="solteiro"   name="solteiro"   value="solteiro">Solteiro(a)</option>
                <option id="casado"     name="casado"     value="casado">Casado(a)</option>
                <option id="separado"   name="separado"   value="separado">Separado(a)</option>
                <option id="divorciado" name="divorciado" value="divorciado">Divorciado(a)</option>
                <option id="viúvo"      name="viúvo"      value="viúvo">Viúvo(a)</option>
            @endif
        </select>

        @if ($errors->has('physical.marital_status'))
            <span class="help-block"><strong>{{ $errors->first('physical.marital_status') }}</strong></span>
        @endif

    </div>
</div>

<div class="form-group{{ $errors->has('physical.profession') ? ' has-error' : '' }}">
    {!! Form::label('profession', 'Profissão *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('physical[profession]', null , ['class' => 'form-control']) !!}

        @if ($errors->has('physical.profession'))
            <span class="help-block"><strong>{{ $errors->first('physical.birth_date') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('physical.identity') ? ' has-error' : '' }}">
    {!! Form::label('identity', 'Identidade *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('physical[identity]', null , ['class' => 'form-control rg']) !!}

        @if ($errors->has('physical.identity'))
            <span class="help-block"><strong>{{ $errors->first('physical.identity') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('physical.organ_issuer') ? ' has-error' : '' }}">
    {!! Form::label('organ_issuer', 'Orgão Expedidor *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('physical[organ_issuer]', null , ['class' => 'form-control']) !!}

        @if ($errors->has('physical.organ_issuer'))
            <span class="help-block"><strong>{{ $errors->first('physical.organ_issuer') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('physical.cell_phone') ? ' has-error' : '' }}">
    {!! Form::label('cell_phone', 'Celular *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('physical[cell_phone]', null , ['class' => 'form-control phone']) !!}

        @if ($errors->has('physical.cell_phone'))
            <span class="help-block"><strong>{{ $errors->first('physical.cell_phone') }}</strong></span>
        @endif
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(function() {
            $("#consultarCPF").click(function() {
                var btn = $(this);
                var old = btn.html();
                var param = {
                    cpf: $("#cpf").val(),
                    date: $("#birth_date").val(),
                    captcha: $("#cpfCaptcha").val(),
                    cookie: $("#cpfCookie").val(),
                };

                console.log(param);

                btn.html('Aguarde! Consultando..');

                $.get("/investment/apis/cpf/", param, function(json)
                {

                })
                .done(function(json)
                {
                    $('#name').val(json.nome);
                    $("#birth_date").val(json.nascimento);
                    btn.html(old);
                    $('#captchaCPF').modal('hide');

                })
                .fail(function(json)
                {
                    alert(json.responseText);
                    btn.html(old);
                    $('#captchaCPF').modal('hide');
                })

            });

            $('#captchaCPF').on('shown.bs.modal', function ()
            {
                $("#cpfCaptcha").val('');
                $("#cpfImgCaptcha").attr('src', "http://www.expresscouriercars.co.uk/img/load.gif");

                $.get("/investment/apis/captchacpf/", function(json)
                {
                    $("#cpfImgCaptcha").attr('src', json.captcha);
                    $("#cpfCookie").val(json.cookie);
                });
            });

        });
    </script>
@stop




