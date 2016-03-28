@extends('investment::layouts.app')

        <!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">InvesT: Receipt </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                       {!! Form::open(['route' => ['investment.cpr.receipt.upload',$id], 'class' => 'form-horizontal', 'role' => 'form','id'=> 'jquery-filer', 'files' =>true ] ) !!}

                        @include('investment::elements._jquery_filer')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection