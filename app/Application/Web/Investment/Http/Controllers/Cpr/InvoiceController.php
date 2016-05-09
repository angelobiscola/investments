<?php
namespace App\Application\Web\Investment\Http\Controllers\Cpr;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Cpr\Invoice;
use Miqueiasdesouza\Boleto\Boleto;
use \Eduardokum\LaravelBoleto\Boleto\Pessoa as Pessoa;
use Illuminate\Http\Request;

class InvoiceController extends BaseController
{
    protected $invoice;
    protected $boleto;

    public function __construct(Invoice $invoice,Boleto $boleto)
    {
        parent::__construct();
        $this->invoice = $invoice;
        $this->boleto =  $boleto;
    }

    public function getPrint($id)
    {
        return $this->generate($this->invoice->find($id));
    }

    private function generate($invoice)
    {

        $boletoArray = [
            'logo' => asset('logos/'.$invoice->Investment->company->Logo->file_name) , // Logo da empresa
            'dataVencimento' => \Carbon\Carbon::parse($invoice->date_maturity), //Data de emissão do Boleto
            'valor' => $invoice->value,
            'multa' => 0, // porcento
            'juros' => 0, // porcento ao mes
            'juros_apos' =>  0, // juros e multa após
            'diasProtesto' => false, // protestar após, se for necessário
            'numero' => $invoice->id,
            'numeroDocumento' => $invoice->id,
            'pagador' => $this->setSacado($invoice->Client), // Objeto PessoaContract
            'beneficiario' => $this->setCedente($invoice->Company), // Objeto PessoaContract
            'agencia' => $invoice->Billet->agency, // BB, Bradesco, CEF, HSBC, Itáu
            'agenciaDv' => $invoice->Billet->agency_dv, // se possuir
            'conta' => $invoice->Billet->account, // BB, Bradesco, CEF, HSBC, Itáu, Santander
            'contaDv' => $invoice->Billet->account_dv, // Bradesco, HSBC, Itáu
            'carteira' => $invoice->Billet->wallet, // BB, Bradesco, CEF, HSBC, Itáu, Santander
            'convenio' => 9999999, // BB
            'variacaoCarteira' => $invoice->Billet->wallet, // BB
            'range' => 99999, // HSBC
            'codigoCliente' => $invoice->Client->id, // Bradesco, CEF, Santander
            'ios' => 0, // Santander

            'descricaoDemonstrativo' => ["Ref. ao Investimento: ".$invoice->Investment->Bond->name.", Codigo:".$invoice->investment_id,
                                          $invoice->Investment->Company->company_name ." - http://www.alavancabrasil.com.br",
                                         "Em caso de dúvidas entre em contato conosco: ".$invoice->Investment->Company->email,
                                        ], // máximo de 5
            
            'instrucoes' =>  ['"Não receber após o vencimento"', ''], // máximo de 5
            'aceite' => 1,
            'especieDoc' => 'DM',
        ];

        $boleto = new \Eduardokum\LaravelBoleto\Boleto\Banco\Bradesco($boletoArray);
        return $boleto->renderHTML();
    }

    private function setSacado($client){

        if(!$client)
        {
            throw new \Exception;
        }

        $sacado = new Pessoa([
                'nome' => $client->name,
                'endereco' => $client->Location->address.' '.$client->Location->number,
                'cep' => $client->Location->zip_code,
                'uf' => $client->Location->state_abbr,
                'cidade' => $client->Location->city,
                'documento' => $client->present()->legalOrPhysical(),
        ]);
        return $sacado;
    }

    private function setCedente($cedente)
    {
        if(!$cedente)
        {
            throw new \Exception;
        }

        $cedente = new Pessoa([
            'nome' => $cedente->company_name,
            'endereco' => $cedente->Location->address.' '.$cedente->Location->number,
            'cep' => $cedente->Location->zip_code,
            'uf' => $cedente->Location->state_abbr,
            'cidade' => $cedente->Location->city,
            'documento' => $cedente->cnpj,
        ]);

        return $cedente;
    }
}


