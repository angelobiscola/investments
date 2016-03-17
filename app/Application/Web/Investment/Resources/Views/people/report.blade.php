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

        .campo{
            line-height: 150%;
            font-family: helvetica;
            width: auto;
            padding-left: 1%;
            padding-right: 1%;
            float: left;
            margin-top: 1%;
            border-left: 1px solid black;
            border-right: 1px solid black;
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
        .col-100{
            width: 100% !important;
        }



    </style>
</head>

<body>
<div id="body">
    <div id="top">
        <div id="top-logo"> Logo </div>
        <div id="top-title"> Ficha Cadastro Pessoa Fisica</div>
    </div>
    <div class="top-text">
        <strong>
            <p>Em se tratando de mais de um titular, preencha uma ficha para cada um.</p>
            <p>Caso Nescessario, ultilize outra ficha para complementar os dados.</p>
        </strong>
    </div>

    <div class="content">
        <div class="title"> Dados Da conta na CAIXA</div>

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

    <div class="content">
        <div class="title"> Dados Pessoais </div>
        <div class="field">
            <div class="size col-50">
                <div class="fild-title"> CPF do Cliente </div>
                <div class="fild-body"> {!! $person->cpf !!} </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="content">
        <div class="field">
            <div class="size col-100">
                <div class="fild-title"> Nome do Cliente (Completo - sem abreviação)</div>
                <div class="fild-body"> 683.411.794.66 </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="content">
        <div class="field">
            <div class="size">
                <div class="fild-title"> Data Nascimento </div>
                <div class="fild-body"> 04/12/1987 </div>
            </div>
            <div class="size">
                <div class="fild-title"> Sexo </div>
                <div class="fild-body"> M / F </div>
            </div>
            <div class="size">
                <div class="fild-title"> Nacionalidade </div>
                <div class="fild-body"> Brasileiro </div>
            </div>
            <div class="size">
                <div class="fild-title"> Natural </div>
                <div class="fild-body"> UF: Municipio  RS : Erval </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="content">
        <div class="field">
            <div class="size col-100">
                <div class="fild-title"> Nome do Pai </div>
                <div class="fild-body"> Joaquim de Seabra Pessoa </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="content">
        <div class="field">
            <div class="size col-100">
                <div class="fild-title"> Nome da Mãe </div>
                <div class="fild-body"> Maria Madalena Pinheiro Nogueira </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="content">
        <div class="field">
            <div class="size">
                <div class="fild-title"> Numero da Identidade </div>
                <div class="fild-body"> 8088030088 </div>
            </div>
            <div class="size">
                <div class="fild-title"> Orgão emissor </div>
                <div class="fild-body"> SJS </div>
            </div>
            <div class="size">
                <div class="fild-title"> UF </div>
                <div class="fild-body"> RS </div>
            </div>
            <div class="size">
                <div class="fild-title"> Data Emissão </div>
                <div class="fild-body"> 01/10/2006 </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="content">
        <div class="title"> Estado Civil </div>
        <div class="list">
            <ol>
                <li> Solteiro </li>
                <li> Casado(a) Comunhão de Bens </li>
                <li> Casado(a) Comunhão Parcial </li>
                <li> Casado(a) Separação de Bens </li>
                <li> Divorciado(a) </li>
                <li> Separado(a) </li>
                <li> Viuvo(a) </li>
                <li> União Estavél / Outros </li>
            </ol>
        </div>
    </div>

    <br><br>
    <br><br>

    <div class="content">
        <div class="title"> Estado Grau de Instrução  </div>
        <div class="list">
            <ol>
                <li> Não Alfabetizado </li>
                <li> Médio Incompleto </li>
                <li> Superior Completo </li>
                <li> Doutorado </li>
                <li> Ensino Fundamental Incompleto </li>
                <li> Médio Completo </li>
                <li> Especialização </li>
            </ol>
        </div>
    </div>

    <br><br>
    <br><br>


    <div class="content">
        <div class="title"> Dados Do Conjuge / Companheiro(a)</div>

        <div class="field">
            <div class="size">
                <div class="fild-title"> CPF </div>
                <div class="fild-body"> 306.881.867-26</div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="content">
        <div class="field">
            <div class="size">
                <div class="fild-title"> Nome </div>
                <div class="fild-body"> Bastiana </div>
            </div>
            <div class="size">
                <div class="fild-title"> Data  Nascimento </div>
                <div class="fild-body"> 01/01/2001 </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="content">
        <div class="title"> Endereço Residencial</div>

        <div class="field">
            <div class="size">
                <div class="fild-title"> CEP </div>
                <div class="fild-body"> 89802-140 </div>
            </div>
            <div class="size">
                <div class="fild-title"> Rua / Avenida / Alameda / Travessa </div>
                <div class="fild-body"> Rua Marechal Deodoro da Fonseca </div>
            </div>
            <div class="size">
                <div class="fild-title"> Numero </div>
                <div class="fild-body"> 38-E </div>
            </div>
            <div class="size">
                <div class="fild-title"> Complemento </div>
                <div class="fild-body"> casa </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="content">
        <div class="field">
            <div class="size">
                <div class="fild-title"> Bairro </div>
                <div class="fild-body"> Centro </div>
            </div>
            <div class="size">
                <div class="fild-title"> UF </div>
                <div class="fild-body"> SC </div>
            </div>
            <div class="size">
                <div class="fild-title"> Municipio </div>
                <div class="fild-body"> Chapeco </div>
            </div>
        </div>
    </div>

</div>


</body>



</html>