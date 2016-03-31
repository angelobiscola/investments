@extends('investment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">IvesT: Boleto(s) {!! $billet->id !!}   </div>

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
                                    <label for="disabledInput" class="col-md-2 control-label">name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->name !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">agency</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->agency !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">agency_dv</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->agency_dv !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">account</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->account !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">acoount_dv</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->account_dv !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">wallet</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->wallet !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">identification</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->identification !!}" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="disabledInput" class="col-md-2 control-label">contract</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="{!! $billet->contract !!}" disabled="">
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
