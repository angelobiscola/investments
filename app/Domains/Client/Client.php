<?php
namespace App\Domains\Client;

use App\Domains\Bank\Bank;
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

    public function Bank()
    {
        return $this->morphOne(Bank::class, 'bankable');
    }

    //delete Location/Banks Cascade
    function delete()
    {
        $this->Location()->forceDelete();
        $this->Bank()->forceDelete();
        parent::delete();
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

    public function PayableReceper()
    {
        return $this->hasMany(Cpr::class);
    }

}
