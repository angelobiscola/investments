@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Boleto(s)  <a href="{!! route('investment.company.billet.create')!!}" ><i class="pull-right glyphicon glyphicon-plus"></i></a> </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <th>Nome</th>
                                <th>Modelo</th>
                                <th>Criado</th>
                                <th>Modificado</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($billets  as $billet)
                                <tr>
                                    <td>{!! $billet->name!!} </td>
                                    <td>{!! $billet->present()->relationship('template','name')!!}</td>
                                    <td>{!! $billet->present()->createdAt !!}</td>
                                    <td>{!! $billet->present()->updatedAt !!}</td>
                                    <td>
                                        <a href="{!! route('investment.company.billet.edit', $billet) !!}" ><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="{!! route('investment.company.billet.delete', $billet) !!}" data-method="delete"><i class="glyphicon glyphicon-trash"></i></a>
                                        <!-- a href="" ><i class="glyphicon glyphicon-refresh"></i></a -->
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
