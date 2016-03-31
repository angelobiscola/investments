<?php
namespace App\Domains\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Legal extends Model
{
    use SoftDeletes,PresentableTrait;

    protected $fillable = ['company_name','cnpj','cnae_principal', 'email','client_id'];
    protected $dates    = ['deleted_at'];
    protected $presenter   = LegalPresenter::class;

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Representatives()
    {
        return $this->hasMany(Representative::create());
    }
}
