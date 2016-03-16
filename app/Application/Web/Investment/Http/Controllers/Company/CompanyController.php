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

    public function index()
    {
        return view('investment::companies.index')->with('companies',$this->company->all());
    }

    public function create()
    {
        return view('investment::companies.create');
    }

    public function store(Request $request,People $people)
    {
        $company = $people->create($request->input('person'))->Company()->create($request->input('company'));

        if($request->input('location'))
        {
            $company->Location()->create($request->input('location'));
        }
    }

    public function show($id)
    {
        dd($this->company->find($id));
    }

    public function edit($id)
    {
        dd($this->company->find($id));
    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id)
    {
        dd($this->company->find($id)->delete());
    }
}


