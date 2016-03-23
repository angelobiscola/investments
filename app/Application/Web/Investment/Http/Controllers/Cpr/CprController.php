<?php
namespace App\Application\Web\Investment\Http\Controllers\Cpr;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Cpr\Cpr;
use Illuminate\Http\Request;

class CprController extends BaseController
{
    protected $cpr;

    public function __construct(Cpr $cpr)
    {
        parent::__construct();
        $this->cpr = $cpr;
    }

    public function index()
    {
        $cprs = $this->getCompany()->Cprs;
        return view('investment::cprs.index',compact('cprs'));
    }


}


