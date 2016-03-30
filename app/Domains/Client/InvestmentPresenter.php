<?php

namespace App\Domains\Client;
use App\Support\Presenters\AbstractPresenter;

class InvestmentPresenter extends  AbstractPresenter
{

    public function datePayment()
    {
        return date("d/m/Y", strtotime($this->date_payment));
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
