@extends('investment::layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{!! \URL::previous() !!}"> Títulos Disponíveis </a> | Novo Investimento</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('investment::clients.investments._form')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
