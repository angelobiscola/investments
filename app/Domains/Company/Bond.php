<?php

namespace App\Domains\Company;

use App\Domains\Client\Investment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Bond extends Model
{
    use SoftDeletes,PresentableTrait;

    protected $fillable  = ['name','description','rate','rate_mode', 'total', 'quota','opportunity','active','prospect_id','company_id', 'user_id'];
    protected $dates     = ['deleted_at'];
    protected $presenter = BondPresenter::class;

    public function Prospect()
    {
        return $this->belongsTo(Prospect::class);
    }

    public function Investments()
    {
        return $this->hasMany(Investment::class);
    }
}
