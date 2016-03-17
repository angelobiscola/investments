<?php
namespace App\Domains\People;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investment extends Model
{
    use SoftDeletes;

    protected $fillable = ['value','quota','date_payment','mode','people_id'];

    protected $hidden   = [];

    protected $dates    = ['deleted_at'];

    public function People()
    {
        return $this->belongsTo(People::class);
    }
}
