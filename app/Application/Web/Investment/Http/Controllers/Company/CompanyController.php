<?php
namespace App\Application\Web\Investment\Http\Controllers\Company;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Company\Company;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function index()
    {
        $companies = $this->company->all();
        return view('investment::companies.index',compact('companies'));
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

    public function representative($id)
    {
        return view('investment::companies.representatives.create',compact('id'));
    }

    public function addRepresentative($id, Request $request)
    {
        $company = $this->company->find($id);
        $company->Representative()->create($request->all());
        return redirect(route('investment.company.edit',$id))->with('status', 'Adicionado');
    }

    public function removeRepresentative($id,Request $request)
    {
        $company = $this->company->find($id);
        $company->Representative()->find($request->get('r'))->forceDelete();
        return back()->with('status', 'Removido');
    }

}


