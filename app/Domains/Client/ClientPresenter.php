<?php
namespace App\Domains\Client;
use App\Support\Presenters\AbstractPresenter;

class ClientPresenter extends AbstractPresenter
{
    public function legalOrPhysical($n = false)
    {
        if($this->type == 'f')
        {
            return $n ?  $this->name : \Utils::mask($this->Physical->cpf,\Mask::CPF);
        }
        else
        {
            return  $n ? $this->Legal->company_name : \Utils::mask($this->Legal->cnpj,\Mask::CNPJ);
        }

    }

    public function phoneClient()
    {
        return \Utils::mask($this->phone, \Mask::TELEFONE);
    }

}