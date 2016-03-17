<?php

namespace App\Domains\Admin;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use SoftDeletes;

    protected $fillable = ['razao_social','cnpj','cnae_principal', 'telefone', 'email'];
    protected $dates    = ['deleted_at'];

    public function Location()
    {
        return $this->morphOne(Location::class, 'locationable');
    }
}
