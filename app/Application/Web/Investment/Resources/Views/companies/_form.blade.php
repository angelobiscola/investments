<form class="form-horizontal" role="form" method="POST" action="{!!$action!!}">
    {{ method_field('PUT') }}

    @include('investment::companies._inputs')

    Location
    @include('investment::locations._inputs',['location' => $company->Location ])

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-check"></i>Salvar
            </button>
        </div>
    </div>
</form>