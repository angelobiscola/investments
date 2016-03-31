@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">IvesT: My Prospects  <a href="{!! route('investment.company.prospect.create')!!}" ><i class="pull-right glyphicon glyphicon-plus"></i></a> </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($prospects  as $prospect)
                                <tr>
                                    <td>{!! $prospect->name   !!}</td>
                                    <td>{!! $prospect->description    !!}</td>
                                    <td>{!! $prospect->created_at !!}</td>
                                    <td>{!! $prospect->updated_at !!}</td>
                                    <td>
                                        <a href="{!! route('investment.company.prospect.edit', $prospect) !!}" ><i class="glyphicon glyphicon glyphicon-edit"></i></a>
                                        <a href="{!! route('investment.company.prospect.delete', $prospect) !!}" data-method="delete"><i class="glyphicon glyphicon glyphicon-trash"></i></a>
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
