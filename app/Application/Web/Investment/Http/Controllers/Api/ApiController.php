<?php
namespace App\Application\Web\Investment\Http\Controllers\Api;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use JansenFelipe\CnpjGratis\CnpjGratis as CnpjGratis;
use JansenFelipe\Utils\Utils as Utils;
use JansenFelipe\Utils\Mask as Mask;


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
            return response()->json($return);
        }
        catch(\Exception $e)
        {
            return response()->json('erro no captcha ou CNPJ invalido');
        }
    }

    public function getCpf(Request $request)
    {
        $cnpj       = $request->get('cnpj');
        $captcha    = $request->get('captcha');
        $cookie     = $request->get('cookie');

        try {
            $return = CnpjGratis::consulta($cnpj, $captcha, $cookie);
            $return['cep'] = Utils::mask($return['cep'], Mask::CEP);
            $return['code'] = 0;
            return response()->json($return);
        }
        catch(\Exception $e)
        {
            return response()->json('erro no captcha ou CNPJ invalido');
        }
    }
}


