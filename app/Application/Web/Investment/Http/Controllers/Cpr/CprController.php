<?php
namespace App\Application\Web\Investment\Http\Controllers\Cpr;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Application\Web\Investment\Jobs\CreateOperation;
use App\Domains\Cpr\Cpr;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

class CprController extends BaseController
{
    use DispatchesJobs;

    protected $cpr;

    public function __construct(Cpr $cpr)
    {
        parent::__construct();
        $this->cpr = $cpr;
    }

    public function index()
    {
        $cprs = $this->cpr->whereCompanyId($this->getCompany()->id)->get();
        return view('investment::cprs.index',compact('cprs'));
    }

    public function filter(Request $request)
    {
        $type   = $request->get('t');
        $status = $request->get('s');
        $cprs = $this->cpr->whereCompanyId($this->getCompany()->id)->whereType($type)->whereStatus($status)->get();
        return view('investment::cprs.index',compact('cprs'));
    }

    public function consolidate($id)
    {
        $cpr    = $this->cpr->find($id);
        //$cpr->update(['status' =>'c']);
        dispatch(new CreateOperation($cpr->Investment));
        return back()->with('status','Consolidate OK, Processing....');
    }
}


