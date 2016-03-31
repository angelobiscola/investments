<?php
namespace App\Domains\Company;
use App\Support\Presenters\AbstractPresenter;

class CompanyPresenter extends AbstractPresenter
{
    public function cnpjCompany()
    {
        return \Utils::mask($this->cnpj, \Mask::CNPJ);
    }
}