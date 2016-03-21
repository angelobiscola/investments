<?php

namespace App\Domains\Billet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billet extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','template','agency','agency_dv','account','account_dv','wallet','contract','identification'];
    protected $dates    = ['deleted_at'];

}
