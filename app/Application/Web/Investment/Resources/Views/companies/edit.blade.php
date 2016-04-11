@extends('investment::layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">InvesT: Company    <a href="{!! route('investment.company.logo.create',$company)!!}"><i class="pull-right glyphicon glyphicon-picture"></i></a></div>
                <div class="panel-body">

                    {!! Form::model(['company' => $company, 'location' => $company->Location ], ['route' => ['investment.company.update', $company], 'class' => 'form-horizontal', 'role' => 'form'] ) !!}
                        {{ method_field('PUT') }}
                        @include('investment::companies._inputs')
                        @include('investment::locations._inputs')

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-check"></i>Edit
                                </button>
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>

            @if($company->Representatives->count())
                Representante
                <a href="{!! route('investment.company.representative.create',$company)!!}">Add Representante</a>
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
                    @foreach($company->Representatives  as $representative)
                        <tr>
                            <td>{!! $representative->client->id !!}</td>
                            <td>{!! $representative->client->present()->legalOrPhysical(true) !!}</td>
                            <td>{!! $representative->client->present()->legalOrPhysical !!}</td>
                            <td>{!! $representative->created_at !!}</td>
                            <td>{!! $representative->updated_at !!}</td>
                            <td>
                                <a href="{!! route('investment.company.representative.delete',$company) !!}?r={!!$representative->id!!}" data-method="delete"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @else

                <a href="{!! route('investment.company.representative.create',$company)!!}"> Add Representante </a>

            @endif

        </div>
     </div>
</div>
@endsection
