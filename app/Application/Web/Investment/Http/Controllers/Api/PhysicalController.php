<?php

namespace App\Application\Web\Investment\Http\Controllers\Api;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Client\Physical;
use Illuminate\Http\Request;

class PhysicalController extends BaseController
{
    protected $physical;

    public function __construct(Physical $physical)
    {
        parent::__construct();
        $this->physical = $physical;
    }

    public function findcpf(Request $request)
    {
        $physicals = $this->physical->where('cpf', 'like', '%'.$request->get('q').'%')->with('Client')->get();
        return response()->json(['items' => $physicals],200);
    }

}

