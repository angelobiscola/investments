<form class="form-horizontal" role="form" method="POST" action="{{ url(route('investment.person.investment.store',$id)) }}">

    <input type="hidden" name="investment[people_id]" value="{!! $id !!}">
    @include('investment::people.investments._inputs')

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-check"></i>Save
            </button>
        </div>
    </div>
</form>