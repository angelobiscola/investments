@extends('investment::layouts.app')

<!-- Main Content -->
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{!! route('investment.company.prospect.index') !!}"> Prospectos </a> | Criar</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => ['investment.company.prospect.store'], 'class' => 'form-horizontal', 'role' => 'form'] ) !!}

                            @include('investment::companies.prospects._inputs', ['prospect' => ''])

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-check"></i>Salvar
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
