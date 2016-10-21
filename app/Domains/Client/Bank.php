<?php

namespace App\Domains\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','agency','account', 'type', 'city','state','client_id'];
    protected $dates    = ['deleted_at'];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

}
