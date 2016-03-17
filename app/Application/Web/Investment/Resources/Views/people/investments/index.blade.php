@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">IvesT: Investments  <a href="{!! route('investment.person.investment.create',$id) !!}" ><i class="pull-right glyphicon glyphicon-plus"></i></a> </div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($investments->count())
                    <div class="panel-body">clar

                        <table class="table table-hover">
                            <thead>
                                <th>Company|Person</th>
                                <th>Value</th>
                                <th>Date Payment</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($investments  as $investment)
                                <tr>
                                    <td></td>
                                    <td>{!! $investment->value   !!}</td>
                                    <td>{!! $investment->date_payment    !!}</td>
                                    <td>{!! $investment->created_at !!}</td>
                                    <td>{!! $investment->updated_at !!}</td>
                                    <td>
                                        <a href="" ><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        @else
                        <div class="panel-body text-center">
                            Não á registros.
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
