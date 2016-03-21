<?php
namespace App\Application\Web\Investment\Http\Controllers\Client;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Application\Web\Investment\Events\NewInvoiceEvent;
use Illuminate\Http\Request;
use App\Domains\Client\Investment;

class InvestmentController extends BaseController
{
    protected $investment;

    public function __construct(Investment $investment)
    {
        parent::__construct();
        $this->investment = $investment;
    }

    public function create($id)
    {
        $billets =  $this->getCompany()->Billets;
        return view('investment::clients.investments.create',compact('id','billets'))->with('company',$this->getCompany());
    }

    public function store(Request $request)
    {
        $data    = $request->input('data');
        $request = $request->input('investment');
        $request['company_id'] = $this->getCompany()->id;
        $request['user_id']    = $this->getUser()->id;

        $investment = $this->investment->create($request);
        \Event::fire(new NewInvoiceEvent($investment,$data));

        return redirect(route('investment.client.investment.show',$investment->id));
    }

    public function show($id)
    {
        $investment = $this->investment->find($id);
        return view('investment::clients.investments.show',compact('investment'));
    }

    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }
}


