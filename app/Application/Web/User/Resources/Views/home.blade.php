@extends('user::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome Users</div>
                    <div class="panel-body">
                        @if($user == '')
                            <table class="table table-hover">
                                <thead>
                                <th>Name</th>
                                <th>CNPJ</th>
                                <th>Rasão Social</th>
                                <th>Telefone</th>
                                <th>#</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> {!! $user !!}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        @else
                            Não tem Usuário(s) Cadastrado(s)
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
