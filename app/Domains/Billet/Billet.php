<?php

namespace App\Domains\Billet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billet extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','template'];
    protected $dates    = ['deleted_at'];


    public function Info()
    {
        return $this->hasOne(Billet_information::class);
    }
}
