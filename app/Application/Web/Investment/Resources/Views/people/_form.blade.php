<form class="form-horizontal" role="form" method="POST" action="{{ url(route('investment.person.store')) }}">

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

            @if ($errors->has('name'))
                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>
    </div>


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