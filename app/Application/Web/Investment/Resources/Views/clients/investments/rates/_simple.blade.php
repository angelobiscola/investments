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
                <td>{!! $d['value'] !!}</td>
                <td>{!! $d['date'] !!}</td>
                <td>{!! $k+1!!}</td>
                <td>{!! $d['diff'] !!}</td>
            </tr>
        @endforeach
        </tbody>
        <th>Total {!! $simple['total'] !!}</th>
        <th></th>
        <th></th>
        <th>Rate {!! $simple['rate'] !!}</th>
        <th>Interest {!! $simple['interest'] !!}</th>
    </table>

    Compound
    @if(isset($compound))

    <table class="table table-hover">
        <thead>
        <th>Value</th>
        <th>Date</th>
        <th>Number Parcel</th>
        </thead>
        <tbody>
            <tr>
                <td>{!! $compound['interest'] !!}</td>
                <td>{!! $compound['date'] !!}</td>
                <td>{!! 1!!}</td>
            </tr>
        </tbody>
        <th>Total {!! $compound['total'] !!}</th>
        <th></th>
        <th></th>
        <th>Rate {!! $compound['rate'] !!}</th>
        <th>Interest {!! $compound['interest'] !!}</th>
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