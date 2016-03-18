<?php
namespace App\Domains\Client;

use App\Domains\Location\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','phone','type','email'];
    protected $dates    = ['deleted_at'];

    public function Location()
    {
        return $this->morphOne(Location::class, 'locationable');
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

}
