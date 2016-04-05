<!DOCTYPE html>
<html>
<head>
    <title>Ficha de Cadastro</title>
    <meta charset="UTF-8">
    <style>

        body{
            margin: 0px;
        }

        #body{
            padding: 2%;
            margin-left: auto;
            margin-right: auto;
            width: 792px;
            height: 1122px;
            margin-top: 3%;
        }

        #top{
            width: 100%;
            height: 100px;
        }

        #top-logo{
            width: 20%;
            float: left;
            height: 100px;
            text-align: center;
            line-height: 100px;
        }

        #top-title{
            font-size: 25px;
            text-align: center;
            width: 80%;
            float: right;
            line-height: 100px;
        }

        .top-text p{
            font-family: helvetica;
            font-size: 18px;
            line-height: 10%;
        }

        .content{
            margin-bottom: 3%;
            width: 100% !important;
        }

        .title{
            width: 100%;
            font-size: 16px;
            font-family: helvetica;
        }

        .field{
            width: 100% !important;
            margin-top: 1%;
            margin-bottom: 1%;
        }

        .size{
            width: auto;
            float: left;
            padding-left: 1%;
            padding-right: 1%;
            border-right: 1px solid black;
            border-left: 1px solid black;
            border-bottom: 1px solid black;
        }

        .list ol li{
            width: 30%;
            margin-left: 2%;
            float: left;
        }

        /* tamanho das div */

        .col-50{
            width: 50% !important;
        }

        .col-90{
            width: 90% !important;
        }

    </style>
</head>

