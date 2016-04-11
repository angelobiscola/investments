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
        $rules    =  [ 'client.name'               => 'required|string'       ,
                       'client.phone'              => 'required|string|min:20|max:21'                 ,
                       'client.email'              => 'required|email|unique:clients,email,'.$this->id,
                       'location.address'          => 'required|string'       ,
                       'location.number'           => 'required|integer'      ,
                       'location.city'             => 'required|string'       ,
                       'location.zip_code'         => 'required|string'       ,
                       'location.district'         => 'required|string'       ,
                       'location.state_abbr'       => 'required|alpha'        ,
                       'location.complement'       => 'required'              ,
                     ];

        $physical = [  'physical.birth_date'       => 'required|string'       ,
                       'physical.cpf'              => 'required|string'       ,
                       'physical.nationality'      => 'required|string'       ,
                       'physical.marital_status'   => 'required|string'       ,
                       'physical.profession'       => 'required|string'       ,
                       'physical.identity'         => 'required|string'       ,
                       'physical.organ_issuer'     => 'required|string'       ,
                       'physical.cell_phone'       => 'required|string|min:20|max:21',
                       'physical.natural'          => 'required|string'       ,
                       'physical.genre'            => 'required|alpha'        ,
                    ];

        $legal =    [ 'legal.cnpj'                 => 'required|string|cnpj|unique:legals,cnpj,'.$this->id   ,
                      'legal.company_name'         => 'required|string|unique:legals,company_name,'.$this->id,
                      'legal.cnae_principal'       => 'required|string'       ,
                      'legal.site'                 => ''                      ,
                    ];

        if($this->client['type'] == 'f')
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
