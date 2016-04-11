<?php
namespace App\Application\Web\Investment\Http\Controllers\Client;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Client\Bank;
use App\Domains\Client\Client;
use App\Application\Web\Investment\Http\Requests\Client\BankRequest;

class BankController extends BaseController
{
    protected $bank;

    public function __construct(Bank $bank)
    {
        $this->bank = $bank;
    }

    public function create($id)
    {
        return view('investment::clients.banks.create',compact('id'));
    }

    public function store($id, BankRequest $request, Client $client)
    {
        try
        {
            $client = $client->findOrFail($id);

            $client->Banks()->create($request->input('bank'));
            return back()->with('status', 'Adicionado');
        }
        catch(\Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }

    public function edit($id)
    {

        $bank = $this->bank->find($id);
        return view('investment::clients.banks.edit', compact('bank'));
    }

    public function update($id, BankRequest $request)
    {
        try
        {
            $bank = $this->bank->find($id);
            $bank->update($request->input('bank'));
            return back()->with('status', 'Edit');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $banks = $this->bank->all();
        try
        {
            return view('investment::clients.banks.index',compact('banks', 'id'));
        }
        catch(\Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }

    public function destroy(Bank $bank,$id)
    {
        $bank = $bank->find($id);

        try {
             $bank->forceDelete();
             return back()->with('status', 'Removido');
        }
        catch(\Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }
}
