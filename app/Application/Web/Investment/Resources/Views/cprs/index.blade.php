@extends('investment::layouts.app')

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
                        <table class="table table-hover">
                            <thead>
                                <th>Id</th>
                                <th>Value</th>
                                <th>Date Maturity</th>
                                <th>Date Payment</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Client</th>
                                <th>Investment</th>
                                <th>invoice</th>
                                <th>Created</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($cprs  as $cpr)
                                <tr>
                                    <td>{!! $cpr->id !!}</td>
                                    <td>{!! number_format($cpr->value,2,".",",") !!}</td>
                                    <td>{!! $cpr->date_maturity !!}</td>
                                    <td>{!! $cpr->date_payment !!}</td>
                                    <td>{!! $cpr->type !!}</td>
                                    <td>{!! $cpr->status !!}</td>
                                    <td><a href="{!! route('investment.client.show',$cpr->client_id) !!}">{!! $cpr->Client->name !!} </a> </td>
                                    <td><a href="{!! route('investment.client.investment.show',$cpr->investment_id) !!}">{!! $cpr->Investment->Bond->name !!} </a> </td>
                                    <td>
                                        <a href="{!! route('investment.cpr.invoice.print',$cpr->invoice_id) !!}" target="_blank"><i class="glyphicon glyphicon glyphicon-barcode"></i></a>
                                    </td>
                                    <td>{!! $cpr->created_at !!}</td>
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
