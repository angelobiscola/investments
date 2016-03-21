<?php

namespace App\Domains\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quota extends Model
{
    use SoftDeletes;

    protected $fillable = ['value','investment_id'];
    protected $dates    = ['deleted_at'];

    public function Investment()
    {
        return $this->belongsTo(Investment::class);
    }

}
