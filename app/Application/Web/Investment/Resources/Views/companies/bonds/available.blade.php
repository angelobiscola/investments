@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">IvesT: Bonds Available </div>

                    <div class="panel-body">

                        <ul class="list-group">
                            @foreach($bonds as $b)
                                <a href="{!! route('investment.client.investment.create',$id)!!}?bond={!!$b->id!!}" ><li class="list-group-item"><span class="badge">{!!$b->quota !!}</span>{!! $b->name !!} | {!! $b->Prospect->name !!} </li></a>
                            @endforeach
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
