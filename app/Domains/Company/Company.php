<?php

namespace App\Domains\Company;

use App\Domains\Billet\Billet;
use App\Domains\Cpr\Cpr;
use App\Domains\Location\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','company_name','cnpj','cnae_principal', 'phone', 'email'];
    protected $dates    = ['deleted_at'];

    public function Location()
    {
        return $this->morphOne(Location::class, 'locationable');
    }

    //delete Location Cascade
    function delete()
    {
        $this->Location()->forceDelete();
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
