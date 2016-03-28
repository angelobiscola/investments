@extends('investment::layouts.app')

        <!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">InvesT: New Bond</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => ['investment.company.bond.store'], 'class' => 'form-horizontal', 'role' => 'form'] ) !!}

                        @include('investment::companies.bonds._inputs', ['bond' => ''])

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-check"></i>Save
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
