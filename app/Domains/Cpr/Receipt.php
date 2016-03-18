<?php
namespace App\Domains\Cpr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipt extends Model
{
    use SoftDeletes;

    protected $fillable = ['file_name','src','cpr_id'];
    protected $dates    = ['deleted_at'];

    public function Cpr()
    {
        return $this->belongsTo(Cpr::class);
    }

}
