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
        return view('investment::companies.billets.create')->with('billet', $this->billet);
    }

    public function store(Request $request)
    {
        $request = $request->input('billet');
        $request['user_id'] = $this->getUser()->id;
        $this->getCompany()->Billets()->create($request);
        return redirect(route('investment.company.billet.index'));
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
        return redirect(route('investment.company.billet.index'));
    }

    public function destroy($id)
    {
        $this->billet->destroy($id);
        return redirect(route('investment.company.billet.index'));
    }
}


