<?php

namespace App\Domains\Client;
use App\Support\Presenters\AbstractPresenter;
use Carbon\Carbon;

class InvestmentPresenter extends  AbstractPresenter
{

    public function datePayment()
    {
        return date("d/m/Y", strtotime($this->date_payment));
    }

    public function more361()
    {
        $new_date = Carbon::parse($this->date_payment)->addDays(361);
        return  $new_date->formatLocalized('%d de %B de %Y') ;
    }

    public function moreThreesixone()
    {
        $date  = explode(' ', $this->more361());
        $day   = valorPorExtenso($date[0], false);
        $month = $date[2];
        $year  = valorPorExtenso($date[4], false);
        return $day .' dia(s) do mês de '. $month . ' de ' . $year;
    }

    public function nameStatus()
    {
        return $this->status ? 'Ativo' : 'Inativo';
    }

    public function nameMode()
    {
        switch($this->mode)
        {
            case  1 : return 'Juros Composto';
            default:  return 'Juros Simples';
                break;
        }
    }
}
