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



<div class="form-group{{ $errors->has('legal.cnpj') ? ' has-error' : '' }}">
    {!! Form::label('CNPJ', 'CNPJ', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <div class="input-group">
            {!! Form::text ('legal[cnpj]', null , ['class' => 'form-control cnpj', 'id' => 'cnpj', 'placeholder' => 'Cnpj...']) !!}

            <span class="input-group-btn">
                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#captchaCNPJ">Consulta!</button>
            </span>
        </div>

        @if ($errors->has('legal.cnpj'))
            <span class="help-block"><strong>{{ $errors->first('legal.cnpj') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('legal.company_name') ? ' has-error' : '' }}">
    {!! Form::label('legal_name', 'Legal_Name', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('legal[company_name]', null , ['class' => 'form-control', 'id' => 'company_name']) !!}

        @if ($errors->has('legal.company_name'))
            <span class="help-block"><strong>{{ $errors->first('legal.company_name') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('legal.cnae_principal') ? ' has-error' : '' }}">
    {!! Form::label('cnae_principal', 'CNAE_Principal', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('legal[cnae_principal]', null , ['class' => 'form-control', 'id' => 'cnae_principal', 'placeholder' => 'Brasil']) !!}

        @if ($errors->has('legal.cnae_principal'))
            <span class="help-block"><strong>{{ $errors->first('legal.cnae_principal') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('legal.site') ? ' has-error' : '' }}">
    {!! Form::label('site', 'Site', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('legal[site]', null , ['class' => 'form-control', 'id' => 'site', 'placeholder' => 'www.site.com.br']) !!}

        @if ($errors->has('legal.site'))
            <span class="help-block"><strong>{{ $errors->first('legal.site') }}</strong></span>
        @endif
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(function() {
            $("#consultarCNPJ").click(function()
            {
                var btn = $(this);
                var old = btn.html();
                var param = {
                    cnpj: $("#cnpj").val(),
                    captcha: $("#cnpjCaptcha").val(),
                    cookie: $("#cnpjCookie").val(),
                };

                console.log(param);

                btn.html('Aguarde! Consultando..');

                $.get("/investment/apis/cnpj/", param, function(json)
                {
                    console.log(json);
                })
                .done(function(json)
                {
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

                    btn.html(old);
                    $('#captchaCNPJ').modal('hide');

                })
                .fail(function(json)
                {
                    alert(json.responseText);
                    btn.html(old);
                    $('#captchaCNPJ').modal('hide');
                });
            });

            $('#captchaCNPJ').on('shown.bs.modal', function ()
            {
                $('#consultarCNPJ').html('Consultar')
                $("#cnpjCaptcha").val('');
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

