@extends('investment::layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{!! route('investment.client.edit', [$id]) !!}"> Edit </a> | Bancos <a href="{!! route('investment.client.bank.create',[$id]) !!}"><i class="pull-right glyphicon glyphicon-plus"></i></a></div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Numero</th>
                            <th>Conta</th>
                            <th>Tipo</th>
                            <th>Cidade</th>
                            <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($banks  as $bank)
                                <tr>
                                    <td>{!! $bank->id      !!}</td>
                                    <td>{!! $bank->name    !!}</td>
                                    <td>{!! $bank->agency  !!}</td>
                                    <td>{!! $bank->account !!}</td>
                                    <td>{!! $bank->type    !!}</td>
                                    <td>{!! $bank->city    !!}</td>
                                    <td>
                                        <a href="{!! route('investment.client.bank.edit', $bank) !!}" ><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="{!! route('investment.client.bank.delete', $bank) !!}" data-method="delete"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
