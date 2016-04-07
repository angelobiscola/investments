<?php
namespace App\Application\Web\Investment\Http\Controllers\Cpr;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Cpr\Invoice;
use Miqueiasdesouza\Boleto\Boleto;
use Illuminate\Http\Request;

class InvoiceController extends BaseController
{
    protected $invoice;
    protected $boleto;

    public function __construct(Invoice $invoice,Boleto $boleto)
    {
        parent::__construct();
        $this->invoice = $invoice;
        $this->boleto = $boleto;
    }

    public function getPrint($id)
    {
        return $this->generate($this->invoice->find($id));
    }

    private function generate($invoice)
    {
        $this->setSacado($invoice->Client);
        $this->setCedente($invoice->Company,$invoice->Billet);

        $this->boleto->banco($invoice->Billet->Template->name, array(

            'valor_boleto'          => $invoice->present()->maskValue, // Nosso numero sem o DV - REGRA: Máximo de 11 caracteres!
            'nosso_numero'          => $invoice->id, //Num do pedido ou do documento = Nosso numero
            'numero_documento'      => $invoice->investment_id, //// Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
            'data_vencimento'       => \Carbon\Carbon::parse($invoice->date_maturity)->format('d/m/Y'), //Data de emissão do Boleto
            'data_documento'        =>  date('d/m/Y'), //Data de processamento do boleto (opcional)
            'data_processamento'    =>  date('d/m/Y'), //Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula
            'quantidade'            =>  "001",
            'valor_unitario'        =>  $invoice->present()->maskValue,
            'aceite'                =>  "",
            'especie'               =>  "R$",
            'especie_doc'           =>  "DS",

            'demonstrativo1'        =>  "Referente ao Investimento: ".$invoice->Investment->Bond->name,", Codigo :".$invoice->investment_id,
            'demonstrativo3'        =>  $invoice->Investment->Company->company_name ." - http://www.seusite.com.br",
            'instrucoes1'           =>  "",
            'instrucoes2'           =>  "Não receber após o vencimento",
            'instrucoes3'           =>  "Em caso de dúvidas entre em contato conosco: ".$invoice->Investment->Company->email,



        ));
        return $this->boleto->pdf();
    }

    private function setSacado($client){

        if(!$client)
        {
            throw new \Exception;
        }

        $this->boleto->sacado(array(
                            'sacado'    => $client->name,
                            'endereco1' => $client->Location->address.' '.$client->Location->number,
                            'endereco2' => $client->Location->city.' - '.$client->Location->state_abbr.' - '.$client->Location->zip_code
        ));
    }

    private function setCedente($cedente,$billet)
    {
        if(!$cedente)
        {
            throw new \Exception;
        }

        $this->boleto->cedente([

            'agencia'           => $billet->agency,     //Num da agencia, sem digito
            'agencia_dv'        => $billet->agency_dv,  //Digito do Num da agencia
            'conta'             => $billet->account,    //Num da conta, sem digito
            'conta_dv'          => $billet->account_dv,
            'conta_cedente'     => $billet->account,    //ContaCedente do Cliente, sem digito (Somente Números)
            'conta_cedente_dv'  => $billet->account_dv, // Digito da ContaCedente do Cliente
            'carteira'          => $billet->wallet,     // Código da Carteira: pode ser 06 ou 03


            'cpf_cnpj'          => $cedente->cnpj,
            'endereco'          => $cedente->Location->address.' '.$cedente->Location->number,
            'cidade_uf'         => $cedente->Location->city.' - '.$cedente->Location->state_abbr.' - '.$cedente->Location->zip_code,
            'cedente'           => $cedente->company_name
            ]);
    }
}


