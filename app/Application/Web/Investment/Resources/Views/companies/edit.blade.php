@extends('investment::layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">InvesT: Company</div>
                <div class="panel-body">
                      @include('investment::companies._form', ['action' => route('investment.company.update',$company->id),'company' => $company])
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
                        <td>{!! $company->representative->client->present()->legalOrPhysical !!}</td>
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
