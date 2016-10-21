<?php
namespace App\Support\Presenters;

use Laracasts\Presenter\Presenter;


abstract class AbstractPresenter extends Presenter {

    public function createdAt()
    {
        return $this->created_at->format('d/m/Y H:i');
    }

    public function updatedAt()
    {
        return $this->updated_at->format('d/m/Y H:i');
    }

    public function deletedAt()
    {
        return $this->deleted_at->format('d/m/Y H:i');
    }

    public function compactName($n = 15)
    {
        return  str_limit($this->name, $limit = $n, $end = '...');
    }

    public function fullName()
    {
        return $this->first_name.'.'.$this->last_name;
    }

    public function relationship($name,$attribute)
    {
        return $this->$name ? $this->$name->$attribute : 'Not found';
    }

    public function maskValue($n =2)
    {
        return number_format($this->value, $n, ',', '.');
    }

    public function maskCnpj($n =2)
    {
        return \Utils::mask($this->cnpj, \Mask::CNPj);
    }

    public function maskCpf($n =2)
    {
        return \Utils::mask($this->cpf, \Mask::CNPj);
    }

    public function maskZipCode()
    {
        return \Utils::mask($this->zip_code, \Mask::CEP);
    }

    public function maskDate($date)
    {
        return date("d/m/Y", strtotime($date));
    }
}
