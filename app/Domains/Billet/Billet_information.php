<?php

namespace App\Domains\Billet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billet_information extends Model
{
    use SoftDeletes;

    protected $fillable = ['agency','agency_dv','account','account_dv','wallet','contract','identification','billet_id'];
    protected $dates    = ['deleted_at'];

    public function Billet()
    {
        return $this->belongsTo(Billet::class);
    }
}
