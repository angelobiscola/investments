<form class="form-horizontal" role="form" method="POST" action="{{ url(route('investment.client.investment.store',$id)) }}">

    <input type="hidden" name="investment[client_id]" value="{!! $id !!}">
    <input type="hidden" name="investment[bond_id]"   value="{!! $bond->id !!}">


    <div class="panel-body">

        <table class="table table-hover">
            <thead>
            <th>Quota</th>
            <th>Value</th>
            </thead>
            <tbody>
            @for ($i = 0; $i < $bond->quota; $i++)
                <tr>
                  <td><input type="checkbox" name="quota[]" value="{!! $bond->total/$bond->quota !!}"></td>
                  <td>{!! $bond->total/$bond->quota !!}</td>
                </tr>
            @endfor
            </tbody>
        </table>

    @include('investment::clients.investments._inputs')

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-check"></i>Save
            </button>
        </div>
    </div>
</form>