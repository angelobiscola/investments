<?php
namespace App\Domains\Client;
use App\Support\Presenters\AbstractPresenter;

class LegalPresenter extends AbstractPresenter
{
    public function cnpjLegal()
    {
        return \Utils::mask($this->cnpj,\Mask::CNPJ);
    }
}