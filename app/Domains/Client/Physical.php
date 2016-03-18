<?php

namespace App\Domains\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Physical extends Model
{
    use SoftDeletes;

    protected $fillable = ['nationality', 'marital_status', 'birth_data', 'profession', 'identity','organ_issuer','cpf','cell_phone'];
    protected $dates    = ['deleted_at'];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
}
