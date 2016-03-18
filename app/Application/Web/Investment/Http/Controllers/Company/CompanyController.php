<?php
namespace App\Application\Web\Investment\Http\Controllers\Company;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Company\Company;
use App\Domains\People\People;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function edit($id)
    {
        $company = $this->company->find($id);
        return view('investment::companies.edit',compact('company'));
    }

    public function update($id, Request $request)
    {
        $company = $this->company->find($id);
        $company->update($request->input('company'));


        if($company->Location)
        {
            $company->Location()->update($request->input('location'));
        }
        else
        {
            $company->Location()->create($request->input('location'));
        }

        return back();

    }

}


