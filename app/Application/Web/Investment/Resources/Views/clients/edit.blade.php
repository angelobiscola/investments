@extends('investment::layouts.app')

        <!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">InvesT: New Client</div>
                    <div class="panel-body">

                        {!! Form::model(['client'=> $client, 'physical' => $client->physical, 'legal' => $client->legal , 'location' => $client->location], ['route' => ['investment.client.update', $client->id], 'class' => 'form-horizontal', 'role' => 'form'] ) !!}
                            {{ method_field('PUT') }}
                            @include('investment::clients._inputs',['type' => $client->type ])
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
            </div>
        </div>
    </div>
@endsection
