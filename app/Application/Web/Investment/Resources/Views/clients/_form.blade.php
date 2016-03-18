<form class="form-horizontal" role="form" method="POST" action="{{ url(route('investment.client.store')) }}">

    <input type="hidden" name="client[type]" value="{!! $type !!}">

    Data Cleint
    @include('investment::clients._inputs',['type' => $type])


    Data Location
    @include('investment::locations._inputs',['l' =>''])

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-check"></i>Save
            </button>
        </div>
    </div>
</form>