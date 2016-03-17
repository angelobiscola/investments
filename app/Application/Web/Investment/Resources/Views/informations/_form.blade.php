<form class="form-horizontal" role="form" method="POST" action="{!!$action!!}">
    {{ method_field('PUT') }}

    @include('investment::informations._inputs')

    tab Location
    @include('investment::locations._inputs',['l' =>$information->location ])

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-check"></i>Save
            </button>
        </div>
    </div>
</form>