<?php
namespace App\Application\Web\Investment\Http\Controllers;

use App\Domains\Admin\Information;

class HomeController extends BaseController
{

    public function index(Information $information)
    {
        return view('investment::home', compact('information'));
    }

}

