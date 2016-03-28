<?php
namespace App\Application\Web\Investment\Http\Controllers\Company;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Billet\Billet;
use Illuminate\Http\Request;

class BilletController extends BaseController
{
    protected $billet;

    public function __construct(Billet $billet)
    {
        parent::__construct();
        $this->billet = $billet;
    }

    public function index()
    {
        $billets = $this->billet->whereCompanyId($this->getCompany()->id)->get();
        return view('investment::companies.billets.index',compact('billets'));
    }

    public function create()
    {
        return view('investment::companies.billets.create');
    }

    public function store(Request $request)
    {
        try
        {
            $request = $request->input('billet');
            $request['user_id'] = $this->getUser()->id;
            $this->getCompany()->Billets()->create($request);
            return redirect(route('investment.company.billet.index'))->with('status', 'Create');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        try
        {
            $billet = $this->billet->find($id);
            return view('investment::companies.billets.show', compact('billet'));
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try
        {
            $billet = $this->billet->find($id);
            return view('investment::companies.billets.edit', compact('billet', 'templates'));
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
            $this->billet->find($id)->update($request->input('billet'));
            return redirect(route('investment.company.billet.index'))->with('status', 'Edit');
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
            $this->billet->find($id)->forceDelete();
            return redirect(route('investment.company.billet.index'))->with('status', 'Delete');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}


