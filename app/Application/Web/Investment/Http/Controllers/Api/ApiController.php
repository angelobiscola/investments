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
        $cnpj = $request->get('q');
        $return = CnpjGratis::consulta($cnpj,'7','7');
        $return['cep'] = Utils::mask($return['cep'], Mask::CEP);
        $return['code'] = 0;
        //return response()->json(["data" => $return]);

    }
}


