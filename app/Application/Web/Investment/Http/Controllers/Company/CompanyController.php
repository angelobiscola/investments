<?php
namespace App\Application\Web\Investment\Http\Controllers\Company;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Company\Company;
use App\Application\Web\Investment\Http\Requests\Company\CompanyRequest;
use Illuminate\Http\Request as RequestHttp;

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

    public function create()
    {
        return view('investment::companies.create');
    }

    public function store(CompanyRequest $request)
    {
        try
        {
            $company = $this->company->create($request->input('company'));
            $company->Location()->create($request->input('location'));
            return redirect(route('investment.company.index'))->with('status', 'Create');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
     }

    public function edit($id)
    {
        $company = $this->company->find($id);
        return view('investment::companies.edit',compact('company'));
    }

    public function update($id, RequestHttp $request)
    {
        try
        {
            $company = $this->company->find($id);
            $company->update($request->input('company'));

            if ($company->Location) {
                $company->Location()->update($request->input('location'));
            } else {
                $company->Location()->create($request->input('location'));
            }
            return redirect()->back()->with('status', 'edit');
        }
        catch(\Exception $e)
        {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function representative($id)
    {
        return view('investment::companies.representatives.create',compact('id'));
    }

    public function addRepresentative($id, RequestHttp $request)
    {
        $company = $this->company->find($id);
        $company->Representative()->create($request->all());
        return redirect(route('investment.company.edit',$id))->with('status', 'Adicionado');
    }

    public function removeRepresentative($id,RequestHttp $request)
    {
        $company = $this->company->find($id);
        $company->Representative()->find($request->get('r'))->forceDelete();
        return back()->with('status', 'Removido');
    }

    public function destroy($id)
    {
        try
        {
            $this->company->find($id)->delete();
            return back()->with('status','Delete');
        }
        catch(\Exception $e)
        {
            return back()->with('error', $e->getMessage());
        }

    }
}


