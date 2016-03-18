<?php
namespace App\Domains\Cpr;

use App\Domains\Admin\Client;
use App\Domains\Client\Investment;
use App\Domains\Company\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cpr extends Model
{
    use SoftDeletes;

    protected $fillable = ['type','status','value','date_maturity', 'date_payment', 'description', 'client_id', 'company_id', 'investment_id','invoice_id', 'cpr_id'];
    protected $dates    = ['deleted_at'];


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
        return $this->hasOne(Client::class);
    }

    public function Company()
    {
        return $this->hasOne(Company::class);
    }

    public function Investment()
    {
        return $this->hasOne(Investment::class);
    }

}