<body>
<div id="body">
    <div id="top">
        <div id="top-logo"> Logo </div>
        <div id="top-title"> Ficha Cadastro Pessoa {!! $client->type == 'f' ? 'Fisica' : 'Juridica' !!}</div>
    </div>
    <div class="top-text">
        <strong>
            <p>Em se tratando de mais de um titular, preencha uma ficha para cada um.</p>
            <p>Caso Nescessario, ultilize outra ficha para complementar os dados.</p>
        </strong>
    </div>

    <div class="content">
        <div class="title"> Dados Da conta na CAIXA não tem </div>

        <div class="field">
            <div class="size">
                <div class="fild-title"> Cod Agência </div>
                <div class="fild-body"> 123 </div>
            </div>
            <div class="size">
                <div class="fild-title"> Nome Agência </div>
                <div class="fild-body"> Agência </div>
            </div>
            <div class="size">
                <div class="fild-title"> Conta Conjunta </div>
                <div class="fild-body"> Sim / Nao  </div>
            </div>
            <div class="size">
                <div class="fild-title"> Cod Op. </div>
                <div class="fild-body"> 45 </div>
            </div>
            <div class="size">
                <div class="fild-title"> N° Conta Corrente </div>
                <div class="fild-body"> 98765 </div>
            </div>
            <div class="size">
                <div class="fild-title"> N° DV </div>
                <div class="fild-body"> 1 </div>
            </div>

        </div>
    </div>

    <br><br>

    @if($client->type == 'f')

        <div class="content">
            <div class="title"><strong> Dados Pessoais </strong></div>
            <div class="field">
                <div class="size col-50">
                    <div class="fild-title"> CPF do Cliente </div>
                    <div class="fild-body"> {!! $client->Physical->present()->cpfPhysical !!} </div>
                </div>
            </div>
        </div>

        <br><br>

        <div class="content">
            <div class="field">
                <div class="size col-90">
                    <div class="fild-title"> Nome </div>
                    <div class="fild-body">{!! $client->name !!} </div>
                </div>
            </div>
        </div>

        <br><br>

        <div class="content">
            <div class="field">
                <div class="size">
                    <div class="fild-title"> Data Nascimento </div>
                    <div class="fild-body"> {!! $client->Physical->present()->dateBirth !!} </div>
                </div>
                <div class="size">
                    <div class="fild-title"> Sexo </div>
                    <div class="fild-body"> não tem </div>
                </div>
                <div class="size">
                    <div class="fild-title"> Nacionalidade </div>
                    <div class="fild-body"> {!! $client->Physical->nationality !!} </div>
                </div>
                <div class="size">
                    <div class="fild-title"> Natural </div>
                    <div class="fild-body"> não tem </div>
                </div>
            </div>
        </div>

        <br><br>

        <div class="content">
            <div class="field">
                <div class="size">
                    <div class="fild-title"> Numero da Identidade </div>
                    <div class="fild-body"> {!! $client->Physical->identity !!} </div>
                </div>
                <div class="size">
                    <div class="fild-title"> Orgão emissor </div>
                    <div class="fild-body"> {!! $client->Physical->organ_issuer !!} </div>
                </div>
                <div class="size">
                    <div class="fild-title"> UF </div>
                    <div class="fild-body"> RS  não tem </div>
                </div>
                <div class="size">
                    <div class="fild-title"> Data Emissão </div>
                    <div class="fild-body"> 01/10/2006 não tem </div>
                </div>
            </div>
        </div>

        <br><br>

        <div class="content">
            <div class="title"> Estado Civil </div>
            <div class="list">
                <ol>
                    <li> {!! $client->Physical->marital_status  !!} </li>
                </ol>
            </div>
        </div>

        <br><br>

        <div class="content">
            <div class="title"> Endereço Residencial</div>

            <div class="field">
                <div class="size">
                    <div class="fild-title"> CEP </div>
                    <div class="fild-body"> {!! $client->Location->present()->locationCep !!} </div>
                </div>

                <div class="size">
                    <div class="fild-title"> Rua / Avenida / Alameda / Travessa </div>
                    <div class="fild-body"> {!! $client->Location->address !!} </div>
                </div>
                <div class="size">
                    <div class="fild-title"> Numero </div>
                    <div class="fild-body"> {!! $client->Location->number !!} </div>
                </div>
                <div class="size">
                    <div class="fild-title"> Complemento </div>
                    <div class="fild-body"> casa nao tem </div>
                </div>
            </div>

            <div class="field">
                <div class="size">
                    <div class="fild-title"> Bairro </div>
                    <div class="fild-body"> {!! $client->Location->district !!} </div>
                </div>
                <div class="size">
                    <div class="fild-title"> UF </div>
                    <div class="fild-body"> {!! $client->Location->state_abbr !!} </div>
                </div>
                <div class="size">
                    <div class="fild-title"> Municipio </div>
                    <div class="fild-body"> {!! $client->Location->city  !!} </div>
                </div>
            </div>
        </div>

    @else

        @foreach($client->Legal->Representatives as $c)

            <div class="content">
                <div class="title"><strong> Dados Pessoais </strong></div>
                <div class="field">
                    <div class="size col-50">
                        <div class="fild-title"> CPF do Cliente </div>
                        <div class="fild-body"> {!! $c->client->Physical->present()->cpfPhysical !!} </div>
                    </div>
                </div>
            </div>

            <br><br>

            <div class="content">
                <div class="field">
                    <div class="size col-90">
                        <div class="fild-title"> Nome </div>
                        <div class="fild-body">{!! $c->client->name !!} </div>
                    </div>
                </div>
            </div>

            <br><br>

            <div class="content">
                <div class="field">
                    <div class="size">
                        <div class="fild-title"> Data Nascimento </div>
                        <div class="fild-body"> {!! $c->client->Physical->present()->dateBirth !!} </div>
                    </div>
                    <div class="size">
                        <div class="fild-title"> Sexo </div>
                        <div class="fild-body"> não tem </div>
                    </div>
                    <div class="size">
                        <div class="fild-title"> Nacionalidade </div>
                        <div class="fild-body"> {!! $c->client->Physical->nationality !!} </div>
                    </div>
                    <div class="size">
                        <div class="fild-title"> Natural </div>
                        <div class="fild-body"> não tem </div>
                    </div>
                </div>
            </div>

            <br><br>

            <div class="content">
                <div class="field">
                    <div class="size">
                        <div class="fild-title"> Numero da Identidade </div>
                        <div class="fild-body"> {!! $c->client->Physical->identity !!} </div>
                    </div>
                    <div class="size">
                        <div class="fild-title"> Orgão emissor </div>
                        <div class="fild-body"> {!! $c->client->Physical->organ_issuer !!} </div>
                    </div>
                    <div class="size">
                        <div class="fild-title"> UF </div>
                        <div class="fild-body"> RS  não tem </div>
                    </div>
                    <div class="size">
                        <div class="fild-title"> Data Emissão </div>
                        <div class="fild-body"> 01/10/2006 não tem </div>
                    </div>
                </div>
            </div>

            <br><br>

            <div class="content">
                <div class="title"> Estado Civil </div>
                <div class="list">
                    <ol>
                        <li> {!! $c->client->Physical->marital_status  !!} </li>
                    </ol>
                </div>
            </div>

            <br><br>

            <div class="content">
                <div class="title"> Endereço Residencial</div>

                <div class="field">
                    <div class="size">
                        <div class="fild-title"> CEP </div>
                        <div class="fild-body"> {!! $c->client->Location->present()->locationCep !!} </div>
                    </div>

                    <div class="size">
                        <div class="fild-title"> Rua / Avenida / Alameda / Travessa </div>
                        <div class="fild-body"> {!! $c->client->Location->address !!} </div>
                    </div>
                    <div class="size">
                        <div class="fild-title"> Numero </div>
                        <div class="fild-body"> {!! $c->client->Location->number !!} </div>
                    </div>
                    <div class="size">
                        <div class="fild-title"> Complemento </div>
                        <div class="fild-body"> casa nao tem </div>
                    </div>
                </div>

                <div class="field">
                    <div class="size">
                        <div class="fild-title"> Bairro </div>
                        <div class="fild-body"> {!! $c->client->Location->district !!} </div>
                    </div>
                    <div class="size">
                        <div class="fild-title"> UF </div>
                        <div class="fild-body"> {!! $c->client->Location->state_abbr !!} </div>
                    </div>
                    <div class="size">
                        <div class="fild-title"> Municipio </div>
                        <div class="fild-body"> {!! $c->client->Location->city  !!} </div>
                    </div>
                </div>
            </div>

            <br><br>

        @endforeach

    @endif

</div>
</body>

<script>

        window.print();

</script>

</html>