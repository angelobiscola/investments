<?php
namespace App\Application\Web\Investment\Http\Controllers\Person;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\People\People;
use Illuminate\Http\Request;

class PersonController extends BaseController
{
    protected $people;

    public function __construct(People $people)
    {
        $this->people = $people;
    }

    public function index()
    {
        return view('investment::people.index')->with('people',$this->people->all());
    }

    public function create()
    {
        return view('investment::people.create');
    }

    public function store(Request $request)
    {

        dd($request->all());

    }

    public function show($id)
    {
        dd($this->people->find($id));
    }

    public function edit($id)
    {
        dd($this->people->find($id));
    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id)
    {
        dd($this->people->find($id)->delete());
    }
}


