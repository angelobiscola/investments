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
        return  carbon:: now()->addDays(361)->formatLocalized('%d de %B de %Y') ;
    }

    public function moreThreesixone()
    {
        $day = valorPorExtenso(carbon:: now()->addDays(361)->formatLocalized('%d'), false);
        $month = carbon:: now()->addDays(361)->formatLocalized('%B');
        $year = valorPorExtenso(carbon:: now()->addDays(361)->formatLocalized('%Y'), false);
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
