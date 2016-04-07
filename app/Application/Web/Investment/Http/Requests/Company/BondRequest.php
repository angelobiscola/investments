<?php

namespace App\Application\Web\Investment\Http\Requests\Company;

use App\Application\Web\Investment\Http\Requests\Request;

class BondRequest extends Request
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
            'bond.prospect_id'      =>  'required|string'  ,
            'bond.name'             =>  'required|string'  ,
            'bond.rate'             =>  'required'         ,
            'bond.rate_mode'        =>  'required'         ,
            'bond.total'            =>  'required'         ,
            'bond.quota'            =>  'required|integer' ,
            'bond.opportunity'      =>  'required|date'    ,
        ];
    }
}


