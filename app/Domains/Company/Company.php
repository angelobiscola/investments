<?php

namespace App\Domains\Company;

use App\Domains\Bank\Bank;
use App\Domains\Location\Location;
use App\Domains\People\People;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','company_name','cnpj','cnae_principal', 'phone', 'email','people_id','master'];
    protected $dates    = ['deleted_at'];

    public function Location()
    {
        return $this->morphOne(Location::class, 'locationable');
    }

    public function Bank()
    {
        return $this->morphOne(Bank::class, 'bankable');
    }

    public function People()
    {
        return $this->belongsTo(People::class);
    }

}
