<?php namespace App\Domains\People;

use App\Domains\Bank\Bank;
use App\Domains\Company\Company;
use App\Domains\Location\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','representation','nationality', 'marital_status', 'birth_data', 'profession', 'identity','organ_issuer','cpf','phone','cell_phone','email'];
    protected $dates    = ['deleted_at'];

    public function Location()
    {
        return $this->morphOne(Location::class, 'locationable');
    }

    public function Bank()
    {
        return $this->morphOne(Bank::class, 'bankable');
    }

    public function Company()
    {
        return $this->hasMany(Company::class);
    }

    public function Investments()
    {
        return $this->hasMany(Investment::class);
    }
}
