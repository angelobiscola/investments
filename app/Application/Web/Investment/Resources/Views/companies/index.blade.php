@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">IvesT: Companies  <a href="{!! route('investment.company.create')!!}" ><i class="pull-right glyphicon glyphicon-plus"></i></a> </div>

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
                                <th>Company Name</th>
                                <th>Cpf</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($companies  as $company)
                                <tr>
                                    <td>{!! $company->name   !!}</td>
                                    <td>{!! $company->company_name !!}</td>
                                    <td>{!! $company->cnpj    !!}</td>
                                    <td>{!! $company->created_at !!}</td>
                                    <td>{!! $company->updated_at !!}</td>
                                    <td>
                                        <a href="" ><i class="glyphicon glyphicon-refresh"></i></a>
                                        <a href="" ><i class="glyphicon glyphicon-trash"></i></a>
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
