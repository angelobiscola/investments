<?php

namespace App\Domains\Company;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logo extends Model
{
    use SoftDeletes;

    protected $fillable = ['file_name','src','company_id'];
    protected $dates    = ['deleted_at'];
}
