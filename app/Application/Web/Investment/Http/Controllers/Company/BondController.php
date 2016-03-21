<?php
namespace App\Application\Web\Investment\Http\Controllers\Company;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Company\Bond;
use App\Domains\Company\Prospect;
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

    public function create(Prospect $prospect)
    {
        return view('investment::companies.bonds.create')->with('prospects',$prospect->all());
    }

    public function store(Request $request)
    {
       $request = $request->input('bond');
       $request['user_id']    = $this->getUser()->id;
       $request['company_id'] = $this->getCompany()->id;

       $this->bond->create($request);
       return redirect(route('investment.company.bond.index'))->with('status','saved');
    }

    public function available()
    {

    }
}


