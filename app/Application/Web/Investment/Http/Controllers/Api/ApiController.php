<?php
namespace App\Application\Web\Investment\Http\Controllers\Api;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use JansenFelipe\CnpjGratis\CnpjGratis as CnpjGratis;
use JansenFelipe\Utils\Utils as Utils;
use JansenFelipe\Utils\Mask as Mask;
use JansenFelipe\CpfGratis\CpfGratis as Cpf;


class ApiController extends BaseController
{

    public function getCnpj(Request $request)
    {
        $cnpj       = $request->get('cnpj');
        $captcha    = $request->get('captcha');
        $cookie     = $request->get('cookie');

        try {
            $return = CnpjGratis::consulta($cnpj, $captcha, $cookie);
            $return['cep'] = Utils::mask($return['cep'], Mask::CEP);
            $return['code'] = 0;
            return response()->json($return,200);
        }
        catch(\Exception $e)
        {
            return response()->json('erro no captcha ou CNPJ invalido',404);
        }
    }
    public function captchaCnpj(CnpjGratis $cpf)
    {
        $params = $cpf->getParams();
        try
        {
            return response()->json(['captcha' => $params['captchaBase64'], 'cookie' => $params['cookie']  ],200);
        }
        catch(\Exception $e)
        {
            return response()->json($e->getMessage(),404);
        }
    }

    public function getCpf(Request $request)
    {
        $cpf        = $request->get('cpf');
        $date       = $request->get('date');
        $captcha    = $request->get('captcha');
        $cookie     = $request->get('cookie');

        try {
            $return = Cpf::consulta($cpf, $date, $captcha, $cookie);
            return response()->json($return,200);
        }
        catch(\Exception $e)
        {
            return response()->json($e->getMessage(),404);
        }
    }

    public function captchaCpf(Cpf $cpf)
    {
        $params = $cpf->getParams();
        try
        {
            return response()->json(['captcha' => $params['captchaBase64'], 'cookie' => $params['cookie']  ],200);
        }
        catch(\Exception $e)
        {
            return response()->json($e->getMessage(),404);
        }
    }
}


