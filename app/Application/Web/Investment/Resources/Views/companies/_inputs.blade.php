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


<div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">CNPJ</label>

    <div class="col-md-6">
        <div class="input-group">
            <input type="text" id="cnpj" class="form-control" name="company[cnpj]" value="{{ old('cnpj') }}" placeholder="Cnpj...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button" data-toggle="modal" data-target="#captchaCNPJ">Consulta!</button>
                  </span>
        </div>

        @if ($errors->has('cpnj'))
            <span class="help-block"><strong>{{ $errors->first('cpnj') }}</strong></span>
        @endif
    </div>

</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">nome</label>

    <div class="col-md-6">
        <input type="text" class="form-control" id='name' name="company[name]" value="{{ old('name') }}">

        @if ($errors->has('name'))
            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">company_name</label>

    <div class="col-md-6">
        <input type="text" class="form-control" id='company_name' name="company[company_name]" value="{{ old('company_name') }}">

        @if ($errors->has('company_name'))
            <span class="help-block"><strong>{{ $errors->first('company_name') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('cnae_principal') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">cnae_principal</label>

    <div class="col-md-6">
        <input type="text" class="form-control" id="cnae_principal" name="company[cnae_principal]" value="{{ old('cnae_principal') }}" placeholder="Brasil">

        @if ($errors->has('cnae_principal'))
            <span class="help-block"><strong>{{ $errors->first('cnae_principal') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">telefone</label>

    <div class="col-md-6">
        <input type="text" class="form-control" id='phone' name="company[phone]" value="{{ old('phone') }}">

        @if ($errors->has('phone'))
            <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">email</label>

    <div class="col-md-6">
        <input type="text" class="form-control" id='email' name="company[email]" value="{{ old('email') }}">

        @if ($errors->has('email'))
            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
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

