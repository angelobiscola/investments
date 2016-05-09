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
        try {
            $cpr    = $this->cpr->findOrFail($id);

            if($cpr->status == 'c')
            {
                throw new \Exception('Já foi consolidado ['.$cpr->updated_at .']');
            }

            $job = (new CreateOperation($cpr))->delay(5);
            $this->dispatch($job);

            return back()->with('status', 'Consolidado OK, Processando....');
        }
        catch(\Exception $e)
        {
            return back()->with('status',$e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $client = $request->get('client');
        $cprs   = $this->cpr->whereCompanyId($this->getCompany()->id)->whereClientId($client)->get();
        return view('investment::cprs.index',compact('cprs'));
    }
}


