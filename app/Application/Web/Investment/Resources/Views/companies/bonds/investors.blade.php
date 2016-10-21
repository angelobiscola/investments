@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{!!route('investment.company.bond.index') !!}"> Títulos </a> | Investidores </div>

                    <div class="panel-body">

                        @if($investors->count())
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Valor</th>
                                <th>Status</th>
                                <th>Cliente</th>
                                <th>Compania</th>
                                <th>#</th>
                                </thead>
                                <tbody>
                                @foreach($investors  as $investor)
                                    <tr>
                                        <td> {!! $investor->id !!} </td>
                                        <td> {!! $investor->present()->maskTotal  !!} </td>
                                        <td> {!! $investor->present()->nameStatus !!} </td>
                                        <td> {!! $investor->client_id ? $investor->Client->name : '' !!} </td>
                                        <td> {!! $investor->Company ? $investor->Company->name : '' !!} </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            Não tem investidores
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
