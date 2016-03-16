<?php
namespace App\Application\Web\Investment\Http\Controllers\Person;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\People\People;

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
}

