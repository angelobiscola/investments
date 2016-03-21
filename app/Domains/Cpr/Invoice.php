<?php

namespace App\Domains\Cpr;

use App\Domains\Client\Client;
use App\Domains\Client\Investment;
use App\Domains\Company\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = ['bank','status','value','date_maturity', 'date_payment', 'client_id', 'company_id', 'investment_id', 'user_id', 'cpr_id'];
    protected $dates    = ['deleted_at'];


    public function Cpr()
    {
        return $this->hasOne(Cpr::class);
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
        return $this->hasOne(Investment::class);
    }


}
