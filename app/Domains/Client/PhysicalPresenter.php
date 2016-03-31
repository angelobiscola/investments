<?php
namespace App\Domains\Client;
use App\Support\Presenters\AbstractPresenter;

class PhysicalPresenter extends AbstractPresenter
{
    public function cpfPhysical()
    {
        return \Utils::mask($this->cpf,\Mask::CPF);
    }
}