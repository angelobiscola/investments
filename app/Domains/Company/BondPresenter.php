<?php
namespace App\Domains\Company;

use App\Support\Presenters\AbstractPresenter;

class BondPresenter extends AbstractPresenter
{

    public function maskTotal($n =2)
    {
        return number_format($this->total, $n, ',', '.');
    }

    public function rateMode()
    {
        if($this->rate_mode == 1)
        {
            return 'a.m';
        }
        else
        {
            return  'a.a';
        }

    }

    public function expire()
    {
        return $this->active ? \Carbon\Carbon::parse($this->opportunity)->addDay(1)->diffInDays() : 'Expirou' ;
    }

    public function quotaValue()
    {
        return number_format($this->total/$this->quota, 2, ',', '.');
    }
}