@extends('investment::layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">InvesT: Company</div>
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

            @if($company->Representative)
                Representante

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
                    <tr>
                        <td>{!! $company->representative->client->id !!}</td>
                        <td>{!! $company->representative->client->present()->legalOrPhysical(true) !!}</td>
                        <td>{!! $company->representative->client->present()->legalOrPhysical() !!}</td>
                        <td>{!! $company->representative->created_at !!}</td>
                        <td>{!! $company->representative->updated_at !!}</td>
                        <td>
                            <a href="{!! route('investment.company.representative.delete',$company) !!}?r={!!$company->representative->id!!}" data-method="delete"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            @else

                <a href="{!! route('investment.company.representative.create',$company)!!}">Add Representante

            @endif
        </div>
     </div>
</div>
@endsection
