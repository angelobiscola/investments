<?php

namespace App\Application\Web\Investment\Http\Requests\Client;

use App\Application\Web\Investment\Http\Requests\Request;

class BankRequest extends Request
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
            'bank.name'      =>  'required|string'  ,
            'bank.agency'    =>  'required|string'  ,
            'bank.account'   =>  'required|string'  ,
            'bank.type'      =>  'required|string'  ,
            'bank.city'      =>  'required|string'  ,
        ];
    }

}
