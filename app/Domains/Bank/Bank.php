<?php

namespace App\Domains\Bank;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','number','agency','current_account','city','state'];
    protected $dates    = ['deleted_at'];

    public function bankable()
    {
        return $this->morphTo();
    }

}
