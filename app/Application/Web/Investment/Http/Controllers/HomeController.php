<?php
namespace App\Application\Web\Investment\Http\Controllers;


class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $company = $this->getCompany();
        return view('investment::home', compact('company'));
    }

}

