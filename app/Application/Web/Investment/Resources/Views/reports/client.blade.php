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

        .page-break {
            page-break-after: always;
        }

        #footera2{
            width: 80%;
            margin-left: 10%;
            height: 200px;
        }

        #assinaturaa2{
            width: 100%;
            height: 100px;
            margin-top: 10px;
        }

        .assinaturaa2{
            margin-top: 30px;
            width: 50%;
            height: 100px;
            text-align: center;
            float: left;
        }

        .assinaturaa3{
            margin-top: 50px;
            height: 100px;
            text-align: center;
        }

        .line-footera2{
            margin-top: 40px;
        }


    </style>
</head>

<body>
<div id="body">
    <div id="top">
        <div id="top-logo"> Logo </div>
        <div id="top-title"> Ficha de Cadastro do Investidor </div>
    </div>

    <br><br>

    @if($client->type == 'f')

        @include('investment::reports._representative_date', ['client' => $client, 'investment' => 'Investidor'])
        @include('investment::reports._bank', ['client' => $client])

    @else

        <div class="content">
            <div class="title"><strong> Dados Da Empresa </strong></div>
            <div class="field">
                <div class="size col-90">
                    <div class="fild-title"> Nome </div>
                    <div class="fild-body"> {!! $client->Legal->company_name !!} </div>
                </div>
            </div>
        </div>

        <br><br>

        <div class="content">
            <div class="field">
                <div class="size col-50">
                    <div class="fild-title"> CNPJ </div>
                    <div class="fild-body"> {!! $client->Legal->present()->cnpjLegal !!} </div>
                </div>
            </div>
            <div class="field">
                <div class="size">
                    <div class="fild-title"> Telefone </div>
                    <div class="fild-body"> {!! $client->phone !!} </div>
                </div>
                <div class="size">
                    <div class="fild-title"> E-mail </div>
                    <div class="fild-body"> {!! $client->email !!} </div>
                </div>
            </div>
        </div>

        <br><br>

        <div class="content">
            <div class="title"> Endereço </div>

            <div class="field">
                <div class="size">
                    <div class="fild-title"> CEP </div>
                    <div class="fild-body"> {!! $client->Location->zip_code !!} </div>
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
                    <div class="fild-body"> {!! $client->Location->complement !!} </div>
                </div>
                <div class="size">
                    <div class="fild-title"> Bairro </div>
                    <div class="fild-body"> {!! $client->Location->district !!} </div>
                </div>
            </div>
        </div>

        <br><br>

        <div class="content">
            <div class="field">
                <div class="size">
                    <div class="fild-title"> UF </div>
                    <div class="fild-body"> {!! $client->Location->state_abbr !!} </div>
                </div>
            </div>
            <div class="field">
                <div class="size">
                    <div class="fild-title"> Municipio </div>
                    <div class="fild-body"> {!! $client->Location->city !!} </div>
                </div>
            </div>
        </div>

        <br><br>

        @include('investment::reports._bank', ['client' => $client])

        @foreach($client->Legal->Representatives as $k=>$c)

            @include('investment::reports._representative_date', ['client' => $c->client, 'investment' => 'Representante'])

            @include('investment::reports._bank', ['client' => $c->Client])

            @if($client->Legal->Representatives->count() == 2 and $k == 0)
                <div class="page-break"></div>
            @endif

        @endforeach

    @endif

    <div id="dataa2"> Por ser verdade, assino e dou fé a presente Ficha. Curitiba {!! dateLocate() !!} </div>
    <div id="footera2">
        <div id="assinaturaa2">
            @if($client->type == 'f')
                <div class="assinaturaa3">
                    <div class="line-footera2">---------------------------------------</div>
                    <div class="id-footera2">
                        {!! $client->name !!}
                    </div>
                    <div class="id-footera2">
                        CPF: {!! $client->physical->present()->cpfPhysical !!}
                    </div>
                </div>
            @else
                @foreach($client->Legal->Representatives as $k=>$c)
                    <div class="assinaturaa{!! $client->Legal->Representatives->count() == 1 ? '3' : '2' !!}">
                        <div class="line-footera2">---------------------------------------</div>
                        <div class="id-footera2">
                            {!! $c->Client->name !!}
                        </div>
                        <div class="id-footera2">
                            CPF: {!! $c->client->Physical->present()->cpfPhysical !!}
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
</body>

<script>

   //window.print();

</script>


</html>