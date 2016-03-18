<?php
namespace App\Domains\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Legal extends Model
{
    use SoftDeletes;

    protected $fillable = ['company_name','cnpj','cnae_principal', 'email','client_id'];
    protected $dates    = ['deleted_at'];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
}
