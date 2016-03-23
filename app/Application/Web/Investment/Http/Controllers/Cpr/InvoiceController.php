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

        $sacado   = $invoice->Client;
        $cedente  = $invoice->Company;

        //Definindo os dados do sacado
        $this->boleto->sacado(array(
                            'sacado'    => $sacado->name,
                            'endereco1' => $sacado->Location->address.' '.$sacado->Location->number,
                            'endereco2' => $sacado->Location->city.' - '.$sacado->Location->state_abbr.' - '.$sacado->Location->zip_code
        ));


        //Definindo os dados do Cedente
        $this->boleto->cedente(array(
            'agencia'           => "1100", // Num da agencia, sem digito
            'agencia_dv'        => "0", // Digito do Num da agencia
            'conta'             => "0102003", 	// Num da conta, sem digito
            'conta_dv'          => "4",
            'conta_cedente'     => "0102003", // ContaCedente do Cliente, sem digito (Somente Números)
            'conta_cedente_dv'  => "4", // Digito da ContaCedente do Cliente
            'carteira'          => "06",  // Código da Carteira: pode ser 06 ou 03


            'cpf_cnpj'          => $cedente->cnpj,
            'endereco'          => $cedente->Location->address.' '.$cedente->Location->number,
            'cidade_uf'         => $cedente->Location->city.' - '.$cedente->Location->state_abbr.' - '.$cedente->Location->zip_code,
            'cedente'           => $cedente->company_name
        ));


        //Definindo os dados do boleto. Banco, valores, vencimento, informações e etc...
        $this->boleto->banco($invoice->Billet->Template->name, array(

            'valor_boleto'          => $invoice->value, // Nosso numero sem o DV - REGRA: Máximo de 11 caracteres!
            'nosso_numero'          => $invoice->id, //Num do pedido ou do documento = Nosso numero
            'numero_documento'      => $invoice->investment_id, //// Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
            'data_vencimento'       =>  date('d/m/Y'), //Data de emissão do Boleto
            'data_documento'        =>  date('d/m/Y'), //Data de processamento do boleto (opcional)
            'data_processamento'    =>  date('d/m/Y'), //Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula
            'quantidade'            =>  "001",
            'valor_unitario'        =>  $invoice->value,
            'aceite'                =>  "",
            'especie'               =>  "R$",
            'especie_doc'           =>  "DS",


        ));

        //Retorna o Objeto do Boleto
        return $this->boleto->pdf();

    }


}


