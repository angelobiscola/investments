@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome INVESTMENT System  <a href="{!! route('investment.info.edit',$information->id)!!}" ><i class="pull-right glyphicon glyphicon-edit"></i></a> </div>
                        <div class="panel-body">
                            @if($information )
                                <table class="table table-hover">
                                    <thead>
                                    <th>Name</th>
                                    <th>Rasão Social</th>
                                    <th>CNPJ</th>
                                    <th>Telefone</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! $information->name !!} </td>
                                            <td>{!! $information->company_name !!} </td>
                                            <td>{!! $information->cnpj !!} </td>
                                            <td>{!! $information->phone !!} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                Não tem Informações
                            @endif
                        </div>
                        <div class="panel-footer"><a href="{!! route('investment.billet.index')!!}">Boletos Castrados</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
