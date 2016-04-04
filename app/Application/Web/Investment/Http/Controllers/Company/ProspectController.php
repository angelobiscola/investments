<?php
namespace App\Application\Web\Investment\Http\Controllers\Company;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Company\Prospect;
use App\Application\Web\Investment\Http\Requests\Company\ProspectRequest;

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

    public function store(ProspectRequest $request)
    {
       try
       {
           $request = $request->input('prospect');
           $request['user_id']    = $this->getUser()->id;
           $this->getCompany()->Prospects()->create($request);
           return redirect(route('investment.company.prospect.index'))->with('status','saved')->with('status', 'Create');
       }
       catch(\Exception $e)
       {
           return redirect()->back()->withInput()->with('error', $e->getMessage());
       }
    }

    public function edit($id)
    {
        try
        {
            $prospect = $this->prospect->find($id);
            return view('investment::companies.prospects.edit', compact('prospect'));
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update($id, ProspectRequest $request)
    {
        try
        {
            $this->prospect->find($id)->update($request->input('prospect'));
            return redirect(route('investment.company.prospect.index'))->with('status', 'Edit');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try
        {
            $this->prospect->find($id)->forceDelete();
            return redirect(route('investment.company.prospect.index'))->with('status', 'Delete');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}


