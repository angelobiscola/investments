<?php
namespace App\Domains\Client;

use App\Domains\Cpr\Cpr;
use App\Domains\Cpr\Invoice;
use App\Domains\Location\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Client extends Model
{
    use SoftDeletes,PresentableTrait;

    protected $fillable    = ['name','phone','type','email'];
    protected $dates       = ['deleted_at'];
    protected $presenter   = ClientPresenter::class;

    public function Location()
    {
        return $this->morphOne(Location::class, 'locationable');
    }

    //delete Location/Cascade
    function delete()
    {
        $this->Location()->forceDelete();
        parent::delete();
    }

    public function Banks()
    {
        return $this->hasMany(Bank::class);
    }

    public function Legal()
    {
        return $this->hasOne(Legal::class);
    }

    public function Physical()
    {
        return $this->hasOne(Physical::class);
    }


    public function Investments()
    {
        return $this->hasMany(Investment::class);
    }

    public function Invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function PayableReceivable()
    {
        return $this->hasMany(Cpr::class);
    }

}
