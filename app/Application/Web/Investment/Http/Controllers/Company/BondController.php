<?php
namespace App\Application\Web\Investment\Http\Controllers\Company;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Company\Bond;
use Illuminate\Http\Request;

class BondController extends BaseController
{
    protected $bond;

    public function __construct(Bond $bond)
    {
        parent::__construct();
        $this->bond = $bond;
    }

    public function index()
    {
        $bonds = $this->bond->whereCompanyId($this->getCompany()->id)->get();
        return view('investment::companies.bonds.index',compact('bonds'));
    }
}


