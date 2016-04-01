<?php
namespace App\Application\Web\Investment\Http\Controllers\Client;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Client\Client;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function show($id)
    {
        $client = $this->client->find($id);
        return view('investment::clients.dashboard.index',compact('client'));
    }

}
