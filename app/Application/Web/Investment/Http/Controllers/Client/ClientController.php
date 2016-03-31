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
        try
        {
            $client = $this->client->create($request->input('client'));

            if ($client->type == 'j') {
                $client->Legal()->create($request->input('legal'));
            } else {
                $client->Physical()->create($request->input('physical'));
            }

            if ($request->input('location')) {
                $client->Location()->create($request->input('location'));
            }
            return redirect(route('investment.client.index'))->with('status', 'create');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $client = $this->client->find($id);
        return view('investment::reports.client',compact('client'));
    }

    public function edit($id)
    {
        try
        {
            $client   = $this->client->find($id);
            return view('investment::clients.edit', compact('client'));
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try
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

            return back()->with('status', 'edit')->with('status', 'edit');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try
        {
            $this->client->find($id)->forceDelete();
            return redirect(route('investment.client.index'))->with('status', 'Delete');
        }
        catch(\Exception $e)
        {
            return redirect()->back('error', $e->getMessage());
        }
    }

    public function investments($id)
    {
        try
        {
            $investments = $this->client->find($id)->Investments;
            return view('investment::clients.investments.index',compact('investments','id'));
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



}
