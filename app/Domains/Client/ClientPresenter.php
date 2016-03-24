<?php
namespace App\Domains\Client;
use App\Support\Presenters\AbstractPresenter;


class ClientPresenter extends AbstractPresenter
{

    public function legalOrPhysical()
    {
        return $this->type == 'f' ? \Utils::mask($this->Physical->cpf,\Mask::CPF)  : \Utils::mask($this->Legal->cnpj,\Mask::CNPJ);
    }

}