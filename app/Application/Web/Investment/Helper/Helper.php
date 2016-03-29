<?php

if (! function_exists('jurosSimples')) {

    function jurosSimples($value, $rate, $days, $date)
    {
        $formatDate = explode('-',$date);

        $date    = \Carbon\Carbon::create($formatDate[0],$formatDate[1],$formatDate[2])->addDay(1);
        $oldDate = \Carbon\Carbon::create($formatDate[0],$formatDate[1],$formatDate[2])->addDay(1);

        $parcels     = $days/30;
        $daily_rate  = ($rate/30)/100;

        $rate        = $rate / 100;

        //first date and firstParcel
        $firstDate       = $date->addDay(1)->addMonth(1)->firstOfMonth();
        $diffFirstDate   = $oldDate->diffInDays($firstDate);

        $firstParcel     = ($value * $daily_rate) * $diffFirstDate;

        //dd(($value * $daily_rate) * 360 / $parcels);

        $total        = $value * (1 + $rate * ($parcels));
        $interest     = $total - $value;
        $valueParcels = ($interest / $parcels);

        $details[] = ['date' => $firstDate->toDateString(), 'value' =>$firstParcel,'diff' => $diffFirstDate];

        for($i =0; $i < $parcels-2; $i++)
        {
            $details[] = ['date' => $firstDate->addMonth()->toDateString(), 'value' =>$valueParcels, 'diff' => ' ' ];
        }

        $lastDate      = $oldDate->addDays($days+$diffFirstDate);
        $diffLastDate  = $firstDate->addMonth()->diffInDays($lastDate);
        $lastParcel    = ($value * $daily_rate) * $diffLastDate;

        //$teste = \Carbon\Carbon::now()->addMonth(1)->firstOfMonth();
        //dd($teste->diffInDays($last));

        $details[] = ['date' => $lastDate->toDateString(), 'value' =>$lastParcel, 'diff' => $diffLastDate];

        $total    = ($total - ($valueParcels*2)) + ($firstParcel+$lastParcel);
        $interest = $total - $value;

        return ['total' => $total, 'value_parcels' => $valueParcels, 'interest' =>$interest,'rate'=> $rate*100, 'parcels' =>$parcels, 'details' => $details, 'percent' => ''];
    }
}



if (! function_exists('jurosComposto')) {

    function jurosComposto($value, $rate, $parcels) {

        $rate = $rate / 100;
        $total = $value * pow((1 + $rate), $parcels);

        $interest  = $total - $value;

        return ['total' => $total,'value'=> $value, 'interest' =>$interest,'rate'=> $rate*100, 'date' =>\Carbon\Carbon::now()->addDay(360)];
    }
}


if (! function_exists('valorPorExtenso')) {

    function valorPorExtenso( $valor = 0, $bolExibirMoeda = true, $bolPalavraFeminina = false )
    {

        $valor = removerFormatacaoNumero($valor);

        $singular = null;
        $plural = null;

        if ( $bolExibirMoeda )
        {
            $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }
        else
        {
            $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("", "", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }

        $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
        $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
        $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
        $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");


        if ( $bolPalavraFeminina )
        {

            if ($valor == 1)
            {
                $u = array("", "uma", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            }
            else
            {
                $u = array("", "um", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            }


            $c = array("", "cem", "duzentas", "trezentas", "quatrocentas","quinhentas", "seiscentas", "setecentas", "oitocentas", "novecentas");


        }


        $z = 0;

        $valor = number_format( $valor, 2, ".", "." );
        $inteiro = explode( ".", $valor );

        for ( $i = 0; $i < count( $inteiro ); $i++ )
        {
            for ( $ii = mb_strlen( $inteiro[$i] ); $ii < 3; $ii++ )
            {
                $inteiro[$i] = "0" . $inteiro[$i];
            }
        }

        // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
        $rt = null;
        $fim = count( $inteiro ) - ($inteiro[count( $inteiro ) - 1] > 0 ? 1 : 2);
        for ( $i = 0; $i < count( $inteiro ); $i++ )
        {
            $valor = $inteiro[$i];
            $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
            $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
            $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

            $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
            $t = count( $inteiro ) - 1 - $i;
            $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
            if ( $valor == "000")
                $z++;
            elseif ( $z > 0 )
                $z--;

            if ( ($t == 1) && ($z > 0) && ($inteiro[0] > 0) )
                $r .= ( ($z > 1) ? " de " : "") . $plural[$t];

            if ( $r )
                $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
        }

        $rt = mb_substr( $rt, 1 );

        return($rt ? trim( $rt ) : "zero");

    }
}

if (! function_exists('removerFormatacaoNumero')) {

    function removerFormatacaoNumero($strNumero)
    {

        $strNumero = trim(str_replace("R$", null, $strNumero));

        $vetVirgula = explode(",", $strNumero);
        if (count($vetVirgula) == 1) {
            $acentos = array(".");
            $resultado = str_replace($acentos, "", $strNumero);
            return $resultado;
        } else if (count($vetVirgula) != 2) {
            return $strNumero;
        }

        $strNumero = $vetVirgula[0];
        $strDecimal = mb_substr($vetVirgula[1], 0, 2);

        $acentos = array(".");
        $resultado = str_replace($acentos, "", $strNumero);
        $resultado = $resultado . "." . $strDecimal;

        return $resultado;

    }
}




