@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome INVESTMENT System  <a href="#" ><i class="pull-right glyphicon glyphicon-plus"></i></a> </div>
                        <div class="panel-body">
                            @if($information == '')
                                <table class="table table-hover">
                                    <thead>
                                    <th>Name</th>
                                    <th>CNPJ</th>
                                    <th>Rasão Social</th>
                                    <th>Telefone</th>
                                    <th>#</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> {!! $information !!} </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                Não tem Informações
                            @endif
                        </div>
                        <div class="panel-footer"><a href="{!! route('investment.company.create')!!}"> Adicionar Boleto </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
