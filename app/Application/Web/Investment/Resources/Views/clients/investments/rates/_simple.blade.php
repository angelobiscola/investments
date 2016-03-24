<a href="#" id="show">Simulation</a>

<div class="jumbotron" id="simple">

    Simple
    <table class="table table-hover">
        <thead>
        <th>Value</th>
        <th>Date</th>
        <th>Number Parcel</th>
        <th>Calculation Basis</th>
        </thead>
        <tbody>
        @foreach($simple['details'] as $k => $d)
            <tr>
                <td>{!! number_format($d['value'],2 ,'.',',')  !!}</td>
                <td>{!! $d['date'] !!}</td>
                <td>{!! $k+1!!}</td>
                <td>{!! $d['diff'] !!}</td>
            </tr>
        @endforeach
        </tbody>
        <th>Total {!! number_format($simple['total'],2 ,'.',',') !!}</th>
        <th></th>
        <th></th>
        <th>Rate {!! $simple['rate'] !!}</th>
        <th>Interest {!! number_format($simple['interest'],2 ,'.',',')  !!}  {!! $simple['percent']  !!}</th>
    </table>

    Compound
    @if(isset($compound))

    <table class="table table-hover">
        <thead>
        <th>Value</th>
        <th>Date</th>
        <th>Number Parcel</th>
        <th</th>
        </thead>
        <tbody>
            <tr>
                <td>{!! number_format($compound['value'],2 ,'.',',') !!}</td>
                <td>{!! $compound['date'] !!}</td>
                <td>{!! 1!!}</td>
                <td></td>
            </tr>
            <tr>
                <td>{!! number_format($compound['interest'],2 ,'.',',') !!}</td>
                <td>{!! $compound['date'] !!}</td>
                <td>{!! 2!!}</td>
                <td></td>
            </tr>
        </tbody>
        <th>Total {!! number_format($compound['total'],2 ,'.',',')  !!}</th>
        <th></th>
        <th></th>
        <th>Rate {!! $compound['rate'] !!}</th>
        <th>Interest {!! number_format($compound['interest'],2 ,'.',',') !!}</th>
    </table>

    @endif
</div>

@section('scripts')
    @parent
    <script>
        $(function() {

            $("#simple").toggle();

            $("#show").click(function () {
                $("#simple").toggle();
            });

        });
    </script>
@stop