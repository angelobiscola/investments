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
        return back();
    }

    public function show($id)
    {
        $client = $this->client->find($id);
        return view('investment::reports.client',compact('client'));
    }

    public function edit($id)
    {
        dd($this->client->find($id));
    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id)
    {
        dd($this->client->find($id)->delete());
    }

    public function investments($id)
    {
        /*
        //$investments = $this->client->find($id)->Investments;
        //return view('investment::clients.investments.index',compact('investments','id'));
        */

        $principal = 100000.00;
        $taxa = 0.015; // 3%
        $meses = 12;
        $anterior = 0.0;

        for($i = 1; $i <= $meses; $i++){
            $montante = $principal * pow((1 + $taxa), $i);
            $juros = $montante - $principal - $anterior;

            $anterior += $juros;

            echo "Mês: " . $i . " - Montante: "
                . $montante . " - Juros: " . $juros . "<br>";
        }

        echo $montante - $principal."<br>";
        echo ($montante - $principal)/$meses."<br>";

        return $this->jurosSimples(100000,1.5, 12);


    }
    function jurosSimples($valor, $taxa, $parcelas) {

        $taxa = $taxa / 100;
        $m = $valor * (1 + $taxa * $parcelas);
        $total = $m-$valor;
        $valParcela = number_format($total / $parcelas, 2, ",", ".");

        return $valParcela;
    }

    function jurosComposto($valor, $taxa, $parcelas) {
        $taxa = $taxa / 100;

        $valParcela = $valor * pow((1 + $taxa), $parcelas);

        $valParcela = number_format($valParcela / $parcelas, 2, ",", ".");

        return $valParcela;
    }

}
