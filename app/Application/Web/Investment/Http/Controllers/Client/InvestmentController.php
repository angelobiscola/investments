<?php
namespace App\Application\Web\Investment\Http\Controllers\Client;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Core\Events\NewInvoiceEvent;
use Illuminate\Http\Request;
use App\Domains\Client\Investment;

class InvestmentController extends BaseController
{
    protected $investment;

    public function __construct(Investment $investment)
    {
        $this->investment = $investment;
    }

    public function create($id)
    {
        return view('investment::clients.investments.create',compact('id'));
    }

    public function store(Request $request)
    {
        $investment = $this->investment->create($request->input('investment'));
        //\Event::fire(new NewInvoiceEvent());
        return redirect(route('investment.client.investments',$investment->client_id));
    }

    public function show($id)
    {
        $investment = $this->investment->find($id);
        //return view('investment::people.report',compact('investment'));
    }

    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }
}


