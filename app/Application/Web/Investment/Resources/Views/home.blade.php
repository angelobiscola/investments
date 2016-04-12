@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Bem Vindo ao Sistema de Investimento  <a href="{!! route('investment.company.edit',$company->id)!!}" ><i class="pull-right glyphicon glyphicon-edit"></i></a> </div>
                        <div class="panel-body">
                            @if($company )
                                <table class="table table-hover">
                                    <thead>
                                    <th>Name</th>
                                    <th>Rasão Social</th>
                                    <th>CNPJ</th>
                                    <th>Telefone</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! $company->name !!} </td>
                                            <td>{!! $company->company_name !!} </td>
                                            <td>{!! $company->cnpj !!} </td>
                                            <td>{!! $company->phone !!} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                Não tem Informações
                            @endif
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                </div>
            </div>

        <ol class="breadcrumb">
            <li><a href="{!! route('investment.company.billet.index')!!}">Boletos</a></li>
            <li><a href="{!! route('investment.company.bond.index')!!}">Títulos</a></li>
            <li><a href="{!! route('investment.company.prospect.index')!!}">Prospecto</a></li>
        </ol>

        </div>

    </div>
@endsection
