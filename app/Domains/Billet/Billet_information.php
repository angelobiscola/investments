<?php

namespace App\Domains\Billet;

use Illuminate\Database\Eloquent\Model;

class Billet_information extends Model
{
    use SoftDeletes;

    protected $fillable = [''];
    protected $dates    = ['deleted_at'];

    public function Billet()
    {
        return $this->belongsTo(Billet::class);
    }
}
