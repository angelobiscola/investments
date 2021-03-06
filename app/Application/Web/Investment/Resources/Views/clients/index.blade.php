@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        Clientes

                        <div class="pull-right">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Novo
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu  dropdown-menu-right">
                                    <li><a href="{!! route('investment.client.create')!!}?type=f">PF</a></li>
                                    <li><a href="{!! route('investment.client.create')!!}?type=j">PJ</a></li>
                                </ul>
                            </div>
                        </div>
                        <br /><br />
                    </div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Cpf</th>
                            <th>Criado</th>
                            <th>Modificado</th>
                            <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($clients  as $client)
                                <tr>
                                    <td>{!! $client->id !!}</td>
                                    <td>{!! $client->present()->legalOrPhysical(true) !!}</td>
                                    <td>{!! $client->present()->legalOrPhysical !!}</td>
                                    <td>{!! $client->present()->createdAt !!}</td>
                                    <td>{!! $client->present()->updatedAt !!}</td>
                                    <td>
                                        <a href="{!! route('investment.client.edit', $client) !!}" ><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="{!! route('investment.client.dashboard.show', $client) !!}" ><i class="glyphicon glyphicon-dashboard"></i></a>
                                        <a href="{!! route('investment.client.show',$client) !!}" target="_blank" ><i class="glyphicon glyphicon-print"></i></a>
                                        <a href="{!! route('investment.client.investments',$client) !!}"><i class="glyphicon glyphicon-usd"></i></a>
                                        <a href="{!! route('investment.client.delete', $client) !!}" data-method="delete"><i class="glyphicon glyphicon-trash"></i></a>
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
