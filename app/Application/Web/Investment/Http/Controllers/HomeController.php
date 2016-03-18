<?php
namespace App\Application\Web\Investment\Http\Controllers;

use App\Domains\Company\Company;

class HomeController extends BaseController
{
    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function index()
    {
        $company = $this->company->all()->first();
        return view('investment::home', compact('company'));
    }

}

