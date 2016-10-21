<?php
namespace App\Domains\Cpr;

use App\Domains\Client\Client;
use App\Domains\Client\Investment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Cpr extends Model
{
    use SoftDeletes,PresentableTrait;

    protected $fillable  = ['type','status','value','date_maturity', 'date_payment', 'description', 'client_id', 'company_id', 'investment_id','invoice_id', 'cpr_id', 'user_id'];
    protected $dates     = ['deleted_at'];
    protected $presenter = CprPresenter::class;

    public function Installments()
    {
        return $this->hasMany(Cpr::class);
    }

    public function Receipt()
    {
        return $this->hasMany(Receipt::class);
    }

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }

    public function Investment()
    {
        return $this->belongsTo(Investment::class);
    }

    public function Invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

}
