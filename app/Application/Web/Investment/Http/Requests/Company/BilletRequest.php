<?php

namespace App\Application\Web\Investment\Http\Requests\Company;

use App\Application\Web\Investment\Http\Requests\Request;

class BilletRequest extends Request
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
                'billet.name'             =>  'required|string' ,
                'billet.agency'           =>  'required|integer',
                'billet.agency_dv'        =>  'required|integer',
                'billet.account'          =>  'required|integer',
                'billet.account_dv'       =>  'required|integer',
                'billet.wallet'           =>  'required|integer',
                'billet.identification'   =>  'required|string' ,
                'billet.contract'         =>  'required|integer',
                'billet.template_id'      =>  'required'        ,
               ];
    }
}
