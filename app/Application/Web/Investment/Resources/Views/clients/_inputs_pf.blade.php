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

<div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
    {!! Form::label('birth_date', 'Birth_date', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('physical[birth_date]', null , ['class' => 'form-control', 'id' => 'birth_date', 'placeholder' => 'Nascimento (DDMMYYYY)']) !!}

        @if ($errors->has('birth_date'))
            <span class="help-block"><strong>{{ $errors->first('birth_date') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
    {!! Form::label('cpf', 'CPF', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <div class="input-group">
            {!! Form::text ('physical[cpf]', null , ['class' => 'form-control', 'id'=>'cpf', 'placeholder' => 'cpf...']) !!}
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button" data-toggle="modal" data-target="#captchaCPF">Consulta!</button>
                  </span>
        </div>

        @if ($errors->has('cpf'))
            <span class="help-block"><strong>{{ $errors->first('cpf') }}</strong></span>
        @endif
    </div>

</div>

<div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
    {!! Form::label('nationality', 'Nationality', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
            {!! Form::text ('physical[nationality]', null , ['class' => 'form-control', 'placeholder' => 'Brasil']) !!}

        @if ($errors->has('nationality'))
            <span class="help-block"><strong>{{ $errors->first('nationality') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('marital_state') ? ' has-error' : '' }}">
    {!! Form::label('marital_status', 'Marital_status', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('physical[marital_status]',null , ['class' => 'form-control', 'id' => 'marital_status']) !!}

        @if ($errors->has('marital_status'))
            <span class="help-block"><strong>{{ $errors->first('nationality') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
    {!! Form::label('profession', 'Profession', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('physical[profession]', null , ['class' => 'form-control']) !!}

        @if ($errors->has('profession'))
            <span class="help-block"><strong>{{ $errors->first('birth_date') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('identity') ? ' has-error' : '' }}">
    {!! Form::label('identity', 'Identity', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('physical[identity]', null , ['class' => 'form-control']) !!}

        @if ($errors->has('identity'))
            <span class="help-block"><strong>{{ $errors->first('identity') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('organ_issuer') ? ' has-error' : '' }}">
    {!! Form::label('organ_issuer', 'Organ_issuer', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('physical[organ_issuer]', null , ['class' => 'form-control']) !!}

        @if ($errors->has('organ_issuer'))
            <span class="help-block"><strong>{{ $errors->first('organ_issuer') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('cell_phone') ? ' has-error' : '' }}">
    {!! Form::label('cell_phone', 'Cell_phone', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text ('physical[cell_phone]', null , ['class' => 'form-control']) !!}

        @if ($errors->has('cell_phone'))
            <span class="help-block"><strong>{{ $errors->first('cell_phone') }}</strong></span>
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
                    alert(json);
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




