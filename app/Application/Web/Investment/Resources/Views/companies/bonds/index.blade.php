@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">IvesT: My Bonds  <a href="{!! route('investment.company.bond.create')!!}" ><i class="pull-right glyphicon glyphicon-plus"></i></a> </div>

                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                                <th>Prospect</th>
                                <th>Total</th>
                                <th>Quota</th>
                                <th>Rate</th>
                                <th>Expire</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                            @foreach($bonds  as $bond)
                                <tr>
                                    <td>{!! $bond->Prospect->name   !!}</td>
                                    <td>{!! $bond->total    !!}</td>
                                    <td>{!! $bond->quota !!} = {!! $bond->total/$bond->quota !!}</td>
                                    <td>{!! $bond->rate !!} | am</td>
                                    <td>{!! \Carbon\Carbon::parse($bond->opportunity)->diffInDays() !!} Days</td>
                                    <td>
                                        <a href="" ><i class="glyphicon glyphicon glyphicon-cog"></i></a>
                                        <a href="" ><i class="glyphicon glyphicon glyphicon-piggy-bank"></i></a>
                                    </td>
                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
