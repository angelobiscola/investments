<?php

namespace App\Application\Web\Investment\Http\Requests\Client;

use App\Application\Web\Investment\Http\Requests\Request;

class ClientRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [ 'client.name'               => 'required|string'        ,
                    'client.phone'              => 'required|phone'         ,
                    'client.email'              => 'required|email'         ,

                    'location.address'          => 'required|string'        ,
                    'location.number'           => 'required|integer'       ,
                    'location.city'             => 'required|string'        ,
                    'location.zip_code'         => 'required|string'        ,
                    'location.district'         => 'required|string'        ,
                    'location.state_abbr'       => 'required|alpha'         ,
                 ];

        $physical = [   'physical.birth_date'       => 'required|integer'       ,
                        'physical.cpf'              => 'required|string|cpf'    ,
                        'physical.nationality'      => 'required|string'        ,
                        'physical.marital_status'   => 'required|string'        ,
                        'physical.profession'       => 'required|string'        ,
                        'physical.identity'         => 'required|string'        ,
                        'physical.organ_issuer'     => 'required|string'        ,
                        'physical.cell_phone'       => 'required|phone'         ,
                    ];

        $legal = [   'legal.cnpj'                => 'required|string|cnpj'   ,
                    'legal.company_name'        => 'required|string'        ,
                    'legal.cnae_principal'      => 'required|string'        ,
                    'legal.email'               => 'required|email'         ,
                 ];

        if(Request::input('client.type') == 'f')
        {
            $rules  = array_merge($rules,$physical);
        }
        else
        {
            $rules   = array_merge($rules,$legal);
        }
        return $rules;

    }
}
