<?php
namespace App\Domains\Company;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prospect extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','description'];
    protected $dates    = ['deleted_at'];


    public function Bonds()
    {
        return $this->hasMany(Bond::class);
    }
}
