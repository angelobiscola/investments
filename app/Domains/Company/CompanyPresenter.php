<?php
namespace App\Domains\Company;
use App\Support\Presenters\AbstractPresenter;

class CompanyPresenter extends AbstractPresenter
{
    public function cnpjCompany()
    {
        return \Utils::mask($this->cnpj, \Mask::CNPJ);
    }

    public function phoneCompany()
    {
        return \Utils::mask($this->phone, \Mask::TELEFONE);
    }
}