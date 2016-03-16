<?php
namespace App\Application\Web\Collaborator\Http\Controllers;


class HomeController extends BaseController
{

    public function index()
    {
        return view('collaborator::home');
    }

}

