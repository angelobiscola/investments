<?php
namespace App\Application\Web\Investment\Http\Controllers\Information;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Admin\Information;
use Illuminate\Http\Request;

class InformationController extends BaseController
{
    protected $information;

    public function __construct(Information $information)
    {
        $this->information = $information;
    }

    public function edit($id)
    {
        $information = $this->information->find($id);
        return view('investment::informations.edit',compact('information'));
    }

    public function update($id, Request $request)
    {
        $information = $this->information->find($id);
        $information->update($request->input('information'));


        if($information->Location)
        {
            $information->Location()->update($request->input('location'));
        }
        else
        {
            $information->Location()->create($request->input('location'));
        }

        return back();

    }
}


