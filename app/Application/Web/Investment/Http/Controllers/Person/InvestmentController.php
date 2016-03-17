<?php
namespace App\Application\Web\Investment\Http\Controllers\Person;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Domains\People\Investment;

class InvestmentController extends BaseController
{
    protected $investment;

    public function __construct(Investment $investment)
    {
        $this->investment = $investment;
    }

    public function create($id)
    {
        return view('investment::people.investments.create',compact('id'));
    }

    public function store(Request $request)
    {
        $investment = $this->investment->create($request->input('investment'));
        return redirect(route('investment.person.investments',$investment->People->id));
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


