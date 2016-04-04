<?php

namespace App\Application\Web\Investment\Http\Requests\Company;

use App\Application\Web\Investment\Http\Requests\Request;

class ProspectRequest extends Request
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
            'prospect.name'             =>  'required|alpha'  ,
            'prospect.description'      =>  'required|alpha'  ,
        ];
    }
}
