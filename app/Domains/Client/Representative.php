<?php
namespace App\Domains\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Representative extends Model
{
    use SoftDeletes;

    protected $fillable = ['client_id','legal_id'];
    protected $dates    = ['deleted_at'];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
}
