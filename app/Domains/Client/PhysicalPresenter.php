<?php
namespace App\Domains\Client;
use App\Application\Web\Investment\Helper\Masks;
use App\Support\Presenters\AbstractPresenter;

class PhysicalPresenter extends AbstractPresenter
{
    public function cpfPhysical()
    {
        return \Utils::mask($this->cpf,\Mask::CPF);
    }

    public function dateBirth()
    {
        return \Utils::mask($this->birth_date, \Mask::DATE);
    }
}