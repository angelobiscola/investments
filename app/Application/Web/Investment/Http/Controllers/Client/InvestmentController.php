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

    public function create(Request $request, $id)
    {
        $bond    =  $this->getCompany()->Bonds()->find($request->get('bond'));
        return view('investment::clients.investments.create',compact('id','billets','bond'))->with('company',$this->getCompany());
    }

    public function store(Request $request)
    {
        $quotas    = $request->input('quota');

        $investment                = $request->input('investment');
        $investment['user_id']     = $this->getUser()->id;
        $investment['company_id']  = $this->getCompany()->id;

        $investment = $this->investment->create($investment);
        $this->addQuota($investment,$quotas);

        return redirect(route('investment.client.investment.show',$investment->id));
    }

    public function show($id)
    {
        $investment = $this->investment->find($id);
        $billets    =$this->getCompany()->Billets;

        $s = jurosSimples($investment->value,$investment->Bond->rate,360,$investment->date_payment);
        $c = jurosComposto($investment->value,$investment->Bond->rate,12);

        return view('investment::clients.investments.show',compact('investment','billets','s', 'c'));
    }

    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    private function addQuota($investment, array $quotas)
    {
        $total = 0;

        foreach($quotas as $q)
        {
            $investment->Quotas()->create(['value' => $q]);
            $total += $q;
        }
        return $investment->update(['value' =>$total]);
    }

    public function confirm($id,Request $request)
    {
        $bank= $request->input('bank');

        $investment = $this->investment->find($id);
        $investment->update($request->input('investment'));

        \Event::fire(new NewInvoiceEvent($investment,$bank));

        return back()->with('status','Confirmed');
    }

    public function document($id, Request $request)
    {
        $investment = $this->investment->find($id);

        //$pdf = \PDF::loadView('investment::clients.investments.documents');
        //return $pdf->download('invoice.pdf');

        //$investment->update($request->input('investment'));
        return view('investment::clients.investments.documents',compact('investment'));
    }

}


