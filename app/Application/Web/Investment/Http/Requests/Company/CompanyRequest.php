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
            'company.cnpj'              =>  'required|cnpj|unique:companies,cnpj,'.$this->id            ,
            'company.name'              =>  'required|string|unique:companies,name,'.$this->id          ,
            'company.company_name'      =>  'required|string|unique:companies,company_name,'.$this->id  ,
            'company.cnae_principal'    =>  'required|string'                                           ,
            'company.phone'             =>  'required|string'                                           ,
            'company.email'             =>  'required|email|unique:companies,email,'.$this->id          ,

            'location.address'          =>  'required|string'    ,
            'location.number'           =>  'required|integer'   ,
            'location.city'             =>  'required|string'    ,
            'location.zip_code'         =>  'required|string'    ,
            'location.district'         =>  'required|string'    ,
            'location.state_abbr'       =>  'required|alpha'     ,
        ];
    }
}
