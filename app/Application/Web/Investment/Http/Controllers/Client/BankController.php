<?php
namespace App\Application\Web\Investment\Http\Controllers\Client;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Client\Bank;
use App\Domains\Client\Client;
use Illuminate\Http\Request;

class BankController extends BaseController
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function create($id)
    {
        return view('investment::clients.banks.create',compact('id'));
    }

    public function store($id,Request $request)
    {
        $client = $this->client->find($id);

        try
        {
            $client->Banks()->create($request->input('bank'));
            return back()->with('status', 'Adicionado');
        }
        catch(\Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }

    public function show($id)
    {
        $banks = $this->client->find($id)->Banks;
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
