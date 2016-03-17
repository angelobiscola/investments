<?php
namespace App\Application\Web\Investment\Http\Controllers;

use App\Domains\Admin\Information;

class HomeController extends BaseController
{
    protected $information;

    public function __construct(Information $information)
    {
        $this->information = $information;
    }

    public function index()
    {
        $information = $this->information->all()->first();
        return view('investment::home', compact('information'));
    }

}

