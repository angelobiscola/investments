<?php

namespace App\Application\Web\Investment\Http\Requests\Company;

use App\Application\Web\Investment\Http\Requests\Request;

class CompanyRequest extends Request
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
        return [
            'company.name'             =>  'required|string'  ,
            'company.company_name'     =>  'required|string'  ,
            'company.cnpj'             =>  'required|string'  ,
            'company.cnae_principal'   =>  'required|string'  ,
            'company.phone'            =>  'required|phone'   ,
            'company.email'            =>  'required|email'   ,

            'location.address'          => 'required|string'    ,
            'location.number'           => 'required|integer'   ,
            'location.city'             => 'required|string'    ,
            'location.zip_code'         => 'required|string'    ,
            'location.district'         => 'required|string'    ,
            'location.state_abbr'       => 'required|alpha'     ,
        ];
    }
}
