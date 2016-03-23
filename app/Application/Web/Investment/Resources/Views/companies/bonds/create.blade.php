@extends('investment::layouts.app')

        <!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">InvesT: New Bond</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        {!! Form::open(['route' => ['investment.company.bond.store'], 'class' => 'form-horizontal', 'role' => 'form'] ) !!}

                        @include('investment::companies.bonds._form')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
