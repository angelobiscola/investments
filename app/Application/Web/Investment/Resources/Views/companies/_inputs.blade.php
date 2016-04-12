<!-- Modal -->
<div class="modal fade" id="captchaCNPJ" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Captcha</h4>
            </div>
            <div class="modal-body">
                <img id="cnpjImgCaptcha" src="" height="150"/><br /><br />
                <input type="text" class="form-control" id="cnpjCaptcha" placeholder="Informe os caracteres da imagem acima" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="consultarCNPJ">Consultar</button>
            </div>
        </div>
    </div>
    <input type="hidden" id="cnpjCookie" value="">
</div>


<div class="form-group{{ $errors->has('company.cnpj') ? ' has-error' : '' }}">
    {!! Form::label('CNPJ', 'CNPJ *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <div class="input-group">
            {!! Form::text ('company[cnpj]', null , ['class' => 'form-control cnpj', 'id' => 'cnpj', 'phaceholder' => 'Cnpj...']) !!}

            <span class="input-group-btn">
                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#captchaCNPJ">Consulta!</button>
            </span>
        </div>

        @if ($errors->has('company.cnpj'))
            <span class="help-block"><strong>{{ $errors->first('company.cnpj') }}</strong></span>
        @endif
    </div>

</div>

<div class="form-group{{ $errors->has('company.name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nome Fantasia *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('company[name]', null , ['class' => 'form-control', 'id' => 'name']) !!}

        @if ($errors->has('company.name'))
            <span class="help-block"><strong>{{ $errors->first('company.name') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('company.company_name') ? ' has-error' : '' }}">
    {!! Form::label('company_name', 'Rasão Social *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('company[company_name]', null , ['class' => 'form-control', 'id' => 'company_name']) !!}

        @if ($errors->has('company.company_name'))
            <span class="help-block"><strong>{{ $errors->first('company.company_name') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('company.cnae_principal') ? ' has-error' : '' }}">
    {!! Form::label('cnae_principal', 'CNAE Principal *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('company[cnae_principal]', null , ['class' => 'form-control', 'id' => 'cnae_principal']) !!}

        @if ($errors->has('company.cnae_principal'))
            <span class="help-block"><strong>{{ $errors->first('company.cnae_principal') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('company.cnae_principal') ? ' has-error' : '' }}">
    {!! Form::label('cnae_secondary', 'CNAE Secundário', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('company[cnae_secondary]', null , ['class' => 'form-control', 'id' => 'cnae_secondary']) !!}

        @if ($errors->has('company.cnae_secondary'))
            <span class="help-block"><strong>{{ $errors->first('company.cnae_secondary') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('company.phone') ? ' has-error' : '' }}">
    {!! Form::label('phone', 'Telefone *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('company[phone]', null , ['class' => 'form-control phone', 'id' => 'phone', 'placeholder' => '(41) 3333-3333']) !!}

        @if ($errors->has('company.phone'))
            <span class="help-block"><strong>{{ $errors->first('company.phone') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('company.email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'E-mail *', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('company[email]', null , ['class' => 'form-control', 'id' => 'email']) !!}

        @if ($errors->has('company.email'))
            <span class="help-block"><strong>{{ $errors->first('company.email') }}</strong></span>
        @endif
    </div>
</div>

@section('scripts')
    @parent

    <script>
            $(function() {
                $("#consultarCNPJ").click(function() {
                    var btn = $(this);
                    var old = btn.html();
                    var param = {
                        cnpj: $("#cnpj").val(),
                        captcha: $("#cnpjCaptcha").val(),
                        cookie: $("#cnpjCookie").val(),
                    };

                    console.log(param);

                    btn.html('Aguarde! Consultando..');

                    $.get("/investment/apis/cnpj/", param, function(json) {

                        if (json.code === 0) {

                            $('#name').val(json.nome_fantasia);
                            $('#company_name').val(json.razao_social);
                            $('#cnae_principal').val(json.cnae_principal);
                            $('#cnae_secondary').val(json.cnaes_secundario);
                            $('#phone').val(json.telefone);
                            $('#email').val(json.email);

                            //location
                            $('#zip_code').val(json.cep);
                            $('#address').val(json.logradouro);
                            $('#district').val(json.bairro);
                            $('#city').val(json.cidade);
                            $('#number').val(json.numero);
                            $('#state_abbr').val(json.uf);

                        } else
                            alert(json);
                            btn.html(old);
                        $('#captchaCNPJ').modal('hide');
                    }, "json");
                });

                $('#captchaCNPJ').on('shown.bs.modal', function ()
                {
                    $('#consultarCNPJ').html('Consultar')
                    $("#cnpjCaptcha").val('').focus();
                    $("#cnpjImgCaptcha").attr('src', "http://www.expresscouriercars.co.uk/img/load.gif");

                    $.get("/investment/apis/captchacnpj/", function(json)
                    {
                        $("#cnpjImgCaptcha").attr('src', json.captcha);
                        $("#cnpjCookie").val(json.cookie);
                    });
                });

            });

        </script>
@stop

