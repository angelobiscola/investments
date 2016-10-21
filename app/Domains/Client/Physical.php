<?php

namespace App\Domains\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Physical extends Model
{
    use SoftDeletes,PresentableTrait;

    protected $fillable = ['nationality', 'marital_status', 'birth_date', 'profession', 'identity','organ_issuer','cpf','cell_phone','genre','natural'];
    protected $dates    = ['deleted_at'];
    protected $presenter   = PhysicalPresenter::class;

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
}
