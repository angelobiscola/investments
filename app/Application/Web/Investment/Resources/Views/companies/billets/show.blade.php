@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">IvesT: Boleto(s) {!! $billet->id !!}   </div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel-body">

                        <form class="form-horizontal">
                            <fieldset>

                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">ID</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->id !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">Nome</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->name !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">Agência</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->agency !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">Agência_dv</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->agency_dv !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">Conta</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->account !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">Conta_dv</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->account_dv !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">Carteira</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->wallet !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">Identificação</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->identification !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">Contrato</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->contract !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">Compania</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->company_id !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">Usuário</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->user_id !!}" disabled="">
                                    </div>
                                </div>

                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
