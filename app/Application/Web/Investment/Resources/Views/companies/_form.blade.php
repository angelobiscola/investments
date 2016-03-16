<form class="form-horizontal" role="form" method="POST" action="{{ url(route('investment.company.store')) }}">

    tab Company
    @include('investment::companies._inputs')

    tab Person
    @include('investment::people._inputs',['pj' => true])

    tab Location
    @include('investment::locations._inputs')

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-check"></i>Save
            </button>
        </div>
    </div>
</form>