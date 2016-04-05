<?php
namespace App\Domains\Location;

use App\Support\Presenters\AbstractPresenter;

class LocationPresenter extends AbstractPresenter
{
    public function addressFull()
    {
        return $this->address . ' n° ' . $this->number . ' Bairro ' . $this->district . ' em ' . $this->city . ' - ' . $this->state_abbr . ' , CEP: ' . $this->zip_code ;
    }

    public function locationCep()
    {
        return \Utils::mask($this->zip_code, \Mask::CEP);
    }
}