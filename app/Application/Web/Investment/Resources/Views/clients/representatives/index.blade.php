@extends('investment::layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">IvesT: Representatives <i class="pull-right glyphicon glyphicon-plus"></i></a> </div>
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
                                        <a href="{!! route('investment.client.representative.delete', $id) !!}?r={!!$representative->id!!}" data-method="delete"><i class="glyphicon glyphicon-trash"></i></a>
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

    @include('investment::clients.representatives.create',['id' =>$id])

@endsection