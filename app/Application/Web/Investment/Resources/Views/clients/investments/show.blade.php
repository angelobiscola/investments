@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">IvesT: Investments Details [ {!! $investment->Bond->name !!} ]</div>
                        <div class="panel-body">

                            <table class="table table-hover">
                                <thead>
                                <th>Company|Person</th>
                                <th>Value</th>
                                <th>Date Payment</th>
                                <th>Mode</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>#</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{!! $investment->Client->present()->legalOrPhysical(true) !!}</td>
                                        <td>{!! $investment->present()->maskValue   !!}</td>
                                        <td>{!! $investment->present()->datepayment !!} [D+1]</td>
                                        <td>{!! $investment->present()->nameMode    !!}</td>
                                        <td>{!! $investment->present()->nameStatus  !!}</td>
                                        <td>{!! $investment->present()->createdAt !!}</td>
                                        <td>{!! $investment->present()->updatedAt !!}</td>
                                    </tr>
                                </tbody>
                            </table>


                            @if($investment->status)

                                <div class="row">
                                        <div class="col-xs-6 col-md-3">
                                                <a href="{!! route('investment.cpr.invoice.print',$investment->Invoice) !!}" target="_blank"><i class="glyphicon glyphicon-barcode"></i></a>
                                         </div>

                                        <div class="col-xs-6 col-md-3">
                                            <a href="{!! route('investment.client.investment.document',$investment) !!}" target="_blank"><i class="glyphicon glyphicon glyphicon-print"></i></a>
                                        </div>
                                </div>
                                @else


                        </div>

                    @include('investment::clients.investments.rates._simple',['simple' => $s,'compound' =>$c ])

                    <form class="form-horizontal" role="form" method="POST" action="{!! route('investment.client.investment.confirm',$investment) !!}">

                            Data Invoice

                            <div class="form-group{{ $errors->has('mode') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Payment mode</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="investment[mode]">
                                        <option value="0">Simple</option>
                                        <option value="1">Compound</option>
                                    </select>
                                    @if ($errors->has('mode'))
                                        <span class="help-block"><strong>{{ $errors->first('mode') }}</strong></span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('bank') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Bank</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="bank">

                                        @foreach($billets as $b)
                                            <option value="{!! $b->id !!}">{!! $b->name !!}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('bank'))
                                        <span class="help-block"><strong>{{ $errors->first('bank') }}</strong></span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('date_payment') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Dead line</label>

                                <div class="col-md-6">
                                    {!! Form::date('investment[date_payment]', $investment->date_payment, ['class' => 'form-control']) !!}
                                    @if ($errors->has('date_payment'))
                                        <span class="help-block"><strong>{{ $errors->first('date_payment')}}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-check"></i>Confirmed
                                    </button>
                                </div>
                            </div>
                     </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
