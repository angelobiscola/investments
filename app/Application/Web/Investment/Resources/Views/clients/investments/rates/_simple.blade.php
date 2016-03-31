<a href="#" id="show">Simulation</a>

<div class="jumbotron" id="simple">

    Simple
    <table class="table table-hover">
        <thead>
        <th>Value</th>
        <th>Date</th>
        <th>Number Parcel</th>
        <th>Dias</th>
        <th>Base de Calculo</th>
        </thead>
        <tbody>
        @foreach($simple['details'] as $k => $d)
            <tr>
                <td>{!! number_format($d['value'],2 ,'.',',')  !!}</td>
                <td>{!! $d['date'] !!}</td>
                <td>{!! $k+1!!}</td>
                <td>{!! $d['diff'] !!}</td>
                <td>{!! $d['calc'] !!}</td>
            </tr>
        @endforeach
        </tbody>
        <th>Total {!! number_format($simple['total'],2 ,'.',',') !!}</th>
        <th></th>
        <th></th>
        <th>Rate {!! $simple['rate'] !!}</th>
        <th>Interest {!! number_format($simple['interest'],2 ,'.',',')  !!}  {!! $simple['percent']  !!}</th>
    </table>


    @if(isset($compound))

    Compound

    <table class="table table-hover">
        <thead>
        <th>Valor</th>
        <th>Data</th>
        <th>Number Parcel</th>
        <th>Dias</th>
        <th>Base de Calculo</th>
        <th>Rendimento</th>
        </thead>
        <tbody>
        @foreach($compound['details'] as $k => $d)
            <tr>
                <td>{!! number_format($d['value'],2 ,'.',',')  !!}</td>
                <td>{!! $d['date'] !!}</td>
                <td>{!! $k+1!!}</td>
                <td>{!! $d['diff'] !!}</td>
                <td>{!! $d['calc'] !!}</td>
                <td>{!! number_format($d['juros'],2,'.', ',') !!}</td>
            </tr>
        @endforeach
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