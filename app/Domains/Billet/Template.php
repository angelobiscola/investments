<?php

namespace App\Domains\Billet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $dates    = ['deleted_at'];


    public function Billets()
    {
        return $this->hasMany(Billet::class);
    }
}
