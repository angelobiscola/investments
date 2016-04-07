<?php

namespace App\Domains\Cpr;

use App\Domains\Billet\Billet;
use App\Domains\Client\Client;
use App\Domains\Client\Investment;
use App\Domains\Company\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Invoice extends Model
{
    use SoftDeletes,PresentableTrait;

    protected $fillable  = ['value','date_maturity', 'date_payment', 'billet_id', 'client_id', 'company_id', 'investment_id', 'user_id'];
    protected $dates     = ['deleted_at'];
    protected $presenter = InvoicePresenter::class;


    public function Cpr()
    {
        return $this->hasOne(Cpr::class);
    }

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Billet()
    {
        return $this->belongsTo(Billet::class);
    }

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }

    public function Investment()
    {
        return $this->belongsTo(Investment::class);
    }


}
