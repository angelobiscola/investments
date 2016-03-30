<?php
namespace App\Application\Web\Investment\Http\Controllers\Company;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Application\Web\Investment\Jobs\ExpireBondOperation;
use App\Domains\Company\Bond;
use App\Domains\Company\Prospect;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

class BondController extends BaseController
{
    use DispatchesJobs;

    protected $bond;

    public function __construct(Bond $bond)
    {
        parent::__construct();
        $this->bond = $bond;
    }

    public function index()
    {
        $bonds = $this->bond->whereCompanyId($this->getCompany()->id)->get();
        return view('investment::companies.bonds.index',compact('bonds'));
    }

    public function create(Prospect $prospect)
    {
        return view('investment::companies.bonds.create')->with('prospects',$prospect->all());
    }

    public function store(Request $request)
    {
       try
       {
           $request = $request->input('bond');
           $request['user_id']    = $this->getUser()->id;
           $request['company_id'] = $this->getCompany()->id;

           $bond = $this->bond->create($request);
           $this->expire($bond);

           return redirect(route('investment.company.bond.index'))->with('status','Create');
       }
       catch(\Exception $e)
       {
           return redirect()->back()->withInput()->with('error', $e->getMessage());
       }
    }

    public function available($id)
    {
        $bonds = $this->bond->whereCompanyId($this->getCompany()->id)->get();
        return view('investment::companies.bonds.available',compact('bonds', 'id'));
    }

    public function edit($id, Prospect $prospect)
    {
        try
        {
            $bond = $this->bond->find($id);
            return view('investment::companies.bonds.edit', compact('bond'))->with('prospects',$prospect->all());
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try
        {
            $this->bond->find($id)->update($request->input('bond'));
            return redirect(route('investment.company.bond.index'))->with('status', 'Edit');
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
            $this->bond->destroy($id);
            return redirect(route('investment.company.bond.index'))->with('status', 'Delete');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function investors($id)
    {
        $investors = $this->bond->find($id)->Investments;
        return view('investment::companies.bonds.investors', compact('investors'));
    }

    protected function expire(Bond $bond)
    {
        $expire = \Carbon\Carbon::parse($bond->opportunity)->addDay(1)->diffInSeconds();
        $job = (new ExpireBondOperation($bond))->delay($expire);
        $this->dispatch($job);
    }
}


