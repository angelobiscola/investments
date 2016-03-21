<?php
namespace App\Application\Web\Investment\Http\Controllers\Billet;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Billet\Billet_information;
use Illuminate\Http\Request;

class infoController extends BaseController
{
    protected $billet;

    public function __construct(Billet_information $billet)
    {
        $this->billet = $billet;
    }

    public function index()
    {

    }

    public function create($id)
    {
        return view('investment::billets.info.create',compact('id'));
    }

    public function store($id,Request $request)
    {
        $request = $request->input('info');
        $request['billet_id'] = $id;
        $this->billet->create($request);
        return redirect(route('investment.billet.index'));

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id)
    {

    }
}


