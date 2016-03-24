<?php

namespace App\Domains\Billet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;


class Billet extends Model
{
    use SoftDeletes, PresentableTrait;

    protected $fillable = ['name','agency','agency_dv','account','account_dv','wallet','contract','identification','template_id','company_id','user_id'];
    protected $dates    = ['deleted_at'];

    protected $presenter = BilletPresenter::class;

    public function Template()
    {
        return $this->belongsTo(Template::class);
    }

}
