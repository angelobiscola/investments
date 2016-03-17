<?php

namespace App\Domains\Billet;

use Illuminate\Database\Eloquent\Model;

class Billet extends Model
{
    use SoftDeletes;

    protected $fillable = [''];
    protected $dates    = ['deleted_at'];


    public function Info()
    {
        return $this->hasOne(Billet_information::class);
    }
}
