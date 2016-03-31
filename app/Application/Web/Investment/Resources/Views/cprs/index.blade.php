@extends('investment::layouts.app')

@section('css')
    @parent
    <link href="{{ asset('/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/datatables/buttons/buttons.dataTables.min.css') }}" rel="stylesheet">
@stop

@section('content')
    <ol class="breadcrumb">
        <li><a href="{!! route('investment.cpr.filter')!!}?t=r&s=a">Receivable</a></li>
        <li><a href="{!! route('investment.cpr.filter')!!}?t=p&s=a">Payable</a></li>
    </ol>

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        IvesT: Cprs
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover dataTable"  cellspacing="0" width="100%" data-order="3">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Value</th>
                                <th>Description</th>
                                <th>Date Maturity</th>
                                <th>Date Payment</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Client</th>
                                <th>Investment</th>
                                <th>invoice</th>
                                <th>Created</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cprs  as $cpr)
                                <tr>
                                    <td>{!! $cpr->id !!}</td>
                                    <td>{!! $cpr->present()->maskValue !!}</td>
                                    <td>{!! $cpr->description   !!}</td>
                                    <td>{!! $cpr->present()->dateMaturity !!}</td>
                                    <td>{!! $cpr->present()->datePayment  !!}</td>
                                    <td>{!! $cpr->present()->nameType !!}</td>
                                    <td>{!! $cpr->present()->nameStatus !!}</td>
                                    <td><a href="{!! route('investment.client.show',$cpr->client_id) !!}">{!! $cpr->Client->present()->legalOrPhysical(true)  !!} </a> </td>
                                    <td><a href="{!! route('investment.client.investment.show',$cpr->investment_id) !!}">{!! $cpr->Investment->Bond->name !!} </a> </td>
                                    <td>
                                        <a href="{!! route('investment.cpr.invoice.print',$cpr->invoice_id) !!}" target="_blank"><i class="glyphicon glyphicon glyphicon-barcode"></i></a>
                                    </td>
                                    <td>{!! $cpr->present()->createdAt !!}</td>
                                    <td>
                                        <a href="{!! route('investment.cpr.consolidate',$cpr) !!}" ><i class="glyphicon glyphicon glyphicon-save"></i></a>
                                        <a href="{!! route('investment.cpr.receipt.create',$cpr) !!}" ><i class="glyphicon glyphicon-ok"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>




    @if(isset($_GET['t']))
    <ol class="breadcrumb">
        <li><a href="{!! route('investment.cpr.filter')!!}?t={!!$_GET['t']!!}&s=v">Overdue</a></li>
        <li><a href="{!! route('investment.cpr.filter')!!}?t={!!$_GET['t']!!}&s=a">Open</a></li>
        <li><a href="{!! route('investment.cpr.filter')!!}?t={!!$_GET['t']!!}&s=c">Consolidate</a></li>
    </ol>
    @endif


@endsection


@section('scripts')
    @parent
        <script src="{{asset("/bower_components/datatables/media/js/jquery.dataTables.min.js")}}"></script>

        <!-- extensions DataTables -->
        <script src="{{asset("/js/datatables_ext/dataTables.select.min.js")}}"></script>
        <script src="{{asset("/js/datatables_ext/dataTables.buttons.min.js")}}"></script>
        <script src="{{asset("/js/datatables_ext/jszip.min.js")}}"></script>
        <script src="{{asset("/js/datatables_ext/pdfmake.min.js")}}"></script>
        <script src="{{asset("/js/datatables_ext/vfs_fonts.js")}}"></script>
        <script src="{{asset("/js/datatables_ext/buttons.html5.min.js")}}"></script>

        <script>

            $(document).ready(function() {

                var $table = $('.dataTable');

                $('.dataTable').DataTable( {

                    "order": [[ 3, "asc" ]],

                    "language": {
                        "sProcessing":   "Processando...",
                        "sLengthMenu":   "Mostrar _MENU_ registros",
                        "sZeroRecords":  "Não foram encontrados resultados",
                        "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                        "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
                        "sInfoPostFix":  "",
                        "sSearch":       "Buscar:",
                        "sUrl":          "",
                        "oPaginate": {
                            "sFirst":    "Primeiro",
                            "sPrevious": "Anterior",
                            "sNext":     "Seguinte",
                            "sLast":     "Último"
                        }
                    },
                    select: {
                        style: 'multi'
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        'excel', 'pdf'
                    ]
                } );
            } );
        </script>
@stop
