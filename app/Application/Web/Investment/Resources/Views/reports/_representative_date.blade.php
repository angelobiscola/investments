<div class="content">
    <div class="title"><strong> Dados Do {!! $investment !!} </strong></div>
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
            <div class="fild-title"> CPF </div>
            <div class="fild-body"> {!! $client->Physical->present()->cpfPhysical !!} </div>
        </div>
    </div>
    <div class="size">
        <div class="fild-title"> Data Nascimento </div>
        <div class="fild-body"> {!! $client->Physical->present()->dateBirth !!} </div>
    </div>
    <div class="size">
        <div class="fild-title"> Sexo </div>
        <div class="fild-body"> {!! $client->Physical->genre !!} </div>
    </div>
    <div class="size">
        <div class="fild-title"> Nacionalidade </div>
        <div class="fild-body"> {!! $client->Physical->nationality !!} </div>
    </div>
    <div class="size">
        <div class="fild-title"> Natural </div>
        <div class="fild-body"> {!! $client->Physical->natural !!} </div>
    </div>

</div>

<br><br>

<div class="content">
    <div class="field">
        <div class="size">
            <div class="fild-title"> Profissão  </div>
            <div class="fild-body"> {!! $client->Physical->profession !!} </div>
        </div>
        <div class="size">
            <div class="fild-title"> E-mail </div>
            <div class="fild-body"> {!! $client->email !!} </div>
        </div>
        <div class="size">
            <div class="fild-title"> Telefone </div>
            <div class="fild-body"> {!! $client->phone !!} / {!! $client->Physical->cell_phone !!} </div>
        </div>
    </div>
</div>

<br><br>

<div class="content">
    <div class="field">
        <div class="size">
            <div class="fild-title"> Número da Identidade </div>
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
        <ul>
            <li> {!! $client->Physical->marital_status  !!} </li>
        </ul>
    </div>
</div>

<div class="content">
    <div class="title"><strong> Endereço </strong></div>

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
            <div class="fild-title"> Número </div>
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
            <div class="fild-title"> Município </div>
            <div class="fild-body"> {!! $client->Location->city  !!} </div>
        </div>
    </div>
</div>

<br><br>