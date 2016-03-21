<?php

namespace App\Domains\Company;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Bond extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','description','rate','rate_mode', 'total', 'quota','opportunity','prospect_id','company_id', 'user_id'];
    protected $dates    = ['deleted_at'];

    public function Prospect()
    {
        return $this->belongsTo(Prospect::class);
    }
}
