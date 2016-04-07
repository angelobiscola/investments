<?php

namespace App\Domains\Company;

use App\Domains\Billet\Billet;
use App\Domains\Cpr\Cpr;
use App\Domains\Location\Location;
use App\Domains\Representative\Representative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Company extends Model
{
    use SoftDeletes,PresentableTrait;

    protected $fillable = ['name','company_name','cnpj','cnae_principal', 'phone', 'email'];
    protected $dates    = ['deleted_at'];
    protected $presenter   = CompanyPresenter::class;

    public function Location()
    {
        return $this->morphOne(Location::class, 'locationable');
    }

    public function Representatives()
    {
        return $this->morphMany(Representative::class, 'representativeable');
    }

    //delete Location and Representative Cascade
    function delete()
    {
        $this->Location()->forceDelete();
        $this->Representative()->forceDelete();
        parent::delete();
    }

    public function Billets()
    {
        return $this->hasMany(Billet::class);
    }

    public function Bonds()
    {
        return $this->hasMany(Bond::class);
    }

    public function Prospects()
    {
        return $this->hasMany(Prospect::class);
    }

    public function Cprs()
    {
        return $this->hasMany(Cpr::class);
    }


}
