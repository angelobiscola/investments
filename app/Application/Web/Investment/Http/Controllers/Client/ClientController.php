<?php
namespace App\Application\Web\Investment\Http\Controllers\Client;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Client\Client;
use Illuminate\Http\Request;

class ClientController extends BaseController
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        return view('investment::clients.index')->with('clients',$this->client->all());
    }

    public function create(Request $request)
    {
        return view('investment::clients.create')->with('type',$request->input('type'));
    }

    public function store(Request $request)
    {
        $client   = $this->client->create($request->input('client'));

        if($client->type == 'j')
        {
            $client->Legal()->create($request->input('legal'));
        }
        else
        {
            $client->Physical()->create($request->input('physical'));
        }

        if($request->input('location'))
        {
            $client->Location()->create($request->input('location'));
        }
        return redirect(route('investment.client.index'));
    }

    public function show($id)
    {
        $client = $this->client->find($id);
        return view('investment::reports.client',compact('client'));
    }

    public function edit($id)
    {
        $client   = $this->client->find($id);
        return view('investment::clients.edit', compact('client'));
    }

    public function update($id, Request $request)
    {
        $client = $this->client->find($id);
        $client->update($request->input('client'));
        $client->Location->update($request->input('location'));
        if($client->type == 'f')
        {
            $client->Physical->update($request->input('physical'));
        }
        else
        {
            $client->Legal->update($request->input('legal'));
        }

        return back();
    }

    public function destroy($id)
    {
        $this->client->destroy($id);
        return redirect(route('investment.client.index'));
    }

    public function investments($id)
    {
        $investments = $this->client->find($id)->Investments;
        return view('investment::clients.investments.index',compact('investments','id'));
    }

}
