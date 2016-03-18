@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">IvesT: Investments</div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                                <th>Company|Person</th>
                                <th>Value</th>
                                <th>Date Payment</th>
                                <th>Created</th>
                                <th>Updated</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>{!! $investment->value   !!}</td>
                                    <td>{!! $investment->date_payment    !!}</td>
                                    <td>{!! $investment->created_at !!}</td>
                                    <td>{!! $investment->updated_at !!}</td>
                                </tr>
                            </tbody>
                        </table>

                        Invoice
                        <div class="row">
                            <div class="col-xs-6 col-md-3">
                                <a href="#" class="thumbnail">
                                    <img src="http://fundoparana.com.br/wp-content/uploads/img.boleto-atrasado.png" alt="..." width="100" height="100">
                                </a>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
