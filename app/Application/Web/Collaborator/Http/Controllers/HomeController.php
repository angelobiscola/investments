<?php
namespace App\Application\Web\Collaborator\Http\Controllers;
use App\Domains\Company\Company;

class HomeController extends BaseController
{

    public function index()
    {
        return view('collaborator::home');
    }


    public function companies()
    {
        $companies = Company::all();
        return view('investment::companies.index',compact('companies'));
    }


    public function changeSession($id)
    {
        $company = Company::find($id);
        session(['company' => $company]);
        return redirect(route('investment.home.index'))->with('status', 'Change Company OK');
    }
}

