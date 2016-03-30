<?php
namespace App\Domains\Cpr;
use App\Support\Presenters\AbstractPresenter;

class CprPresenter extends AbstractPresenter
{

    public function dateMaturity()
    {
        return date("d/m/Y", strtotime($this->date_maturity));
    }

    public function datePayment()
    {
        return  is_null($this->date_payment) ? ' ' : date("d/m/Y", strtotime($this->date_payment));
    }

    public function nameType()
    {
        return $this->type  == 'p' ? 'Pagar' : 'Receber';
    }

    public function nameStatus()
    {
        switch($this->status)
        {
            case 'v' : return 'Vencido';
                break;
            case 'c' : return 'Consolidado';
                break;
            default:   return 'Aberto';
                break;
        }
    }

}