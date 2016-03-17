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
        $location = $request->input('location');
        $person   = $this->people->create($request->input('person'));

        if($location)
        {
            $person->Location()->create($location);
        }
    }

    public function show($id)
    {
        $person = $this->people->find($id);
        return view('investment::people.report',compact('person'));
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

    public function investments($id)
    {
        $investments = $this->people->find($id)->Investments;
        return view('investment::people.investments.index',compact('investments','id'));
    }
}


