<?php
namespace App\Application\Web\Investment\Http\Controllers\Client;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Client\Client;
use Illuminate\Http\Request;

class RepresentativeController extends BaseController
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function store($id,Request $request)
    {
        $client = $this->client->find($id);
        try
        {
            $this->validClient($client)->Legal->Representatives()->create($request->all());
            return back()->with('status', 'Adicionado');
        }
        catch(\Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }

    public function show($id)
    {
        $client = $this->client->find($id);
        try
        {
            $representatives = $this->validClient($client)->Legal->Representatives;
            return view('investment::clients.representatives.index',compact('representatives', 'id'));
        }
        catch(\Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }

    public function destroy($id,Request $request)
    {
        $client = $this->client->find($id);

        try {
            $this->validClient($client)->Legal->Representatives()->find($request->get('r'))->forceDelete();
            return back()->with('status', 'Removido');
        }
        catch(\Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }

    protected function validClient(Client $client)
    {
        if(!$client->Legal)
        {
            throw new \Exception('Cliente não é Juridico' );
        }
        return $client;
    }

}
