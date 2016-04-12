@section('css')
    @parent
    <link href="{{ asset('/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
@stop


<div class="form-group col-lg-12">
    {!! Form::label('Client', 'Client', array('class' => 'col-lg-2 control-label')) !!}
    <div class="col-lg-9">
        <select name='client_id' class="form-control js-example-basic-hide-search"></select>
    </div>
</div>


@section('scripts')
    @parent
    <script src="{{asset("/bower_components/select2/dist/js/select2.min.js")}}"></script>

    <script type="text/javascript">
        $(function()
        {
            $(".js-example-basic-hide-search").select2({

                ajax: {
                    url: "/investment/apis/clients/physicals/findcpf",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, page) {

                        return {
                            results: $.map(data.items, function (item,i) {
                                return {
                                    text: item.client.name+' : ' +item.cpf,
                                    id: item.client_id,
                                    process:item
                                }
                            })
                        };
                    },
                    cache: true
                },
                minimumInputLength: 3
            })
                    .on("select2:selecting", function(e) {
                        var selected = e.params.args.data.process;
                    });

            });

    </script>
@stop
