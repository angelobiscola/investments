@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">IvesT: Representatives  <a href="{!! route('investment.client.representative.create',$id)!!}" ><i class="pull-right glyphicon glyphicon-plus"></i></a> </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Cpf</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($representatives  as $representative)
                                <tr>
                                    <td>{!! $representative->client->id !!}</td>
                                    <td>{!! $representative->client->present()->legalOrPhysical(true) !!}</td>
                                    <td>{!! $representative->client->present()->legalOrPhysical !!}</td>
                                    <td>{!! $representative->created_at !!}</td>
                                    <td>{!! $representative->updated_at !!}</td>
                                    <td>
                                        <a href="{!! route('investment.client.representative.delete', $representative) !!}" data-method="delete"><i class="glyphicon glyphicon-trash"></i></a>
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