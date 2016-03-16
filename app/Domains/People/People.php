<?php namespace App\Domains\People;

use App\Domains\Bank\Bank;
use App\Domains\Location\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    use SoftDeletes;

    protected $fillable = ['*'];
    protected $dates    = ['deleted_at'];

    public function Location()
    {
        return $this->morphOne(Location::class, 'locationable');
    }

    public function Bank()
    {
        return $this->morphOne(Bank::class, 'bankable');
    }

}
