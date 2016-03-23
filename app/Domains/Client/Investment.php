<?php
namespace App\Domains\Client;

use App\Domains\Company\Bond;
use App\Domains\Cpr\Cpr;
use App\Domains\Cpr\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investment extends Model
{
    use SoftDeletes;

    protected $fillable = ['value','status','date_payment','mode','client_id','company_id', 'user_id', 'bond_id'];
    protected $dates    = ['deleted_at'];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Bond()
    {
        return $this->belongsTo(Bond::class);
    }


    public function Invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function Cpr()
    {
        return $this->hasOne(Cpr::class);
    }

    public function Quotas()
    {
        return $this->hasMany(Quota::class);
    }
}
