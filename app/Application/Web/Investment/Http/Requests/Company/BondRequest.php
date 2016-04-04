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
            'bond.name'             =>  'required|alpha'  ,
            'bond.description'      =>  'required|alpha'  ,
            //'bond.rate'             =>  'required| double',
            'bond.rate_mode'        =>  'required|alpha'  ,
            //'bond.total'            =>  'require| double',
            'bond.quota'            =>  'required|integer',
            'bond.opportunity'      =>  'required|date'   ,
        ];
    }
}



