@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        IvesT: Clients

                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                New
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="{!! route('investment.client.create')!!}?type=f">PF</a></li>
                                <li><a href="{!! route('investment.client.create')!!}?type=j">PJ</a></li>
                            </ul>
                        </div>

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
                                    <td>{!! $client->cpf    !!}</td>
                                    <td>{!! $client->created_at !!}</td>
                                    <td>{!! $client->updated_at !!}</td>
                                    <td>
                                        <a href="{!! route('investment.client.show',$client) !!}" target="_blank" ><i class="glyphicon glyphicon-print"></i></a>
                                        <a href="{!! route('investment.client.investments',$client) !!}"><i class="glyphicon glyphicon-usd"></i></a>
                                        <a href="" ><i class="glyphicon glyphicon-dashboard"></i></a>
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
