@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        Dashboard : <b>{!! $client->present()->legalOrPhysical(true)  !!}</b>

                        <div class="pull-right">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Ação
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu  dropdown-menu-right">

                                </ul>
                            </div>
                        </div>
                        <br /><br />
                    </div>

                    <div class="panel-body">
                    Ultimos investimentos


                        <table class="table table-hover">
                            <thead>
                            <th>Valor</th>
                            <th>Data Pagamento</th>
                            <th>Modalidade</th>
                            <th>Status</th>
                            <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($client->investments->take(5)  as $investment)
                                <tr>
                                    <td>{!! $investment->present()->maskValue   !!}</td>
                                    <td>{!! $investment->present()->datepayment !!} [D+1]</td>
                                    <td>{!! $investment->present()->nameMode    !!}</td>
                                    <td>{!! $investment->present()->nameStatus  !!}</td>
                                    <td>
                                        <a href="{!! route('investment.client.investment.show',$investment) !!}" ><i class="glyphicon glyphicon-eye-open"></i></a>
                                    </td>
                                </tr>
                        @endforeach
                            </tbody>
                        </table>
                        Mais...
                    </div>


                    <div class="panel-body">

                        Ultimos Lançamentos CPR

                        <table class="table table-hover dataTable"  cellspacing="0" width="100%" data-order="3">
                            <thead>
                            <tr>
                                <th>Valor</th>
                                <th>Descrição</th>
                                <th>Vencimento</th>
                                <th>Status</th>
                                <th>Investimento</th>
                                <th>Fatura</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($client->PayableReceivable->take(5)  as $cpr)
                                <tr>
                                    <td>{!! $cpr->present()->maskValue !!}</td>
                                    <td>{!! $cpr->description   !!}</td>
                                    <td>{!! $cpr->present()->dateMaturity !!}</td>
                                    <td>{!! $cpr->present()->nameStatus !!}</td>
                                    <td><a href="{!! route('investment.client.investment.show',$cpr->investment_id) !!}">{!! $cpr->Investment->Bond->name !!} </a> </td>
                                    <td>
                                        <a href="{!! route('investment.cpr.invoice.print',$cpr->invoice_id) !!}" target="_blank"><i class="glyphicon glyphicon glyphicon-barcode"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{!! route('investment.cpr.search')!!}?client={!! $client->id !!}">Mais...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{asset("/bower_components/Chart.js/Chart.min.js")}}"></script>
@stop