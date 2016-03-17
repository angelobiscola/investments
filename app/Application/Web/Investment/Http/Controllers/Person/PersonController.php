<?php
namespace App\Application\Web\Investment\Http\Controllers\Person;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\People\People;
use Illuminate\Http\Request;
use JansenFelipe\CpfGratis\CpfGratis as Cpf;

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

    public function create(Cpf $cpf)
    {
        $params = $cpf->getParams();
        return view('investment::people.create')->with('captcha',$params['captchaBase64'])->with('cookie',$params['cookie']);
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


