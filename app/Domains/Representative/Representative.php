<?php
namespace App\Domains\Representative;

use App\Domains\Client\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Representative extends Model
{
    use SoftDeletes;

    protected $fillable = ['client_id' ];
    protected $dates    = ['deleted_at'];


    public function representativeable()
    {
        return $this->morphTo();
    }

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
}
