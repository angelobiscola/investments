<!-- Modal -->
<div class="modal fade" id="captchaCNPJ" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Captcha</h4>
            </div>
            <div class="modal-body">
                <img id="cnpjImgCaptcha" src=""/><br /><br />
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



<div class="form-group{{ $errors->has('razao_social') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">razao_social</label>

    <div class="col-md-6">
        <input type="text" class="form-control" id='razao_social' name="company[razao_social]" value="{{ old('razao_social') }}">

        @if ($errors->has('razao_social'))
            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
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

<div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">telefone</label>

    <div class="col-md-6">
        <input type="text" class="form-control" id='telefone' name="company[telefone]" value="{{ old('telefone') }}">

        @if ($errors->has('telefone'))
            <span class="help-block"><strong>{{ $errors->first('telefone') }}</strong></span>
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

                            $('#razao_social').val(json.razao_social);
                            $('#cnae_principal').val(json.cnae_principal);
                            $('#telefone').val(json.telefone);

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

