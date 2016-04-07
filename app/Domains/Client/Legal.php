<?php
namespace App\Domains\Client;

use App\Domains\Representative\Representative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Legal extends Model
{
    use SoftDeletes,PresentableTrait;

    protected $fillable = ['company_name','cnpj', 'site','cnae_principal','cnae_secundary','client_id'];
    protected $dates    = ['deleted_at'];
    protected $presenter   = LegalPresenter::class;

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Representatives()
    {
        return $this->morphMany(Representative::class, 'representativeable');
    }

}
