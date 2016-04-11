<div class="content">
    <div class="title"> Dados Da Conta </div>

    @foreach($client->Banks as $bank)
    <div class="field">
        <div class="size">
            <div class="fild-title"> Nome Agência </div>
            <div class="fild-body"> {!! $bank->name !!} </div>
        </div>
        <div class="size">
            <div class="fild-title"> Local </div>
            <div class="fild-body"> {!! $bank->city !!} </div>
        </div>
        <div class="size">
            <div class="fild-title"> Cod Agência </div>
            <div class="fild-body"> {!! $bank->agency !!} </div>
        </div>
        <div class="size">
            <div class="fild-title"> Tipo. </div>
            <div class="fild-body"> {!! $bank->type == 'c' ? 'Corrente' : 'Poupança' !!} </div>
        </div>
        <div class="size">
            <div class="fild-title"> N° Conta </div>
            <div class="fild-body"> {!! $bank->account !!} </div>
        </div>
    </div>

    @endforeach

</div>

<br><br>
<br><br>
