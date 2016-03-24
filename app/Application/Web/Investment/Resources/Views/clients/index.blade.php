@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        IvesT: Clients

                        <div class="pull-right">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">New
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu  dropdown-menu-right">
                                    <li><a href="{!! route('investment.client.create')!!}?type=f">PF</a></li>
                                    <li><a href="{!! route('investment.client.create')!!}?type=j">PJ</a></li>
                                </ul>
                            </div>
                        </div>
                        <br /><br />

                    </div>

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
                                <th>Name</th>
                                <th>Cpf</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($clients  as $client)
                                <tr>
                                    <td>{!! $client->name   !!}</td>
                                    <td>{!! $client->present()->legalOrPhysical !!}</td>
                                    <td>{!! $client->present()->createdAt !!}</td>
                                    <td>{!! $client->present()->updatedAt !!}</td>
                                    <td>
                                        <a href="{!! route('investment.client.edit', $client) !!}" ><i class="fa fa-edit"></i></a>
                                        <a href="{!! route('investment.client.show',$client) !!}" target="_blank" ><i class="glyphicon glyphicon-print"></i></a>
                                        <a href="{!! route('investment.client.investments',$client) !!}"><i class="glyphicon glyphicon-usd"></i></a>
                                        <a href="" ><i class="glyphicon glyphicon-dashboard"></i></a>
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
