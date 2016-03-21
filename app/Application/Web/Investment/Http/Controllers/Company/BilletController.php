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
        dd($request->all());
        try
        {
            $this->billet->billets()->create($request->input('name'));
            return view('investment::companies.billets.info.create');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $billet = $this->billet->find($id);
        return view('investment::companies.billets.show', compact('billet'));
    }

    public function edit($id)
    {
        $billet = $this->billet->find($id);
        return view('investment::companies.billets.edit', compact('billet'));
    }

    public function update($id, Request $request)
    {
        $this->billet->find($id)->update($request->input('billet'));
        return redirect(route('investment.company.billet.index'))->with('success', 'Editado');
    }

    public function destroy($id)
    {
        try
        {
            $this->billet->delete($id);
            return redirect()->back()->with('success', 'Excluido');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}


