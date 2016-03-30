<?php

namespace App\Domains\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Location extends Model
{
    use SoftDeletes, PresentableTrait;

    protected $fillable = ['address','number','city','zip_code','district','state','state_abbr'];
    protected $hidden   = [];
    protected $dates    = ['deleted_at'];
    protected $presenter = LocationPresenter::class;

    public function locationable()
    {
        return $this->morphTo();
    }
}
