<?php
namespace App\Domains\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investment extends Model
{
    use SoftDeletes;

    protected $fillable = ['value','quota','date_payment','mode','client_id'];

    protected $hidden   = [];

    protected $dates    = ['deleted_at'];

    public function Client()
    {
        return $this->belongsTo(People::class);
    }
}
