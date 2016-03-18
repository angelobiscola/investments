@extends('investment::layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">InvesT: Company</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('investment::companies._form', ['action' => route('investment.company.update',$company->id),'company' => $company])

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
