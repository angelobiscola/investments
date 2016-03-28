<?php
namespace App\Application\Web\Investment\Http\Controllers\Company;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Company\Prospect;
use Illuminate\Http\Request;

class ProspectController extends BaseController
{
    protected $prospect;

    public function __construct(Prospect $prospect)
    {
        parent::__construct();
        $this->prospect = $prospect;
    }

    public function index()
    {
        $prospects = $this->prospect->whereCompanyId($this->getCompany()->id)->get();
        return view('investment::companies.prospects.index',compact('prospects'));
    }

    public function create()
    {
        return view('investment::companies.prospects.create');
    }

    public function store(Request $request)
    {
       $request = $request->input('prospect');
       $request['user_id']    = $this->getUser()->id;
       $this->getCompany()->Prospects()->create($request);
       return redirect(route('investment.company.prospect.index'))->with('status','saved');
    }

    public function edit($id)
    {
        $prospect = $this->prospect->find($id);
        return view('investment::companies.prospects.edit', compact('prospect'));
    }

    public function update($id, Request $request)
    {
        $this->prospect->find($id)->update($request->input('prospect'));
        return redirect(route('investment.company.prospect.index'));
    }

    public function destroy($id)
    {
        $this->prospect->find($id)->forceDelete();
        return redirect(route('investment.company.prospect.index'));
    }
}


