<?php
namespace App\Domains\Company;

use App\Support\Presenters\AbstractPresenter;

class BondPresenter extends AbstractPresenter
{
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
        return \Carbon\Carbon::parse($this->opportunity)->diffInDays();
    }
}