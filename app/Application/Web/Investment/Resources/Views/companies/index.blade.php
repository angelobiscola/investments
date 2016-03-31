@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        IvesT: Companies
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>CNPJ</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($companies  as $company)
                                <tr>
                                    <td>{!! $company->name   !!}</td>
                                    <td>{!! $company->cnpj    !!}</td>
                                    <td>{!! $company->created_at !!}</td>
                                    <td>{!! $company->updated_at !!}</td>
                                    <td>
                                        <a href="{!! route('collaborator.home.change',$company) !!}" ><i class="glyphicon glyphicon glyphicon-sort"></i></a>
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
