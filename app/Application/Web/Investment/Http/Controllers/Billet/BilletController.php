<?php
namespace App\Application\Web\Investment\Http\Controllers\Billet;

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
        return view('investment::billets.index',compact('billets'));
    }

    public function create()
    {
        return view('investment::billets.create');
    }

    public function store(Request $request)
    {
        $billet = $this->company->Billets()->create($request->input('billet'));
        return redirect(route('investment.billet.info.create',$billet->id));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id)
    {

    }
}


