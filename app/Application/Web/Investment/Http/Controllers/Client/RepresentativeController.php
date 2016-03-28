<?php
namespace App\Application\Web\Investment\Http\Controllers\Client;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Client\Representative;
use Illuminate\Http\Request;

class RepresentativeController extends BaseController
{
    protected $representative;

    public function __construct(Representative $representative)
    {
        $this->representative = $representative;
    }

    public function create($id)
    {
        return view('investment::clients.representatives.create',compact('id'));
    }

    public function store(Request $request)
    {
        $this->representative->create($request->all());
        return back();
    }

    public function show($id)
    {
        $representatives = $this->representative->whereLegalId($id)->get();
        return view('investment::clients.representatives.index',compact('representatives', 'id'));
    }

    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id)
    {
        $this->representative->find($id)->forceDelete();
        return back();
    }

}
