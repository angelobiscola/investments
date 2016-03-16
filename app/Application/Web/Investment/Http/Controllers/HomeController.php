<?php
namespace App\Application\Web\Investment\Http\Controllers;

class HomeController extends BaseController
{

    public function index()
    {
        return view('investment::home');
    }

}

