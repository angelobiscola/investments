<!-- Modal -->
<div class="modal fade" id="captchaModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Captcha</h4>
            </div>
            <div class="modal-body">
                <img id="imgcaptcha" src=""/><br /><br />
                <input type="text" class="form-control" id="captcha" placeholder="Informe os caracteres da imagem acima" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="consultar" >Consultar</button>
            </div>
        </div>
    </div>
    <input type="hidden" id="cookie" value="">
</div>


@section('scripts')
    @parent
    <script>

        $(document).ready(function()
        {

            var $buttons = $('.action');

            $buttons.each(function(index, element)
            {
                $button = $(element);
                $button.on('click', function(e) {

                    $("#consultar").data('url', $(this).data('url'))
                })
            });

            $('#captchaModal').on('shown.bs.modal', function ()
            {
                $("#captcha").val(''),
                        $("#imgcaptcha").attr('src', "http://www.expresscouriercars.co.uk/img/load.gif");

                $.get("/investment/apis/generateCaptcha/", function(json)
                {
                    $("#imgcaptcha").attr('src', json.captcha);
                    $("#cookie").val(json.cookie);
                });
            });
        });
    </script>
@stop
