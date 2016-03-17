<?php

namespace App\Domains\Admin;

use App\Domains\Location\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Information extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','company_name','cnpj','cnae_principal', 'phone', 'email'];
    protected $dates    = ['deleted_at'];

    public function Location()
    {
        return $this->morphOne(Location::class, 'locationable');
    }
}
